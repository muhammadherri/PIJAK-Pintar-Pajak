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
use App\Models\HutangPpn;
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
use App\Models\SptMasa;
use App\Models\Ebupot;
use App\Models\SptMasaLineB;
use App\Models\SptMasaLineC;
use App\Models\SptMasaA;
use App\Models\SptMasaB;
use App\Models\SptMasaI;
use App\Models\SptMasaILine;
use App\Models\SptMasaII;
use App\Models\SptMasaIILine;
use App\Models\SptMasaIII;
use App\Models\SptMasaIIILine;
use App\Models\SptMasaIV;
use App\Models\SptMasaIVLine;
use App\Models\SptMasaV;
use App\Models\SptMasaVI;
use App\Models\SptMasaVILine;
use App\Models\SptMasaVII;
use App\Models\SptMasaVIILine;
use App\Models\MasaBulan;
use App\Models\SptPpn;
use App\Models\SptPpnLinea1;
use App\Models\SptPpnLinea2;
use App\Models\SptPpnLineb1;
use App\Models\SptPpnLineb2;
use App\Models\SptPpnLineb3;
use App\Models\Pphfinal;
use App\Models\PphTidakFinal;
use App\Models\LatihanKeuangan;
use App\Models\Spt1770S;
use App\Models\Spt1770SS;
use App\Models\AkunTest;
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
                "besaran_ptkp" => number_format($record->besaran_ptkp),
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
                "created_at" => $record->updated_at->format('d-M-Y'),
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

            $inv = Invoice::orderBy('id','desc')->get();
        }else{
            $inv = Invoice::orderBy('id','desc')->where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($inv);
        foreach ($inv as $record) {
            $data_arr[] = array(
                "id" => $record->invoice_id,
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
    public function listBupot(Request $request){
        // dd('masuk');
        $id=Auth::user()->id;
        // $invcount = Invoice::where('attribute1',$id)->sum('total');
        if(Auth::user()->status==1){
            $bupot = Ebupot::whereNotNull('trx')->orderBy('id','desc')->get();
        }else{
            $bupot = Ebupot::whereNotNull('trx')->orderBy('id','desc')->where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($inv);
        foreach ($bupot as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "trx" => $record->trx,
                "jenis_pph" => $record->jenispph->jenis_pph,
                "no_tlp" => $record->no_tlp,
                "fasilitas" => $record->fasilitases->jenis_fasilitas,
                "kop" => $record->kodeobjek->keterangan,
                "created_by" => $record->users->name,
                "potongan" => number_format($record->potongan_pph),
                "ttd" => $record->ttd->name,
                "tgl_buktiPotong" => Carbon::parse($record->tanggal_bukti_potong)->format('d-M-Y'),
                "tgl_periodePajak" => Carbon::parse($record->periode_pajak)->format('d-M-Y'),
                "tgl_pembuat" => Carbon::parse($record->created_at)->format('d-M-Y'),
                "status" => $record->attribute3,
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listPph(Request $request){
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $pph21 = TransaksiPphDuapuluhSatu::orderBy('id','desc')->get();
        }else{
            $pph21 = TransaksiPphDuapuluhSatu::orderBy('id','desc')->where('attribute1',$id)->get();
        }
        $data_arr = array();
        foreach ($pph21 as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "nama_wajib_pajak" => $record->nama_wajib_pajak,
                "no_npwp" => $record->no_npwp,
                "masa_penghasilan_start" => Carbon::parse($record->masa_penghasilan_start)->format('d-M-Y'),
                "ptkp" => number_format($record->ptkp),
                "ketentuan_ptkp" => number_format($record->tunjangan_lain),
                "bruto" => number_format($record->penghasilan_bruto),
                "total_pengurang" => number_format($record->total_pengurangan),
                "gaji_pensiun" => number_format($record->gaji_pensiun),
                "created_at" => $record->created_at->format('d-M-Y'),
                "status_npwp" => $record->status_npwp,
                "pph21pkp" => number_format($record->pph21ataspkp),
                "pph21potongan" => number_format($record->pph21_dipotong_sebelumnya),
                "pph21terutang" => number_format($record->pph21_terutang),
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
            $fiskal = JurnalManual::where('attribute3',NULL)->get();
        }else{
            $fiskal = JurnalManual::where('attribute3',NULL)->where('attribute1',$id)->get();
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
    public function listLatihan(Request $request){
        $id=Auth::user()->id;
        // dd($request);
        if(Auth::user()->status==1){
            $fiskal = JurnalManual::where('attribute3','1')->get();
        }else{
            $fiskal = JurnalManual::where('attribute3','1')->where('attribute1',$id)->get();
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
                "created_at" => $record->created_at->format('d-M-Y'),
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listBilling(Request $request){
        $id=Auth::user()->id;
        // $invcount = Invoice::where('attribute1',$id)->sum('total');
        if(Auth::user()->status==1){
            $billing = Billing::get();
        }else{
            $billing = Billing::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($inv);
        foreach ($billing as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "trxbilling" =>$record->kode_billing,
                "npwp" => $record->npwp,
                "jenispajak" => $record->jenis_pajak,
                "jenis_setoran" => $record->kode_jenis_setoran,
                "masapajak" => $record->masa_pajak,
                "masaaktif" => Carbon::parse($record->end_periode_pajak)->format('d-M-Y'),
                "jumlah" => number_format($record->jumlah,2),
                "created_by" => $record->users->name,
                "status" => $record->attribute3,
                "created_at" => $record->created_at->format('d-M-Y'),
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listHutangppn(Request $request){
        $id=Auth::user()->id;
        // $invcount = Invoice::where('attribute1',$id)->sum('total');
        if(Auth::user()->status==1){
            $hutangppn = HutangPpn::get();
        }else{
            $hutangppn = HutangPpn::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($inv);
        foreach ($hutangppn as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "trx" =>$record->trx,
                "ppn_masuk" => number_format($record->jumlah_ppn_masuk,2),
                "ppn_keluar" => number_format($record->jumlah_ppn_keluar,2),
                "hutang_ppn" => number_format($record->hutang_ppn,2),
                "created_by" => $record->users->name,
                "status" => $record->attribute3,
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
                "id" => $record->formulir_id,
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
    public function listSpt1721(Request $request){
        // dd('masauk');
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt = SptMasa::get();
        }else{
            $spt = SptMasa::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($spt);
        foreach ($spt as $record) {
            $data_arr[] = array(
                "id" => $record->formulir_id,
                "nama" => $record->nama,
                "no_npwp" => $record->npwp,
                "alamat" => $record->alamat,
                "masapajak" => $record->bulan->nama_bulan,
                "tahun_pajak" => $record->masa_pajak_tahun,
                "tempat" =>  $record->tempat_ttd,
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
    public function listSptPPN(Request $request){
        // dd('masauk');
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt = SptMasa::get();
        }else{
            $spt = SptMasa::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($spt);
        foreach ($spt as $record) {
            $data_arr[] = array(
                "id" => $record->formulir_id,
                "nama" => $record->nama,
                "no_npwp" => $record->npwp,
                "alamat" => $record->alamat,
                "masapajak" => $record->bulan->nama_bulan,
                "tahun_pajak" => $record->masa_pajak_tahun,
                "tempat" =>  $record->tempat_ttd,
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
    public function listspt1770s(Request $request){
        // dd('masuk');
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt = Spt1770S::get();
        }else{
            $spt = Spt1770S::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($spt);
        foreach ($spt as $record) {
            $data_arr[] = array(
                "id" => $record->formulir_id,
                "no_npwp" => $record->npwp,
                "nama_npwp" => $record->nama_npwp,
                "pekerjaan" => $record->pekerjaan,
                "klu" => $record->klu,
                "notelp" =>  $record->no_telp,
                "statuskewajiban" =>  $record->status_kewajiban,
                "npwppasangan" =>  $record->npwp_pasangan,
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
    public function listspt1770ss(Request $request){
        // dd('masuk');
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt = Spt1770SS::get();
        }else{
            $spt = Spt1770SS::where('attribute1',$id)->get();
        }
        $data_arr = array();
        // dd($spt);
        foreach ($spt as $record) {
            $data_arr[] = array(
                "id" => $record->formulir_id,
                "no_npwp" => $record->id_npwp,
                "nama_npwp" => $record->id_nama_npwp,
                "penghasilankenapajak" => $record->a4_pajak,
                "jumlahpajak" => $record->a7_jumlah_pajak,
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
    public function masanext(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasa::where('formulir_id',$request->formulir_id)->get()->first();
            // dd($sptI);
            $sptLineC=SptMasaLineC::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasa::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLineC=SptMasaLineC::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.formulirsatu',compact('spt','sptLineC'));
    }
    public function masapertama(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaI::where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaILine::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasaI::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaILine::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaspertama',compact('spt','sptLine'));
    }
    public function masakedua(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaII::where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaIILine::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasaII::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaIILine::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaskedua',compact('spt','sptLine'));
    }
    public function masaketiga(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaIII::where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaIIILine::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasaIII::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaIIILine::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmasketiga',compact('spt','sptLine'));
    }
    public function masakeempat(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaIV::where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaIVLine::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasaIV::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaIVLine::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaskeempat',compact('spt','sptLine'));
    }
    public function masakelima(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaV::where('formulir_id',$request->formulir_id)->get()->first();

        }else{
            $spt=SptMasaV::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaskelima',compact('spt',));
    }
    public function masakeenam(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaVI::where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaVILine::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasaVI::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaVILine::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaskeenam',compact('spt','sptLine'));
    }
    public function masaketujuh(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaVII::where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaVIILine::where('formulir_id',$request->formulir_id)->get();

        }else{
            $spt=SptMasaVII::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptLine=SptMasaVIILine::where('formulir_id',$request->formulir_id)->get();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmasketujuh',compact('spt','sptLine'));
    }
    public function masakeasatu(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaA::where('formulir_id',$request->formulir_id)->get()->first();

        }else{
            $spt=SptMasaA::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaskeasatu',compact('spt'));
    }
    public function masakeadua(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptMasaB::where('formulir_id',$request->formulir_id)->get()->first();

        }else{
            $spt=SptMasaB::where('attribute1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
        }

        if($spt==null){
            return back();
        }
        return view('sptmasapajak.sptmaskeadua',compact('spt'));
    }
    public function latihankeuanganfiskal(Request $request){
        $id=Auth::user()->id;

        // 1110
        $asetlancar1110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1110')->get();
        $debit1110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1110')->sum('nilai_debit');
        $kredit1110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1110')->sum('nilai_kredit');
        // 1110
        
        // 1111
        $asetlancar1111=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1111')->get();
        $debit1111=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1111')->sum('nilai_debit');
        $kredit1111=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1111')->sum('nilai_kredit');
        // 1111
        
        // 1112
        $asetlancar1112=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1112')->get();
        $debit1112=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1112')->sum('nilai_debit');
        $kredit1112=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1112')->sum('nilai_kredit');
        // 1112

        // 1113
        $asetlancar1113=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1113')->get();
        $debit1113=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1113')->sum('nilai_debit');
        $kredit1113=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1113')->sum('nilai_kredit');
        // 1113

        // 1114
        $asetlancar1114=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1114')->get();
        $debit1114=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1114')->sum('nilai_debit');
        $kredit1114=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1114')->sum('nilai_kredit');
        // 1114

        // 1120
        $asetlancar1120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1120')->get();
        $debit1120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1120')->sum('nilai_debit');
        $kredit1120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1120')->sum('nilai_kredit');
        // 1120

        // 1130
        $asetlancar1130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1130')->get();
        $debit1130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1130')->sum('nilai_debit');
        $kredit1130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1130')->sum('nilai_kredit');
        // 1130
        
        // 1210
        $asetlancar1210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1210')->get();
        $debit1210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1210')->sum('nilai_debit');
        $kredit1210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1210')->sum('nilai_kredit');
        // 1210

        // 1220
        $asetlancar1220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1220')->get();
        $debit1220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1220')->sum('nilai_debit');
        $kredit1220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1220')->sum('nilai_kredit');
        // 1220

        // 1230
        $asetlancar1230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1230')->get();
        $debit1230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1230')->sum('nilai_debit');
        $kredit1230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1230')->sum('nilai_kredit');
        // 1230

        // 1240
        $asetlancar1240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1240')->get();
        $debit1240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1240')->sum('nilai_debit');
        $kredit1240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1240')->sum('nilai_kredit');
        // 1240

        // 1250
        $asetlancar1250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1250')->get();
        $debit1250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1250')->sum('nilai_debit');
        $kredit1250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1250')->sum('nilai_kredit');
        // 1250

        // 1251
        $asetlancar1251=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1251')->get();
        $debit1251=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1251')->sum('nilai_debit');
        $kredit1251=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1251')->sum('nilai_kredit');
        // 1251

        // 1260
        $asetlancar1260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1260')->get();
        $debit1260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1260')->sum('nilai_debit');
        $kredit1260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1260')->sum('nilai_kredit');
        // 1260
        // 1270
        $asetlancar1270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1270')->get();
        $debit1270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1270')->sum('nilai_debit');
        $kredit1270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1270')->sum('nilai_kredit');
        // 1270
        // 1271
        $asetlancar1271=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1271')->get();
        $debit1271=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1271')->sum('nilai_debit');
        $kredit1271=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1271')->sum('nilai_kredit');
        // 1271
        // 1272
        $asetlancar1272=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1272')->get();
        $debit1272=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1272')->sum('nilai_debit');
        $kredit1272=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1272')->sum('nilai_kredit');
        // 1272
        // 1273
        $asetlancar1273=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1273')->get();
        $debit1273=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1273')->sum('nilai_debit');
        $kredit1273=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1273')->sum('nilai_kredit');
        // 1273
        // 1274
        $asetlancar1274=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1274')->get();
        $debit1274=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1274')->sum('nilai_debit');
        $kredit1274=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1274')->sum('nilai_kredit');
        // 1274
        // 1275
        $asetlancar1275=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1275')->get();
        $debit1275=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1275')->sum('nilai_debit');
        $kredit1275=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1275')->sum('nilai_kredit');
        // 1275
        // 1310
        $asetlancar1310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1310')->get();
        $debit1310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1310')->sum('nilai_debit');
        $kredit1310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1310')->sum('nilai_kredit');
        // 1310
        // 1312
        $asetlancar1312=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1312')->get();
        $debit1312=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1312')->sum('nilai_debit');
        $kredit1312=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1312')->sum('nilai_kredit');
        // 1312

        
        // 1313
        $asetlancar1313=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1313')->get();
        $debit1313=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1313')->sum('nilai_debit');
        $kredit1313=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1313')->sum('nilai_kredit');
        // 1313
        
        // 1314
        $asetlancar1314=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1314')->get();
        $debit1314=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1314')->sum('nilai_debit');
        $kredit1314=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1314')->sum('nilai_kredit');
        // 1314

        // 1330
        $asetlancar1330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1330')->get();
        $debit1330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1330')->sum('nilai_debit');
        $kredit1330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1330')->sum('nilai_kredit');
        // 1330
        // 1340
        $asetlancar1340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1340')->get();
        $debit1340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1340')->sum('nilai_debit');
        $kredit1340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1340')->sum('nilai_kredit');
        // 1340
        // 1341
        $asetlancar1341=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1341')->get();
        $debit1341=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1341')->sum('nilai_debit');
        $kredit1341=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1341')->sum('nilai_kredit');
        // 1341
        // 1342
        $asetlancar1342=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1342')->get();
        $debit1342=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1342')->sum('nilai_debit');
        $kredit1342=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1342')->sum('nilai_kredit');
        // 1342
        // 1360
        $asetlancar1360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1360')->get();
        $debit1360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1360')->sum('nilai_debit');
        $kredit1360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1360')->sum('nilai_kredit');
        // 1360
        // 1361
        $asetlancar1361=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1361')->get();
        $debit1361=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1361')->sum('nilai_debit');
        $kredit1361=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1361')->sum('nilai_kredit');
        // 1361
        // 1362
        $asetlancar1362=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1362')->get();
        $debit1362=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1362')->sum('nilai_debit');
        $kredit1362=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1362')->sum('nilai_kredit');
        // 1362
        // 1380
        $asetlancar1380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1380')->get();
        $debit1380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1380')->sum('nilai_debit');
        $kredit1380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1380')->sum('nilai_kredit');
        // 1380
        // 1410
        $asetlancar1410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1410')->get();
        $debit1410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1410')->sum('nilai_debit');
        $kredit1410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1410')->sum('nilai_kredit');
        // 1410
        // 1420
        $asetlancar1420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1420')->get();
        $debit1420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1420')->sum('nilai_debit');
        $kredit1420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1420')->sum('nilai_kredit');
        // 1420
        // 1430
        $asetlancar1430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1430')->get();
        $debit1430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1430')->sum('nilai_debit');
        $kredit1430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1430')->sum('nilai_kredit');
        // 1430
        // 1440
        $asetlancar1440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1440')->get();
        $debit1440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1440')->sum('nilai_debit');
        $kredit1440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1440')->sum('nilai_kredit');
        // 1440
        // 1450
        $asetlancar1450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1450')->get();
        $debit1450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1450')->sum('nilai_debit');
        $kredit1450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1450')->sum('nilai_kredit');
        // 1450
        // 1460
        $asetlancar1460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1460')->get();
        $debit1460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1460')->sum('nilai_debit');
        $kredit1460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1460')->sum('nilai_kredit');
        // 1460

        // 1510
        $asetlancar1510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1510')->get();
        $debit1510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1510')->sum('nilai_debit');
        $kredit1510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1510')->sum('nilai_kredit');
        // 1510

        // 1520
        $asetlancar1520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1520')->get();
        $debit1520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1520')->sum('nilai_debit');
        $kredit1520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1520')->sum('nilai_kredit');
        // 1520

        // 1530
        $asetlancar1530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1530')->get();
        $debit1530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1530')->sum('nilai_debit');
        $kredit1530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1530')->sum('nilai_kredit');
        // 1530

        // 1540
        $asetlancar1540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1540')->get();
        $debit1540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1540')->sum('nilai_debit');
        $kredit1540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1540')->sum('nilai_kredit');
        // 1540
        
        // 1550
        $asetlancar1550=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1550')->get();
        $debit1550=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1550')->sum('nilai_debit');
        $kredit1550=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1550')->sum('nilai_kredit');
        // 1550
        // 1600
        $asetlancar1600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1600')->get();
        $debit1600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1600')->sum('nilai_debit');
        $kredit1600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1600')->sum('nilai_kredit');
        // 1600
        // 1610
        $asetlancar1610=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1610')->get();
        $debit1610=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1610')->sum('nilai_debit');
        $kredit1610=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1610')->sum('nilai_kredit');
        // 1610
        // 1620
        $asetlancar1620=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1620')->get();
        $debit1620=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1620')->sum('nilai_debit');
        $kredit1620=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1620')->sum('nilai_kredit');
        // 1620
        // 1630
        $asetlancar1630=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1630')->get();
        $debit1630=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1630')->sum('nilai_debit');
        $kredit1630=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1630')->sum('nilai_kredit');
        // 1630
        // 1640
        $asetlancar1640=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1640')->get();
        $debit1640=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1640')->sum('nilai_debit');
        $kredit1640=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1640')->sum('nilai_kredit');
        // 1640
        // 2110
        $asetlancar2110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2110')->get();
        $debit2110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2110')->sum('nilai_debit');
        $kredit2110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2110')->sum('nilai_kredit');
        // 2110
        // 2120
        $asetlancar2120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2120')->get();
        $debit2120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2120')->sum('nilai_debit');
        $kredit2120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2120')->sum('nilai_kredit');
        // 2120
        // 2130
        $asetlancar2130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2130')->get();
        $debit2130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2130')->sum('nilai_debit');
        $kredit2130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2130')->sum('nilai_kredit');
        // 2130
        // 2140
        $asetlancar2140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2140')->get();
        $debit2140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2140')->sum('nilai_debit');
        $kredit2140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2140')->sum('nilai_kredit');
        // 2140
        // 2150
        $asetlancar2150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2150')->get();
        $debit2150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2150')->sum('nilai_debit');
        $kredit2150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2150')->sum('nilai_kredit');
        // 2150
        // 2160
        $asetlancar2160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2160')->get();
        $debit2160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2160')->sum('nilai_debit');
        $kredit2160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2160')->sum('nilai_kredit');
        // 2160
        // 2310
        $asetlancar2310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2310')->get();
        $debit2310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2310')->sum('nilai_debit');
        $kredit2310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2310')->sum('nilai_kredit');
        // 2310
        // 2320
        $asetlancar2320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2320')->get();
        $debit2320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2320')->sum('nilai_debit');
        $kredit2320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2320')->sum('nilai_kredit');
        // 2320

        // 2330
        $asetlancar2330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2330')->get();
        $debit2330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2330')->sum('nilai_debit');
        $kredit2330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2330')->sum('nilai_kredit');
        // 2330

        // 2210
        $asetlancar2210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2210')->get();
        $debit2210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2210')->sum('nilai_debit');
        $kredit2210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2210')->sum('nilai_kredit');
        // 2210
        // 2220
        $asetlancar2220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2220')->get();
        $debit2220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2220')->sum('nilai_debit');
        $kredit2220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2220')->sum('nilai_kredit');
        // 2220
        // 2221
        $asetlancar2221=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2221')->get();
        $debit2221=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2221')->sum('nilai_debit');
        $kredit2221=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2221')->sum('nilai_kredit');
        // 2221
        // 2222
        $asetlancar2222=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2222')->get();
        $debit2222=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2222')->sum('nilai_debit');
        $kredit2222=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2222')->sum('nilai_kredit');
        // 2222
        // 2223
        $asetlancar2223=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2223')->get();
        $debit2223=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2223')->sum('nilai_debit');
        $kredit2223=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2223')->sum('nilai_kredit');
        // 2223
        // 2224
        $asetlancar2224=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2224')->get();
        $debit2224=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2224')->sum('nilai_debit');
        $kredit2224=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2224')->sum('nilai_kredit');
        // 2224
        // 2230
        $asetlancar2230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2230')->get();
        $debit2230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2230')->sum('nilai_debit');
        $kredit2230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2230')->sum('nilai_kredit');
        // 2230
        // 2710
        $asetlancar2710=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2710')->get();
        $debit2710=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2710')->sum('nilai_debit');
        $kredit2710=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2710')->sum('nilai_kredit');
        // 2710
        // 2720
        $asetlancar2720=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2720')->get();
        $debit2720=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2720')->sum('nilai_debit');
        $kredit2720=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2720')->sum('nilai_kredit');
        // 2720
        // 2730
        $asetlancar2730=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2730')->get();
        $debit2730=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2730')->sum('nilai_debit');
        $kredit2730=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2730')->sum('nilai_kredit');
        // 2730
        // 2740
        $asetlancar2740=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2740')->get();
        $debit2740=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2740')->sum('nilai_debit');
        $kredit2740=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2740')->sum('nilai_kredit');
        // 2740
        // 2750
        $asetlancar2750=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2750')->get();
        $debit2750=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2750')->sum('nilai_debit');
        $kredit2750=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2750')->sum('nilai_kredit');
        // 2750
        // 2760
        $asetlancar2760=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2760')->get();
        $debit2760=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2760')->sum('nilai_debit');
        $kredit2760=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2760')->sum('nilai_kredit');
        // 2760
        // 3100
        $asetlancar3100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3100')->get();
        $debit3100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3100')->sum('nilai_debit');
        $kredit3100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3100')->sum('nilai_kredit');
        // 3100
        // 3110
        $asetlancar3110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3110')->get();
        $debit3110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3110')->sum('nilai_debit');
        $kredit3110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3110')->sum('nilai_kredit');
        // 3110
        // 3200
        $asetlancar3200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3200')->get();
        $debit3200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3200')->sum('nilai_debit');
        $kredit3200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3200')->sum('nilai_kredit');
        // 3200
        // 3300
        $asetlancar3300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3300')->get();
        $debit3300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3300')->sum('nilai_debit');
        $kredit3300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3300')->sum('nilai_kredit');
        // 3300

        // $LatihanKeuanganaset=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','<','1200')->get();
        // $lineaset=JurnalManual::where('attribute1',$id)->where('attribute3',1)->whereBetween('created_at',[$mulai,$selesai])->where('no_akun_debit','<','1200')->orWhere('no_akun_kredit','<','1200')->get();
        $totalaktivalancar=LatihanKeuangan::where('no_akun','<','1500')->whereNot('saldo',0)->sum('saldo');
        $nilaiaktivatetap=LatihanKeuangan::where('no_akun','>','1510')->whereNot('saldo',0)->where('no_akun','<','1550')->sum('saldo');
        $nilaipenyusutan=LatihanKeuangan::where('no_akun','>','1550')->whereNot('saldo',0)->where('no_akun','<','1650')->sum('saldo');
        $totalaktivatetap = $nilaiaktivatetap+$nilaipenyusutan;
        $totalaktiva = $totalaktivalancar+$totalaktivatetap;

        $totalliabilitislancar=LatihanKeuangan::where('no_akun','>','2100')->where('no_akun','<','2710')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitisjangkapanjang=LatihanKeuangan::where('no_akun','>','2700')->where('no_akun','<','2770')->whereNot('saldo',0)->sum('saldo');
        $totalmodal=LatihanKeuangan::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitasmodal = $totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        
        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','<','3300')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','<','3300')->sum('nilai_kredit');
        $totalkomersial=$totalliabilitasmodal+$totaldebit-$totalkredit;
        // DD($totalliabilitislancar);
        // ASET LANCAR 
        return view('laporan.latihanlaporankeuanganfiskal',compact( 
            'totaldebit','totalkredit','totalkomersial',
            'kredit1110','debit1110','asetlancar1110',
            'asetlancar1111','debit1111','kredit1111',
            'asetlancar1112','debit1112','kredit1112',
            'asetlancar1113','debit1113','kredit1113',
            'asetlancar1114','debit1114','kredit1114',
            'asetlancar1120','debit1120','kredit1120',
            'asetlancar1130','debit1130','kredit1130',
            'asetlancar1210','debit1210','kredit1210',
            'asetlancar1220','debit1220','kredit1220',
            'asetlancar1230','debit1230','kredit1230',
            'asetlancar1240','debit1240','kredit1240',
            'asetlancar1250','debit1250','kredit1250',
            'asetlancar1251','debit1251','kredit1251',
            'asetlancar1260','debit1260','kredit1260',
            'asetlancar1270','debit1270','kredit1270',
            'asetlancar1271','debit1271','kredit1271',
            'asetlancar1272','debit1272','kredit1272',
            'asetlancar1273','debit1273','kredit1273',
            'asetlancar1274','debit1274','kredit1274',
            'asetlancar1275','debit1275','kredit1275',
            'asetlancar1310','debit1310','kredit1310',
            'asetlancar1312','debit1312','kredit1312','totalaktivalancar',
            'asetlancar1313','debit1313','kredit1313',
            'asetlancar1314','debit1314','kredit1314',
            'asetlancar1330','debit1330','kredit1330',
            'asetlancar1340','debit1340','kredit1340',
            'asetlancar1341','debit1341','kredit1341',
            'asetlancar1342','debit1342','kredit1342',
            'asetlancar1360','debit1360','kredit1360',
            'asetlancar1361','debit1361','kredit1361',
            'asetlancar1362','debit1362','kredit1362',
            'asetlancar1380','debit1380','kredit1380',
            'asetlancar1410','debit1410','kredit1410',
            'asetlancar1420','debit1420','kredit1420',
            'asetlancar1430','debit1430','kredit1430',
            'asetlancar1440','debit1440','kredit1440',
            'asetlancar1450','debit1450','kredit1450',
            'asetlancar1460','debit1460','kredit1460',
            'asetlancar1510','debit1510','kredit1510',
            'asetlancar1520','debit1520','kredit1520',
            'asetlancar1530','debit1530','kredit1530',
            'asetlancar1540','debit1540','kredit1540',
            'asetlancar1550','debit1550','kredit1550','nilaiaktivatetap',
            'asetlancar1600','debit1600','kredit1600',
            'asetlancar1610','debit1610','kredit1610',
            'asetlancar1620','debit1620','kredit1620',
            'asetlancar1630','debit1630','kredit1630',
            'asetlancar1640','debit1640','kredit1640',
            'asetlancar2110','debit2110','kredit2110','nilaipenyusutan','totalaktivatetap','totalaktiva',
            'asetlancar2120','debit2120','kredit2120',
            'asetlancar2130','debit2130','kredit2130',
            'asetlancar2140','debit2140','kredit2140',
            'asetlancar2150','debit2150','kredit2150',
            'asetlancar2160','debit2160','kredit2160',
            'asetlancar2310','debit2310','kredit2310',
            'asetlancar2320','debit2320','kredit2320',
            'asetlancar2330','debit2330','kredit2330',
            'asetlancar2210','debit2210','kredit2210',
            'asetlancar2220','debit2220','kredit2220',
            'asetlancar2221','debit2221','kredit2221',
            'asetlancar2222','debit2222','kredit2222',
            'asetlancar2223','debit2223','kredit2223',
            'asetlancar2224','debit2224','kredit2224',
            'asetlancar2230','debit2230','kredit2230',
            'asetlancar2710','debit2710','kredit2710','totalliabilitislancar',
            'asetlancar2720','debit2720','kredit2720',
            'asetlancar2730','debit2730','kredit2730',
            'asetlancar2740','debit2740','kredit2740',
            'asetlancar2750','debit2750','kredit2750',
            'asetlancar2760','debit2760','kredit2760',
            'asetlancar3100','debit3100','kredit3100',
            'asetlancar3110','debit3110','kredit3110',
            'asetlancar3200','debit3200','kredit3200',
            'asetlancar3300','debit3300','kredit3300','totalmodal','totalliabilitasmodal'
        ));

    }
    public function latihankeuanganlabarugifiskal(Request $request){
        $id=Auth::user()->id;

        // 4100
        $asetlancar4100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4100')->get();
        $debit4100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4100')->sum('nilai_debit');
        $kredit4100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4100')->sum('nilai_kredit');
         // 4100
         // 4101
         $asetlancar4101=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4101')->get();
         $debit4101=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4101')->sum('nilai_debit');
         $kredit4101=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4101')->sum('nilai_kredit');
        //  dd($asetlancar4101);
         // 4101
        // 4102
        $asetlancar4102=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4102')->get();
        $debit4102=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4102')->sum('nilai_debit');
        $kredit4102=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4102')->sum('nilai_kredit');
         // 4102
        // 4103
        $asetlancar4103=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4103')->get();
        $debit4103=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4103')->sum('nilai_debit');
        $kredit4103=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4103')->sum('nilai_kredit');
         // 4103
        // 4104
        $asetlancar4104=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4104')->get();
        $debit4104=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4104')->sum('nilai_debit');
        $kredit4104=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4104')->sum('nilai_kredit');
         // 4104
        // 4200
        $asetlancar4200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4200')->get();
        $debit4200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4200')->sum('nilai_debit');
        $kredit4200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4200')->sum('nilai_kredit');
         // 4200
        // 4201
        $asetlancar4201=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4201')->get();
        $debit4201=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4201')->sum('nilai_debit');
        $kredit4201=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4201')->sum('nilai_kredit');
         // 4201
        // 4202
        $asetlancar4202=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4202')->get();
        $debit4202=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4202')->sum('nilai_debit');
        $kredit4202=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4202')->sum('nilai_kredit');
         // 4202
        // 4203
        $asetlancar4203=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4203')->get();
        $debit4203=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4203')->sum('nilai_debit');
        $kredit4203=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4203')->sum('nilai_kredit');
         // 4203
        // 4300
        $asetlancar4300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4300')->get();
        $debit4300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4300')->sum('nilai_debit');
        $kredit4300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4300')->sum('nilai_kredit');
         // 4300
        // 4310
        $asetlancar4310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4310')->get();
        $debit4310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4310')->sum('nilai_debit');
        $kredit4310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4310')->sum('nilai_kredit');
         // 4310
        // 4320
        $asetlancar4320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4320')->get();
        $debit4320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4320')->sum('nilai_debit');
        $kredit4320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4320')->sum('nilai_kredit');
         // 4320
        // 4330
        $asetlancar4330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4330')->get();
        $debit4330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4330')->sum('nilai_debit');
        $kredit4330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4330')->sum('nilai_kredit');
         // 4330
        // 4340
        $asetlancar4340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4340')->get();
        $debit4340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4340')->sum('nilai_debit');
        $kredit4340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4340')->sum('nilai_kredit');
         // 4340
        // 4350
        $asetlancar4350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4350')->get();
        $debit4350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4350')->sum('nilai_debit');
        $kredit4350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4350')->sum('nilai_kredit');
         // 4350
        // 4105
        $asetlancar4105=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4105')->get();
        $debit4105=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4105')->sum('nilai_debit');
        $kredit4105=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4105')->sum('nilai_kredit');
         // 4105
        // 5100
        $asetlancar5100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5100')->get();
        $debit5100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5100')->sum('nilai_debit');
        $kredit5100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5100')->sum('nilai_kredit');
         // 5100
        // 5110
        $asetlancar5110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5110')->get();
        $debit5110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5110')->sum('nilai_debit');
        $kredit5110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5110')->sum('nilai_kredit');
         // 5110
        // 5120
        $asetlancar5120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5120')->get();
        $debit5120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5120')->sum('nilai_debit');
        $kredit5120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5120')->sum('nilai_kredit');
         // 5120
        // 5200
        $asetlancar5200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5200')->get();
        $debit5200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5200')->sum('nilai_debit');
        $kredit5200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5200')->sum('nilai_kredit');
         // 5200
        // 5210
        $asetlancar5210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5210')->get();
        $debit5210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5210')->sum('nilai_debit');
        $kredit5210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5210')->sum('nilai_kredit');
         // 5210
        // 5211
        $asetlancar5211=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5211')->get();
        $debit5211=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5211')->sum('nilai_debit');
        $kredit5211=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5211')->sum('nilai_kredit');
         // 5211
        // 5212
        $asetlancar5212=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5212')->get();
        $debit5212=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5212')->sum('nilai_debit');
        $kredit5212=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5212')->sum('nilai_kredit');
         // 5212
        // 5213
        $asetlancar5213=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5213')->get();
        $debit5213=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5213')->sum('nilai_debit');
        $kredit5213=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5213')->sum('nilai_kredit');
         // 5213
        // 5250
        $asetlancar5250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5250')->get();
        $debit5250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5250')->sum('nilai_debit');
        $kredit5250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5250')->sum('nilai_kredit');
         // 5250
        // 5260
        $asetlancar5260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5260')->get();
        $debit5260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5260')->sum('nilai_debit');
        $kredit5260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5260')->sum('nilai_kredit');
         // 5260
        // 5300
        $asetlancar5300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5300')->get();
        $debit5300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5300')->sum('nilai_debit');
        $kredit5300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5300')->sum('nilai_kredit');
         // 5300
        // 5400
        $asetlancar5400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5400')->get();
        $debit5400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5400')->sum('nilai_debit');
        $kredit5400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5400')->sum('nilai_kredit');
         // 5400
        // 5410
        $asetlancar5410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5410')->get();
        $debit5410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5410')->sum('nilai_debit');
        $kredit5410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5410')->sum('nilai_kredit');
         // 5410
        // 5420
        $asetlancar5420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5420')->get();
        $debit5420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5420')->sum('nilai_debit');
        $kredit5420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5420')->sum('nilai_kredit');
         // 5420
        // 5430
        $asetlancar5430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5430')->get();
        $debit5430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5430')->sum('nilai_debit');
        $kredit5430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5430')->sum('nilai_kredit');
         // 5430
        // 5440
        $asetlancar5440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5440')->get();
        $debit5440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5440')->sum('nilai_debit');
        $kredit5440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5440')->sum('nilai_kredit');
         // 5440
        // 5450
        $asetlancar5450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5450')->get();
        $debit5450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5450')->sum('nilai_debit');
        $kredit5450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5450')->sum('nilai_kredit');
         // 5450
        // 5460
        $asetlancar5460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5460')->get();
        $debit5460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5460')->sum('nilai_debit');
        $kredit5460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5460')->sum('nilai_kredit');
         // 5460
        // 5470
        $asetlancar5470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5470')->get();
        $debit5470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5470')->sum('nilai_debit');
        $kredit5470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5470')->sum('nilai_kredit');
         // 5470
        // 5480
        $asetlancar5480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5480')->get();
        $debit5480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5480')->sum('nilai_debit');
        $kredit5480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5480')->sum('nilai_kredit');
         // 5480
        // 5600
        $asetlancar5600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5600')->get();
        $debit5600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5600')->sum('nilai_debit');
        $kredit5600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5600')->sum('nilai_kredit');
         // 5600
        // 6100
        $asetlancar6100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6100')->get();
        $debit6100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6100')->sum('nilai_debit');
        $kredit6100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6100')->sum('nilai_kredit');
         // 6100
        // 6110
        $asetlancar6110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6110')->get();
        $debit6110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6110')->sum('nilai_debit');
        $kredit6110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6110')->sum('nilai_kredit');
         // 6110
        // 6120
        $asetlancar6120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6120')->get();
        $debit6120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6120')->sum('nilai_debit');
        $kredit6120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6120')->sum('nilai_kredit');
         // 6120
        // 6130
        $asetlancar6130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6130')->get();
        $debit6130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6130')->sum('nilai_debit');
        $kredit6130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6130')->sum('nilai_kredit');
         // 6130
        // 6140
        $asetlancar6140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6140')->get();
        $debit6140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6140')->sum('nilai_debit');
        $kredit6140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6140')->sum('nilai_kredit');
         // 6140
        // 6150
        $asetlancar6150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6150')->get();
        $debit6150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6150')->sum('nilai_debit');
        $kredit6150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6150')->sum('nilai_kredit');
         // 6150
        // 6160
        $asetlancar6160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6160')->get();
        $debit6160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6160')->sum('nilai_debit');
        $kredit6160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6160')->sum('nilai_kredit');
         // 6160
        // 6170
        $asetlancar6170=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6170')->get();
        $debit6170=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6170')->sum('nilai_debit');
        $kredit6170=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6170')->sum('nilai_kredit');
         // 6170
        // 6180
        $asetlancar6180=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6180')->get();
        $debit6180=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6180')->sum('nilai_debit');
        $kredit6180=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6180')->sum('nilai_kredit');
         // 6180
        // 6190
        $asetlancar6190=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6190')->get();
        $debit6190=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6190')->sum('nilai_debit');
        $kredit6190=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6190')->sum('nilai_kredit');
         // 6190
        // 6200
        $asetlancar6200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6200')->get();
        $debit6200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6200')->sum('nilai_debit');
        $kredit6200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6200')->sum('nilai_kredit');
         // 6200
        // 6210
        $asetlancar6210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6210')->get();
        $debit6210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6210')->sum('nilai_debit');
        $kredit6210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6210')->sum('nilai_kredit');
         // 6210
        // 6220
        $asetlancar6220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6220')->get();
        $debit6220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6220')->sum('nilai_debit');
        $kredit6220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6220')->sum('nilai_kredit');
         // 6220
        // 6230
        $asetlancar6230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6230')->get();
        $debit6230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6230')->sum('nilai_debit');
        $kredit6230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6230')->sum('nilai_kredit');
         // 6230
        // 6240
        $asetlancar6240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6240')->get();
        $debit6240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6240')->sum('nilai_debit');
        $kredit6240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6240')->sum('nilai_kredit');
         // 6240
        // 6250
        $asetlancar6250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6250')->get();
        $debit6250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6250')->sum('nilai_debit');
        $kredit6250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6250')->sum('nilai_kredit');
         // 6250
        // 6260
        $asetlancar6260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6260')->get();
        $debit6260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6260')->sum('nilai_debit');
        $kredit6260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6260')->sum('nilai_kredit');
         // 6260
        // 6270
        $asetlancar6270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6270')->get();
        $debit6270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6270')->sum('nilai_debit');
        $kredit6270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6270')->sum('nilai_kredit');
         // 6270
        // 6280
        $asetlancar6280=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6280')->get();
        $debit6280=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6280')->sum('nilai_debit');
        $kredit6280=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6280')->sum('nilai_kredit');
         // 6280
        // 6290
        $asetlancar6290=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6290')->get();
        $debit6290=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6290')->sum('nilai_debit');
        $kredit6290=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6290')->sum('nilai_kredit');
         // 6290
        // 6300
        $asetlancar6300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6300')->get();
        $debit6300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6300')->sum('nilai_debit');
        $kredit6300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6300')->sum('nilai_kredit');
         // 6300
        // 6310
        $asetlancar6310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6310')->get();
        $debit6310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6310')->sum('nilai_debit');
        $kredit6310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6310')->sum('nilai_kredit');
         // 6310
        // 6320
        $asetlancar6320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6320')->get();
        $debit6320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6320')->sum('nilai_debit');
        $kredit6320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6320')->sum('nilai_kredit');
         // 6320
        // 6330
        $asetlancar6330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6330')->get();
        $debit6330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6330')->sum('nilai_debit');
        $kredit6330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6330')->sum('nilai_kredit');
         // 6330
        // 6340
        $asetlancar6340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6340')->get();
        $debit6340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6340')->sum('nilai_debit');
        $kredit6340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6340')->sum('nilai_kredit');
         // 6340
        // 6350
        $asetlancar6350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6350')->get();
        $debit6350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6350')->sum('nilai_debit');
        $kredit6350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6350')->sum('nilai_kredit');
         // 6350
        // 6360
        $asetlancar6360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6360')->get();
        $debit6360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6360')->sum('nilai_debit');
        $kredit6360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6360')->sum('nilai_kredit');
         // 6360
        // 6370
        $asetlancar6370=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6370')->get();
        $debit6370=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6370')->sum('nilai_debit');
        $kredit6370=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6370')->sum('nilai_kredit');
         // 6370
        // 6380
        $asetlancar6380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6380')->get();
        $debit6380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6380')->sum('nilai_debit');
        $kredit6380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6380')->sum('nilai_kredit');
         // 6380
        // 6390
        $asetlancar6390=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6390')->get();
        $debit6390=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6390')->sum('nilai_debit');
        $kredit6390=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6390')->sum('nilai_kredit');
         // 6390
        // 6400
        $asetlancar6400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6400')->get();
        $debit6400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6400')->sum('nilai_debit');
        $kredit6400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6400')->sum('nilai_kredit');
         // 6400
        // 6410
        $asetlancar6410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6410')->get();
        $debit6410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6410')->sum('nilai_debit');
        $kredit6410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6410')->sum('nilai_kredit');
         // 6410
        // 6420
        $asetlancar6420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6420')->get();
        $debit6420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6420')->sum('nilai_debit');
        $kredit6420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6420')->sum('nilai_kredit');
         // 6420
        // 6430
        $asetlancar6430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6430')->get();
        $debit6430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6430')->sum('nilai_debit');
        $kredit6430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6430')->sum('nilai_kredit');
         // 6430
        // 6440
        $asetlancar6440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6440')->get();
        $debit6440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6440')->sum('nilai_debit');
        $kredit6440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6440')->sum('nilai_kredit');
         // 6440
        // 6450
        $asetlancar6450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6450')->get();
        $debit6450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6450')->sum('nilai_debit');
        $kredit6450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6450')->sum('nilai_kredit');
         // 6450
        // 6460
        $asetlancar6460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6460')->get();
        $debit6460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6460')->sum('nilai_debit');
        $kredit6460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6460')->sum('nilai_kredit');
         // 6460
        // 6470
        $asetlancar6470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6470')->get();
        $debit6470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6470')->sum('nilai_debit');
        $kredit6470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6470')->sum('nilai_kredit');
         // 6470
        // 6480
        $asetlancar6480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6480')->get();
        $debit6480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6480')->sum('nilai_debit');
        $kredit6480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6480')->sum('nilai_kredit');
         // 6480
        // 6490
        $asetlancar6490=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6490')->get();
        $debit6490=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6490')->sum('nilai_debit');
        $kredit6490=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6490')->sum('nilai_kredit');
         // 6490
        // 6500
        $asetlancar6500=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6500')->get();
        $debit6500=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6500')->sum('nilai_debit');
        $kredit6500=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6500')->sum('nilai_kredit');
         // 6500
        // 6510
        $asetlancar6510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6510')->get();
        $debit6510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6510')->sum('nilai_debit');
        $kredit6510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6510')->sum('nilai_kredit');
         // 6510
        // 6520
        $asetlancar6520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6520')->get();
        $debit6520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6520')->sum('nilai_debit');
        $kredit6520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6520')->sum('nilai_kredit');
         // 6520
        // 6530
        $asetlancar6530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6530')->get();
        $debit6530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6530')->sum('nilai_debit');
        $kredit6530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6530')->sum('nilai_kredit');
         // 6530
        // 6540
        $asetlancar6540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6540')->get();
        $debit6540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6540')->sum('nilai_debit');
        $kredit6540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6540')->sum('nilai_kredit');
         // 6540
        // 6600
        $asetlancar6600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6600')->get();
        $debit6600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6600')->sum('nilai_debit');
        $kredit6600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6600')->sum('nilai_kredit');
         // 6600
        // 7100
        $asetlancar7100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7100')->get();
        $debit7100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','7100')->sum('nilai_debit');
        $kredit7100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','7100')->sum('nilai_kredit');
         // 7100
        // 7110
        $asetlancar7110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7110')->get();
        $debit7110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','7110')->sum('nilai_debit');
        $kredit7110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','7110')->sum('nilai_kredit');
         // 7110
        // 8100
        $asetlancar8100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8100')->get();
        $debit8100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8100')->sum('nilai_debit');
        $kredit8100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8100')->sum('nilai_kredit');
         // 8100
        // 8110
        $asetlancar8110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8110')->get();
        $debit8110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8110')->sum('nilai_debit');
        $kredit8110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8110')->sum('nilai_kredit');
         // 8110
        // 8120
        $asetlancar8120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8120')->get();
        $debit8120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8120')->sum('nilai_debit');
        $kredit8120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8120')->sum('nilai_kredit');
         // 8120

        $totalpenjualan=LatihanKeuangan::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalharpok=LatihanKeuangan::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalbiayaoperasional=LatihanKeuangan::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $jumlahpendapatanlain=LatihanKeuangan::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahbebanlain=LatihanKeuangan::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        
        $labakotor = $totalpenjualan-$totalharpok;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','>','4100')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','>','4100')->sum('nilai_kredit');
        $totalkomersial = $ikhtisarlabarugi+$totaldebit-$totalkredit;
        return view('laporan.latihanlaporankeuanganlabarugifiskal',compact(
            'totaldebit','totalkredit','totalkomersial',
            'totalpenjualan','totalharpok','totalbiayaoperasional','jumlahpendapatanlain',
            'jumlahbebanlain','labakotor','labaoperasional','totalpendapatandanbebanlain',
            'ikhtisarlabarugi',
            'asetlancar4100','debit4100','kredit4100',
            'asetlancar4101','debit4101','kredit4101',
            'asetlancar4102','debit4102','kredit4102',
            'asetlancar4103','debit4103','kredit4103',
            'asetlancar4104','debit4104','kredit4104',
            'asetlancar4200','debit4200','kredit4200',
            'asetlancar4201','debit4201','kredit4201',
            'asetlancar4202','debit4202','kredit4202',
            'asetlancar4203','debit4203','kredit4203',
            'asetlancar4300','debit4300','kredit4300',
            'asetlancar4310','debit4310','kredit4310',
            'asetlancar4320','debit4320','kredit4320',
            'asetlancar4330','debit4330','kredit4330',
            'asetlancar4340','debit4340','kredit4340',
            'asetlancar4350','debit4350','kredit4350',
            'asetlancar4105','debit4105','kredit4105',
            'asetlancar5100','debit5100','kredit5100',
            'asetlancar5110','debit5110','kredit5110',
            'asetlancar5120','debit5120','kredit5120',
            'asetlancar5200','debit5200','kredit5200',
            'asetlancar5210','debit5210','kredit5210',
            'asetlancar5211','debit5211','kredit5211',
            'asetlancar5212','debit5212','kredit5212',
            'asetlancar5213','debit5213','kredit5213',
            'asetlancar5250','debit5250','kredit5250',
            'asetlancar5260','debit5260','kredit5260',
            'asetlancar5300','debit5300','kredit5300',
            'asetlancar5400','debit5400','kredit5400',
            'asetlancar5410','debit5410','kredit5410',
            'asetlancar5420','debit5420','kredit5420',
            'asetlancar5430','debit5430','kredit5430',
            'asetlancar5440','debit5440','kredit5440',
            'asetlancar5450','debit5450','kredit5450',
            'asetlancar5460','debit5460','kredit5460',
            'asetlancar5470','debit5470','kredit5470',
            'asetlancar5480','debit5480','kredit5480',
            'asetlancar5600','debit5600','kredit5600',
            'asetlancar6100','debit6100','kredit6100',
            'asetlancar6110','debit6110','kredit6110',
            'asetlancar6120','debit6120','kredit6120',
            'asetlancar6130','debit6130','kredit6130',
            'asetlancar6140','debit6140','kredit6140',
            'asetlancar6150','debit6150','kredit6150',
            'asetlancar6160','debit6160','kredit6160',
            'asetlancar6170','debit6170','kredit6170',
            'asetlancar6180','debit6180','kredit6180',
            'asetlancar6190','debit6190','kredit6190',
            'asetlancar6200','debit6200','kredit6200',
            'asetlancar6210','debit6210','kredit6210',
            'asetlancar6220','debit6220','kredit6220',
            'asetlancar6230','debit6230','kredit6230',
            'asetlancar6240','debit6240','kredit6240',
            'asetlancar6250','debit6250','kredit6250',
            'asetlancar6260','debit6260','kredit6260',
            'asetlancar6270','debit6270','kredit6270',
            'asetlancar6280','debit6280','kredit6280',
            'asetlancar6290','debit6290','kredit6290',
            'asetlancar6300','debit6300','kredit6300',
            'asetlancar6310','debit6310','kredit6310',
            'asetlancar6320','debit6320','kredit6320',
            'asetlancar6330','debit6330','kredit6330',
            'asetlancar6340','debit6340','kredit6340',
            'asetlancar6350','debit6350','kredit6350',
            'asetlancar6360','debit6360','kredit6360',
            'asetlancar6370','debit6370','kredit6370',
            'asetlancar6380','debit6380','kredit6380',
            'asetlancar6390','debit6390','kredit6390',
            'asetlancar6400','debit6400','kredit6400',
            'asetlancar6410','debit6410','kredit6410',
            'asetlancar6420','debit6420','kredit6420',
            'asetlancar6430','debit6430','kredit6430',
            'asetlancar6440','debit6440','kredit6440',
            'asetlancar6450','debit6450','kredit6450',
            'asetlancar6460','debit6460','kredit6460',
            'asetlancar6470','debit6470','kredit6470',
            'asetlancar6480','debit6480','kredit6480',
            'asetlancar6490','debit6490','kredit6490',
            'asetlancar6500','debit6500','kredit6500',
            'asetlancar6510','debit6510','kredit6510',
            'asetlancar6520','debit6520','kredit6520',
            'asetlancar6530','debit6530','kredit6530',
            'asetlancar6540','debit6540','kredit6540',
            'asetlancar6600','debit6600','kredit6600',
            'asetlancar7100','debit7100','kredit7100',
            'asetlancar7110','debit7110','kredit7110',
            'asetlancar8100','debit8100','kredit8100',
            'asetlancar8110','debit8110','kredit8110',
            'asetlancar8120','debit8120','kredit8120',
        ));
    }
    public function latihankeuangankomersil(Request $request){
        $asetlancar=LatihanKeuangan::where('attribute3','KAS DAN SETARA KAS')->whereNot('saldo',0)->get();
        $piutang=LatihanKeuangan::where('attribute3','PIUTANG USAHA PIHAK KETIGA')->whereNot('saldo',0)->get();
        $pajakaktiva=LatihanKeuangan::where('attribute3','AKTIVA LANCAR LAINNYA')->whereNot('saldo',0)->get();
        $persediaan=LatihanKeuangan::where('attribute3','PERSEDIAAN')->whereNot('saldo',0)->get();
        $pengeluarandibayar=LatihanKeuangan::where('attribute3','BEBAN DIBAYAR DI MUKA')->whereNot('saldo',0)->get();
        $asettetap=LatihanKeuangan::where('attribute3','AKTIVA TETAP LAINNYA')->whereNot('saldo',0)->get();
        $penyusutan=LatihanKeuangan::where('attribute3','AKUMULASI PENYUSUTAN')->whereNot('saldo',0)->get();
        $liabilitaslancar=LatihanKeuangan::where('attribute3','HUTANG USAHA PIHAK KETIGA')->whereNot('saldo',0)->get();
        $pengeluarandibayar=LatihanKeuangan::where('attribute3','UANG MUKA PELANGGAN')->whereNot('saldo',0)->get();
        $pajak=LatihanKeuangan::where('attribute3','HUTANG PAJAK')->whereNot('saldo',0)->get();
        $liabilitisjangkapanjang=LatihanKeuangan::where('attribute3','HUTANG BANK JANGKA PANJANG')->whereNot('saldo',0)->get();
        $modalpemilik=LatihanKeuangan::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->get();
        
        $totalaktivalancar=LatihanKeuangan::where('no_akun','<','1510')->sum('saldo');
        $nilaiaktivatetap=LatihanKeuangan::where('attribute3','AKTIVA TETAP LAINNYA')->sum('saldo');
        $nilaipenyusutan=LatihanKeuangan::where('attribute3','AKUMULASI PENYUSUTAN')->sum('saldo');
        $totalliabilitislancar=LatihanKeuangan::where('no_akun','>','2100')->where('no_akun','<','2710')->sum('saldo');
        $totalliabilitisjangkapanjang=LatihanKeuangan::where('attribute3','HUTANG BANK JANGKA PANJANG')->sum('saldo');
        $totalmodal=LatihanKeuangan::where('no_akun','>','3000')->where('no_akun','<','3400')->sum('saldo');
        // dd($modalpemilik);
        $totalaktivatetap=$nilaiaktivatetap+$nilaipenyusutan;
        $totalaktiva=$totalaktivatetap+$totalaktivalancar;
        $totalliabilitasmodal=$totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        // dd($penyusutan);
        return view('laporan.latihankeuangankomersil',compact('totalliabilitasmodal','pajakaktiva','totalmodal','modalpemilik','liabilitisjangkapanjang','totalliabilitisjangkapanjang','totalliabilitislancar','pajak','pengeluarandibayar','liabilitaslancar','totalaktiva','totalaktivatetap','nilaipenyusutan','penyusutan','nilaiaktivatetap','asettetap','totalaktivalancar','pengeluarandibayar','persediaan','pajak','asetlancar','piutang'));
    }
    public function latihankeuanganlabarugikomersil(Request $request){
        $pendapatan=LatihanKeuangan::where('attribute3','PENJUALAN BERSIH')->whereNot('saldo',0)->get();
        $hargapokokpenjualan=LatihanKeuangan::where('attribute3','HARGA POKOK PENJUALAN')->whereNot('saldo',0)->get();
        $pengeluaranoperasional=LatihanKeuangan::where('no_akun','>','5600')->where('no_akun','<','7100')->whereNot('saldo',0)->get();
        $pendapatanlain=LatihanKeuangan::where('attribute3','PENDAPATAN LAIN-LAIN')->whereNot('saldo',0)->get();
        $pengeluaranlain=LatihanKeuangan::where('no_akun','>','7110')->where('no_akun','<','8130')->whereNot('saldo',0)->get();
        
        $totalpenjualan=LatihanKeuangan::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalharpok=LatihanKeuangan::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalbiayaoperasional=LatihanKeuangan::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $jumlahpendapatanlain=LatihanKeuangan::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahbebanlain=LatihanKeuangan::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        // dd($totalbiayaoperasional);
        $labakotor = $totalpenjualan-$totalharpok;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        return view('laporan.latihankeuanganlabarugikomersil',compact(
            'pendapatan','hargapokokpenjualan','pengeluaranoperasional','pendapatanlain',
            'pengeluaranlain','totalpenjualan','totalharpok','totalbiayaoperasional',
            'jumlahpendapatanlain','jumlahbebanlain','labakotor','labaoperasional',
            'totalpendapatandanbebanlain','ikhtisarlabarugi'
        ));
    }
    public function listSpt1111(Request $request){
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $sptppn = SptPpn::get();
        }else{
            $sptppn = SptPpn::where('attribute_1',$id)->get();
        }
        $data_arr = array();
        foreach ($sptppn as $record) {
            $data_arr[] = array(
                "id" => $record->formulir_id,
                "nama" =>$record->nama_ptkp_1111,
                "alamat" =>$record->alamat_1111,
                "notelpon" =>$record->no_telp_1111,
                "klu" =>$record->no_klu_1111,
                "npwp" =>$record->no_npwp_1111,
                "start" => Carbon::parse($record->start_masa_1111)->format('d-M-Y'),
                "end" => Carbon::parse($record->end_masa_1111)->format('d-M-Y'),
                "created_by" => $record->users->name,
                "created_at" => $record->created_at->format('d-M-Y'),
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listPphfinal(Request $request){
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $pphfinal = Pphfinal::whereNotNull('transaksi')->get();
        }else{
            $pphfinal = Pphfinal::whereNotNull('transaksi')->where('attribute1',$id)->get();
        }
        $data_arr = array();
        foreach ($pphfinal as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "transaksi" => $record->transaksi,
                "kop" =>$record->kode_objek_pajak,
                "bruto" =>number_format($record->bruto),
                "tarif" =>number_format($record->tarif),
                "potongan_pph" =>number_format($record->potongan_pph),
                "created_at" => $record->created_at->format('d-M-Y'),
                "status" =>$record->attribute3,
                "created_by" => $record->users->name,
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function listPphtidakfinal(Request $request){
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $pphfinal = PphTidakFinal::get();
        }else{
            $pphfinal = PphTidakFinal::where('attribute1',$id)->get();
        }
        $data_arr = array();
        foreach ($pphfinal as $record) {
            $data_arr[] = array(
                "id" => $record->id,
                "transaksi" => $record->trx,
                "kop" =>$record->kode_objek_pajak,
                "bruto" =>number_format($record->bruto),
                "tarif" =>number_format($record->tarif),
                "pengenaan_pajak" =>number_format($record->dasar_pengenaan_pajak),
                "potongan_pph" =>number_format($record->potongan_pph),
                "created_at" => $record->created_at->format('d-M-Y'),
                "created_by" => $record->users->name,
                "status" =>$record->attribute3,
            );
        }
        // dd($data_arr);
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
    public function formulirAB(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$request->formulir_id)->get()->first();

        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.formulirAB',compact('spt'));
    }
    public function formulirA1(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLinea1::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLinea1::where('formulir_id',$request->formulir_id)->get();
        
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.formulirA1',compact('spt','sptline'))->with('no',1);
    }
    public function formulirA2(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLinea2::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLinea2::where('formulir_id',$request->formulir_id)->get();
        
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.formulirA2',compact('spt','sptline'))->with('no',1);
    }
    public function formulirB1(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLineb1::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLineb1::where('formulir_id',$request->formulir_id)->get();
        
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.formulirB1',compact('spt','sptline'))->with('no',1);
    }
    public function formulirB2(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLineb2::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLineb2::where('formulir_id',$request->formulir_id)->get();
        
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.formulirB2',compact('spt','sptline'))->with('no',1);
    }
    public function formulirB3(Request $request){
        // dd($request);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLineb3::where('formulir_id',$request->formulir_id)->get();
        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$request->formulir_id)->get()->first();
            $sptline=SptPpnLineb3::where('formulir_id',$request->formulir_id)->get();
        
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.formulirB3',compact('spt','sptline'))->with('no',1);
    }
    public function latihanakun_kredit(Request $request){
        $debet = $request->input('akundebet'); 
        // dd($debet);
        $data=LatihanKeuangan::whereNot('no_akun',$debet)->whereNot('saldo',0)->get();
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
    public function latihannama_kreditpertama(Request $request){
        $debet = $request->input('akundebet'); 
        // dd($debet);
        $data=LatihanKeuangan::whereNot('no_akun',$debet)->whereNot('saldo',0)->orderBy('id','DESC')->get();
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
    public function latihannama_debit(Request $request){
        $debet = $request->input('akundebet'); 
        // dd($debet);
        $data=LatihanKeuangan::where('no_akun',$debet)->distinct()->get();
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
    public function latihannama_kredit(Request $request){
        $kredit = preg_replace('/[^0-9]/','',$request->input('akunkredit')); 

        // $kredit = $request->input('akunkredit'); 
        // dd($tanggungans);
        $data=LatihanKeuangan::where('no_akun',$kredit)->distinct()->get();
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
}
