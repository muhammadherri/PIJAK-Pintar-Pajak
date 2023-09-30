<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenReferensi;
use App\Models\Ptkp;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Billing;
use App\Models\JurnalManual;
use App\Models\Neraca;
use App\Models\Prepopulate;
use App\Models\Akun;
use App\Models\SptTahunan;
use App\Models\SptTahunanI;
use App\Models\SptTahunanIIHead;
use App\Models\SptTahunanIIIHead;
use App\Models\SptTahunanIIILines;
use App\Models\SptTahunanIILines;
use App\Models\SptTahunanIVHead;
use App\Models\SptTahunanIVLinesA;
use App\Models\SptTahunanIVLinesB;
use App\Models\SptTahunanVHead;
use App\Models\SptTahunanVIHead;
use App\Models\SptTahunanVILinesA;
use App\Models\SptTahunanVILinesB;
use App\Models\SptTahunanVILinesC;
use App\Models\SptTahunanVLinesA;
use App\Models\SptTahunanVLinesB;
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
    public function resultPtkp(Request $request){
        $tanggungans = $request->input('tanggungan'); 
        $statuses = $request->input('status'); 
        // $tanggungans = preg_replace('/[^0-9]/','',$status); 
        // $statuses = preg_replace('/[^a-zA-Z]/','',$status); 
        // dd($statuses);
        $data=Ptkp::where('kode_ptkp',$statuses)->where('tanggungan',$tanggungans)->distinct()->get();
        // dd($data);
        $data_arr = array();
        foreach ($data as $record) {
            $data_arr[] = array(
                "besaran_ptkp" => $record->besaran_ptkp,q
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
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

            $inv = Invoice::orderBy('id','ASC')->get();
        }else{
            $inv = Invoice::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($inv);
        foreach ($inv as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "code_vendor" => $record->vendor->no_id_vendor,
                "nama_vendor" => $record->vendor->nama_vendor,
                "no_faktur" => $record->no_faktur,
                "termin" => $record->termin_pembayaran,
                "trx" => $record->nilai_transaksi,
                "potongan_harga" => $record->potongan_harga,
                "ppn" => number_format($record->ppn,2),
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
        // dd($request);
        if(Auth::user()->status==1){
            $fiskal = JurnalManual::get();
        }else{
            $fiskal = JurnalManual::where('attribute1',$id)->get();
        }
        // dd($pph21);
        $data_arr = array();
        foreach ($fiskal as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "no_akun_debit" => $record->no_akun_debit,
                "no_akun_kredit" => $record->no_akun_kredit,
                "nama_akun_debit" => $record->nama_akun_debit,
                "nama_akun_kredit" => $record->nama_akun_kredit,
                "nilai_debit" => $record->nilai_debit,
                "nilai_kredit" => $record->nilai_kredit,
                "attribute1" => $record->users->name,
                "created_at" => $record->created_at->format('d-M-Y'),
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);  
    }
    public function akun_kredit(Request $request){
        $debet = $request->input('akundebet'); 
        // dd($debet);
        $data=Neraca::whereNot('no_akun',$debet)->whereNot('saldo',0)->get();
        $data_arr = array();
        // dd($data);
        foreach ($data as $record) {
            $data_arr[] = array(
                "no_akun" => $record->no_akun.' - '.$record->nama_akun,
                "nama_akun" => $record->nama_akun,
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
    }
    public function nama_kreditpertama(Request $request){
        $debet = $request->input('akundebet'); 
        // dd($debet);
        $data=Neraca::whereNot('no_akun',$debet)->whereNot('saldo',0)->orderBy('id','DESC')->get();
        $data_arr = array();
        // dd($data);
        foreach ($data as $record) {
            $data_arr[] = array(
                "nama_akun" => $record->nama_akun,
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
    }
    public function nama_debit(Request $request){
        $debet = $request->input('akundebet'); 
        // dd($debet);
        $data=Neraca::where('no_akun',$debet)->distinct()->get();
        $data_arr = array();
        // dd($data);
        foreach ($data as $record) {
            $data_arr[] = array(
                "nama_akun" => $record->nama_akun,
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
    }
    public function nama_kredit(Request $request){
        $kredit = preg_replace('/[^0-9]/','',$request->input('akunkredit')); 

        // $kredit = $request->input('akunkredit'); 
        // dd($tanggungans);
        $data=Neraca::where('no_akun',$kredit)->distinct()->get();
        $data_arr = array();
        // dd($data);
        foreach ($data as $record) {
            $data_arr[] = array(
                "nama_akun" => $record->nama_akun,
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
    }
    public function listPrepopulate(Request $request){
        $id=Auth::user()->id;
        // $invcount = Invoice::where('attribute1',$id)->sum('total');
        if(Auth::user()->status==1){

            $ppr = Prepopulate::get();
        }else{
            $ppr = Prepopulate::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($inv);
        foreach ($ppr as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "masa_ppn" =>Carbon::parse($record->masa_ppn)->format('d-M-Y'),
                "tahun" => $record->tahun,
                "npwp" => $record->npwp,
                "nama_npwp" => $record->nama_npwp,
                "alamat_npwp" => $record->alamat_npwp,
                "no_faktur" => $record->no_faktur,
                "jumlah_dpp" => number_format($record->jumlah_dpp,2),
                "jumlah_ppn" => number_format($record->jumlah_ppn,2),
                "keterangan" => $record->keterangan,
                "created_by" => $record->users->name,
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function cariakun(Request $request){
        $akun = $request->input('akun'); 
        // $statuses = $request->input('status'); 
        // $tanggungans = preg_replace('/[^0-9]/','',$status); 
        // $statuses = preg_replace('/[^a-zA-Z]/','',$status); 
        $data=Akun::where('no_akun',$akun)->distinct()->get();
        // dd($data);
        $data_arr = array();
        foreach ($data as $record) {
            $data_arr[] = array(
                "nama_akun" => $record->nama_akun,
                "keterangan" => $record->keterangan,
            );
        }
        // dd($data_arr);
        return response()->json($data_arr);
    }
    public function listSpt1771(Request $request){
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt = SptTahunan::get();
        }else{
            $spt = SptTahunan::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($spt);
        foreach ($spt as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "nama" => $record->nama_npwp,
                "no_npwp" => $record->npwp,
                "jenis_usaha" => $record->jenis_usaha,
                "no_telp" => $record->no_telp,
                "tahun_pajak" => $record->tahun_pajak,
                "pembukuan_terakhir" =>  Carbon::parse($record->end_periode_pembukuan)->format('d-M-Y'),
                "negara" => $record->negara_domisili,
                "laporan_keuangan" => number_format($record->laporan_keuangan,2),
                "created_by" => $record->users->name,
                "tgl_pembuatan" => $record->created_at->format('d-M-Y'),
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function formulirpertama(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $sptI=SptTahunanI::where('formulir_id',$request->formulir_id)->get()->first();
            // dd($sptI);
        }else{
            $sptI=SptTahunanI::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
        }

        if($sptI==null){
            return back();
        }
        return view('spttahunan.formulirsatu',compact('sptI'));
    }
    public function formulirkedua(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $sptII=SptTahunanIIHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptIIlines=SptTahunanIILines::where('formulir_id',$request->formulir_id)->get();
            // dd($sptIIlines);
        }else{
            $sptII=SptTahunanIIHead::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptIIlines=SptTahunanIILines::where('formulir_id',$request->formulir_id)->get();
        }
        if($sptII==null){
            return back();
        }
        return view('spttahunan.formulirdua',compact('sptII','sptIIlines'))->with('no',1);
    }
    public function formulirketiga(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptTahunanIIIHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptlines=SptTahunanIIILines::where('formulir_id',$request->formulir_id)->get();
            // dd($sptIIlines);
        }else{
            $spt=SptTahunanIIIHead::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptlines=SptTahunanIIILines::where('formulir_id',$request->formulir_id)->get();
        }
        if($spt==null){
            return back();
        }
        return view('spttahunan.formulirtiga',compact('spt','sptlines'))->with('no',1);
    }
    public function formulirkeempat(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptTahunanIVHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptlinesa=SptTahunanIVLinesA::where('formulir_id',$request->formulir_id)->get();
            $sptlinescountdasar_pengenaan_pajak=SptTahunanIVLinesA::where('formulir_id',$request->formulir_id)->sum('dasar_pengenaan_pajak');
            $sptlinescountpph_terutang=SptTahunanIVLinesA::where('formulir_id',$request->formulir_id)->sum('pph_terutang');
            $sptlinesb=SptTahunanIVLinesB::where('formulir_id',$request->formulir_id)->get();
            $sptlinesbpenghasilan_bruto=SptTahunanIVLinesB::where('formulir_id',$request->formulir_id)->sum('penghasilan_bruto');
            // dd($sptlinescount);
        }else{
            $spt=SptTahunanIVHead::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptlinesa=SptTahunanIVLinesA::where('formulir_id',$request->formulir_id)->get();
            $sptlinescountdasar_pengenaan_pajak=SptTahunanIVLinesA::where('formulir_id',$request->formulir_id)->sum('dasar_pengenaan_pajak');
            $sptlinescountpph_terutang=SptTahunanIVLinesA::where('formulir_id',$request->formulir_id)->sum('pph_terutang');
            $sptlinesb=SptTahunanIVLinesB::where('formulir_id',$request->formulir_id)->get();
            $sptlinesbpenghasilan_bruto=SptTahunanIVLinesB::where('formulir_id',$request->formulir_id)->sum('penghasilan_bruto');
        }
        if($spt==null){
            return back();
        }
        return view('spttahunan.formulirempat',compact('spt','sptlinesa','sptlinesb','sptlinescountpph_terutang','sptlinescountdasar_pengenaan_pajak','sptlinesbpenghasilan_bruto'))->with('no',1)->with('non',1);
    }
    public function formulirkelima(Request $request){
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptTahunanVHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptlinesa=SptTahunanVLinesA::where('formulir_id',$request->formulir_id)->get();
            $sptlinesb=SptTahunanVLinesB::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptTahunanVHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptlinesa=SptTahunanVLinesA::where('formulir_id',$request->formulir_id)->get();
            $sptlinesb=SptTahunanVLinesB::where('formulir_id',$request->formulir_id)->get();
        }
        if($spt==null){
            return back();
        }
        return view('spttahunan.formulirlima',compact('spt','sptlinesa','sptlinesb'))->with('no',1)->with('non',1);
    }
    public function formulirkeenam(Request $request){
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptTahunanVIHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptlinesa=SptTahunanVILinesA::where('formulir_id',$request->formulir_id)->get();
            $sptlinesb=SptTahunanVILinesB::where('formulir_id',$request->formulir_id)->get();
            $sptlinesc=SptTahunanVILinesC::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptTahunanVIHead::where('formulir_id',$request->formulir_id)->get()->first();
            $sptlinesa=SptTahunanVILinesA::where('formulir_id',$request->formulir_id)->get();
            $sptlinesb=SptTahunanVILinesB::where('formulir_id',$request->formulir_id)->get();
            $sptlinesc=SptTahunanVILinesC::where('formulir_id',$request->formulir_id)->get();
        }
        if($spt==null){
            return back();
        }
        return view('spttahunan.formulirenam',compact('spt','sptlinesa','sptlinesb','sptlinesc'))->with('no',1)->with('nob',1)->with('noc',1);

    }
   
}
