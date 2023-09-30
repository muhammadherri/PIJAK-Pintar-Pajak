<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenReferensi;
use App\Models\Ptkp;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Billing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class AllInController extends Controller
{
    public function dokrefindex(){
        $data = DokumenReferensi::all();
        return response()->json($data);
    }
    public function resultPtkp(Request $request,$status=null,$tanggungan=null){
        dd($request);
        $tanggungans = preg_replace('/[^0-9]/','',$status); 
        $statuses = preg_replace('/[^a-zA-Z]/','',$status); 
        // dd($statuses);
        // $data=Ptkp::where('kode_ptkp',$statuses)->where('tanggungan',$tanggungans)->first();
        $data=Ptkp::where('kode_ptkp',$statuses)->where('tanggungan',$tanggungans)->get();
        // dd($data);
        $data_arr = array();
        foreach ($data as $record) {
            $data_arr[] = array(
                "besaran_ptkp" => $record->besaran_ptkp,
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
        // return Datatables::of($data_arr)->make(true);

    }
    public function indexpphduasatu(Request $request){
        $pph21 = TransaksiPphDuapuluhSatu::all();
        $data_arr = array();
        foreach ($pph21 as $pph21) {
            $data_arr[] = array(
                "id" => $record->id,
                
            );
        }
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listMahasiswa(Request $request){
        $data = User::where('status',null)->get();
        $data_arr = array();
        foreach ($data as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "name" => $record->name,
                "email" => $record->email,
                "created_at" => $record->created_at->format('d-M-Y'),
            );
        }
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listInvoice(Request $request){
        $id=Auth::user()->id;
        // $invcount = Invoice::where('attribute1',$id)->sum('total');
        if(Auth::user()->status==1){

            $inv = Invoice::get();
        }else{
            $inv = Invoice::where('attribute1',$id)->get();
        }
        $data_arr = array();
        foreach ($inv as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "code_vendor" => $record->vendor->no_id_vendor,
                "nama_vendor" => $record->vendor->nama_vendor,
                "no_faktur" => $record->no_faktur,
                "termin" => $record->termin_pembayaran,
                "trx" => $record->nilai_transaksi,
                "potongan_harga" => $record->potongan_harga,
                "total" => $record->total,
                "informasi" => $record->informasi_pembayaran,
                "created_by" => $record->users->name,
                "tgl_pembuatan" => $record->created_at->format('d-M-Y'),
            );
        }
        // dd($invcount);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listPph(Request $request){
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $pph21 = TransaksiPphDuapuluhSatu::get();
        }else{
            $pph21 = TransaksiPphDuapuluhSatu::where('attribute1',$id)->get();
        }
        $data_arr = array();
        foreach ($pph21 as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "nama_wajib_pajak" => $record->nama_wajib_pajak,
                "no_npwp" => $record->no_npwp,
                "masa_penghasilan_start" => Carbon::parse($record->masa_penghasilan_start)->format('d-M-Y'),
                "tunjangan_pajak" => $record->tunjangan_pajak,
                "ketentuan_ptkp" => $record->ketentuan_ptkp,
                "ketentuan_tarif" => $record->ketentuan_tarif,
                "gaji_pensiun" => $record->gaji_pensiun,
                "created_at" => $record->created_at->format('d-M-Y'),
                "status_npwp" => $record->status_npwp,
                "created_by" => $record->users->name,
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    
    }
    public function listFiskal(Request $request){
        $id=Auth::user()->id;

        if(Auth::user()->status==1){
            $pph21 = JurnalManualController::get();
        }else{
            $pph21 = JurnalManualController::where('attribute1',$id)->get();
        }
    }

}
