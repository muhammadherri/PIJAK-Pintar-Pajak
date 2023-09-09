<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\Ptkp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksipphduapuluhsatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pph21 = TransaksiPphDuapuluhSatu::all();
        return view('transaksiduapuluhsatu.index',compact('pph21'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptkp=Ptkp::all();
        $status_pernikahan=Ptkp::select('status_pernikahan','kode_ptkp')->groupBy('status_pernikahan','kode_ptkp')->get();
        $tanggungan=Ptkp::select('tanggungan')->groupBy('tanggungan')->get();
        return view('transaksiduapuluhsatu.create',compact('ptkp','status_pernikahan','tanggungan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if($request->gross==0){
            $data = array(
                'status_npwp'=>$request->npwp,
                'nama_wajib_pajak'=>$request->input_wajib_pajak,
                'no_npwp'=>$request->no_npwp,
                'status_pernikahan'=>$request->status_pernikahan,
                'tanggungan'=>$request->tanggungan,
                'masa_penghasilan_start'=>$request->masa_penghasilan,
                'masa_penghasilan_end'=>$request->masa_penghasilan_end,
                'tunjangan_pajak'=>$request->gross,
                'ketentuan_ptkp'=>$request->ketentuan_ptkp,
                'ketentuan_tarif'=>$request->ketentuan_tarif,
                'gaji_pensiun'=>$request->gajidanpensiun,
                'tunjangan_pph'=>$request->tunjangan_pph,
                'tunjangan_lain'=>$request->tunjanganlain,
                'honorarium'=>$request->honorarium,
                'premi_asuransi'=>$request->premi_asuransi,
                'natura'=>$request->natura,
                'tantiem'=>$request->tantiem,
                'penghasilan_bruto'=>$request->penghasilan_bruto,
                'biaya_jabatan'=>$request->biaya_jabatan,
                'tht_jht'=>$request->iuran_pensiun,
                'total_pengurangan'=>$request->total_pengurang,
                'penghasilan_netto'=>$request->penghasilan_netto,
                'netto_massa'=>$request->penghasilan_netto_ms,
                'netto_setahun'=>$request->netto_pertahun,
                'ptkp'=>$request->pilih_ptkp,
                'pkp'=>$request->input_pkp,
                'tarif1'=>$request->totaltarif1,
                'tarif2'=>$request->totaltarif2,
                'tarif3'=>$request->totaltarif3,
                'tarif4'=>$request->totaltarif4,
                'pph21ataspkp'=>$request->jumlahtotal,
                'pph21_dipotong_sebelumnya'=>$request->pph21potongan,
                'pph21_terutang'=>$request->pph21terutang,
                'attribute1'=>Auth::user()->name,
                'attribute2'=>'NULL',
                'attribute3'=>'NULL',
                'created_at'=>date('Y-m-d'),
            );
            TransaksiPphDuapuluhSatu::create($data);
            $a= \DB::commit();
        }else{
            $data = array(
                'status_npwp'=>$request->npwp,
                'nama_wajib_pajak'=>$request->input_wajib_pajak,
                'no_npwp'=>$request->no_npwp,
                'status_pernikahan'=>$request->status_pernikahan,
                'tanggungan'=>$request->tanggungan,
                'masa_penghasilan_start'=>$request->masa_penghasilan,
                'masa_penghasilan_end'=>$request->masa_penghasilan_end,
                'tunjangan_pajak'=>$request->gross,
                'ketentuan_ptkp'=>$request->ketentuan_ptkp,
                'ketentuan_tarif'=>$request->ketentuan_tarif,
                'gaji_pensiun'=>$request->gajidanpensiun,
                // 'tunjangan_pph'=>$request->tunjangan_pph,
                'tunjangan_lain'=>$request->tunjanganlain,
                'honorarium'=>$request->honorarium,
                'premi_asuransi'=>$request->premi_asuransi,
                'natura'=>$request->natura,
                'tantiem'=>$request->tantiem,
                'penghasilan_bruto'=>$request->penghasilan_bruto,
                'biaya_jabatan'=>$request->biaya_jabatan,
                'tht_jht'=>$request->iuran_pensiun,
                'total_pengurangan'=>$request->total_pengurang,
                'penghasilan_netto'=>$request->penghasilan_netto,
                'netto_massa'=>$request->penghasilan_netto_ms,
                'netto_setahun'=>$request->netto_pertahun,
                'ptkp'=>$request->pilih_ptkp,
                'pkp'=>$request->input_pkp,
                'tarif1'=>$request->totaltarif1,
                'tarif2'=>$request->totaltarif2,
                'tarif3'=>$request->totaltarif3,
                'tarif4'=>$request->totaltarif4,
                'pph21ataspkp'=>$request->jumlahtotal,
                'pph21_dipotong_sebelumnya'=>$request->pph21potongan,
                'pph21_terutang'=>$request->pph21terutang,
                'attribute1'=>Auth::user()->name,
                'attribute2'=>'NULL',
                'attribute3'=>'NULL',
                'created_at'=>date('Y-m-d'),
            );
            TransaksiPphDuapuluhSatu::create($data);
            $a= \DB::commit();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pph21 = TransaksiPphDuapuluhSatu::where('id',$id)->get()->first();
        $ptkp=Ptkp::all();
        $status_pernikahan=Ptkp::select('status_pernikahan','kode_ptkp')->groupBy('status_pernikahan','kode_ptkp')->get();
        $tanggungan=Ptkp::select('tanggungan')->groupBy('tanggungan')->get();

        return view('transaksiduapuluhsatu.show',compact('pph21','ptkp','status_pernikahan','tanggungan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pph21 = TransaksiPphDuapuluhSatu::where('id',$id)->get()->first();
        $ptkp=Ptkp::all();
        $status_pernikahan=Ptkp::select('status_pernikahan','kode_ptkp')->groupBy('status_pernikahan','kode_ptkp')->get();
        $tanggungan=Ptkp::select('tanggungan')->groupBy('tanggungan')->get();

        return view('transaksiduapuluhsatu.edit',compact('pph21','ptkp','status_pernikahan','tanggungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->gross==0){
            TransaksiPphDuapuluhSatu::where('id',$id)->update([
                'status_npwp'=>$request->npwp,
                'nama_wajib_pajak'=>$request->input_wajib_pajak,
                'no_npwp'=>$request->no_npwp,
                'status_pernikahan'=>$request->status_pernikahan,
                'tanggungan'=>$request->tanggungan,
                'masa_penghasilan_start'=>$request->masa_penghasilan,
                'masa_penghasilan_end'=>$request->masa_penghasilan_end,
                'tunjangan_pajak'=>$request->gross,
                'ketentuan_ptkp'=>$request->ketentuan_ptkp,
                'ketentuan_tarif'=>$request->ketentuan_tarif,
                'gaji_pensiun'=>$request->gajidanpensiun,
                'tunjangan_pph'=>$request->tunjangan_pph,
                'tunjangan_lain'=>$request->tunjanganlain,
                'honorarium'=>$request->honorarium,
                'premi_asuransi'=>$request->premi_asuransi,
                'natura'=>$request->natura,
                'tantiem'=>$request->tantiem,
                'penghasilan_bruto'=>$request->penghasilan_bruto,
                'biaya_jabatan'=>$request->biaya_jabatan,
                'tht_jht'=>$request->iuran_pensiun,
                'total_pengurangan'=>$request->total_pengurang,
                'penghasilan_netto'=>$request->penghasilan_netto,
                'netto_massa'=>$request->penghasilan_netto_ms,
                'netto_setahun'=>$request->netto_pertahun,
                'ptkp'=>$request->pilih_ptkp,
                'pkp'=>$request->input_pkp,
                'tarif1'=>$request->totaltarif1,
                'tarif2'=>$request->totaltarif2,
                'tarif3'=>$request->totaltarif3,
                'tarif4'=>$request->totaltarif4,
                'pph21ataspkp'=>$request->jumlahtotal,
                'pph21_dipotong_sebelumnya'=>$request->pph21potongan,
                'pph21_terutang'=>$request->pph21terutang,
                'attribute2'=>Auth::user()->name,
                'updated_at'=>date('Y-m-d'),
            ]);
            $a= \DB::commit();    
        }else{
            TransaksiPphDuapuluhSatu::where('id',$id)->update([
                'status_npwp'=>$request->npwp,
                'nama_wajib_pajak'=>$request->input_wajib_pajak,
                'no_npwp'=>$request->no_npwp,
                'status_pernikahan'=>$request->status_pernikahan,
                'tanggungan'=>$request->tanggungan,
                'masa_penghasilan_start'=>$request->masa_penghasilan,
                'masa_penghasilan_end'=>$request->masa_penghasilan_end,
                'tunjangan_pajak'=>$request->gross,
                'ketentuan_ptkp'=>$request->ketentuan_ptkp,
                'ketentuan_tarif'=>$request->ketentuan_tarif,
                'gaji_pensiun'=>$request->gajidanpensiun,
                // 'tunjangan_pph'=>$request->tunjangan_pph,
                'tunjangan_lain'=>$request->tunjanganlain,
                'honorarium'=>$request->honorarium,
                'premi_asuransi'=>$request->premi_asuransi,
                'natura'=>$request->natura,
                'tantiem'=>$request->tantiem,
                'penghasilan_bruto'=>$request->penghasilan_bruto,
                'biaya_jabatan'=>$request->biaya_jabatan,
                'tht_jht'=>$request->iuran_pensiun,
                'total_pengurangan'=>$request->total_pengurang,
                'penghasilan_netto'=>$request->penghasilan_netto,
                'netto_massa'=>$request->penghasilan_netto_ms,
                'netto_setahun'=>$request->netto_pertahun,
                'ptkp'=>$request->pilih_ptkp,
                'pkp'=>$request->input_pkp,
                'tarif1'=>$request->totaltarif1,
                'tarif2'=>$request->totaltarif2,
                'tarif3'=>$request->totaltarif3,
                'tarif4'=>$request->totaltarif4,
                'pph21ataspkp'=>$request->jumlahtotal,
                'pph21_dipotong_sebelumnya'=>$request->pph21potongan,
                'pph21_terutang'=>$request->pph21terutang,
                'attribute2'=>Auth::user()->name,
                'updated_at'=>date('Y-m-d'),
            ]);
            $a= \DB::commit();    
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=TransaksiPphDuapuluhSatu::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}