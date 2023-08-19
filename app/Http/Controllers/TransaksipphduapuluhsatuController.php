<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPphDuapuluhSatu;
use Illuminate\Support\Facades\Auth;

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
        return view('transaksiduapuluhsatu.create');
        
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
            TransaksiPphDuapuluhSatu::updateOrCreate([
                'status_npwp'=>$request->npwp,
                'nama_wajib_pajak'=>$request->input_wajib_pajak,
                'no_npwp'=>$request->no_npwp,
                'status_pernikahan'=>$request->status_pernikahan,
                'tanggungan'=>$request->tanggungan,
                'masa_penghasilan'=>$request->masa_penghasilan,
                // 'tunjangan_pajak'=>$request->contact_person,
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
                // 'total_pengurangan'=>$request->contact_person,
                // 'penghasilan_netto'=>$request->contact_person,
                // 'netto_massa'=>$request->contact_person,
                // 'netto_setahun'=>$request->contact_person,
                // 'ptkp'=>$request->contact_person,
                // 'pkp'=>$request->contact_person,
                'tarif1'=>$request->totaltarif1,
                'tarif2'=>$request->totaltarif2,
                'tarif3'=>$request->totaltarif3,
                'tarif4'=>$request->totaltarif4,
                // 'pph21ataspkp'=>$request->contact_person,
                // 'pph21_dipotong_sebelumnya'=>$request->contact_person,
                // 'pph21_terutang'=>$request->contact_person,
                'attribute1'=>Auth::user()->name,
                'attribute2'=>'NULL',
                'attribute3'=>'NULL',
                'created_at'=>date('Y-m-d'),
            ]);
            $a= \DB::commit();
        }
        TransaksiPphDuapuluhSatu::updateOrCreate([
            'status_npwp'=>$request->npwp,
            'nama_wajib_pajak'=>$request->input_wajib_pajak,
            'no_npwp'=>$request->no_npwp,
            'status_pernikahan'=>$request->status_pernikahan,
            'tanggungan'=>$request->tanggungan,
            'masa_penghasilan'=>$request->masa_penghasilan,
            // 'tunjangan_pajak'=>$request->contact_person,
            'ketentuan_ptkp'=>$request->ketentuan_ptkp,
            'ketentuan_tarif'=>$request->ketentuan_tarif,
            'gaji_pensiun'=>$request->gajidanpensiun,
            'tunjangan_lain'=>$request->tunjanganlain,
            'honorarium'=>$request->honorarium,
            'premi_asuransi'=>$request->premi_asuransi,
            'natura'=>$request->natura,
            'tantiem'=>$request->tantiem,
            'penghasilan_bruto'=>$request->penghasilan_bruto,
            'biaya_jabatan'=>$request->biaya_jabatan,
            'tht_jht'=>$request->iuran_pensiun,
            // 'total_pengurangan'=>$request->contact_person,
            // 'penghasilan_netto'=>$request->contact_person,
            // 'netto_massa'=>$request->contact_person,
            // 'netto_setahun'=>$request->contact_person,
            // 'ptkp'=>$request->contact_person,
            // 'pkp'=>$request->contact_person,
            'tarif1'=>$request->totaltarif1,
            'tarif2'=>$request->totaltarif2,
            'tarif3'=>$request->totaltarif3,
            'tarif4'=>$request->totaltarif4,
            // 'pph21ataspkp'=>$request->contact_person,
            // 'pph21_dipotong_sebelumnya'=>$request->contact_person,
            // 'pph21_terutang'=>$request->contact_person,
            'attribute1'=>Auth::user()->name,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d'),
        ]);
        $a= \DB::commit();
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
        dd('tes');
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
        dd($pph21);
        return view('transaksiduapuluhsatu.edit',compact('pph21'));
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
        dd('tes');
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
