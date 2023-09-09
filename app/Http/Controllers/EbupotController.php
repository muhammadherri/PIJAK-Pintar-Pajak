<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebupot;
use App\Models\Ebupotlines;
use App\Models\Fasilitas;
use App\Models\Kodepajak;
use App\Models\DokumenReferensi;
use App\Models\Penandatanganan;
use Illuminate\Support\Facades\Auth;

class EbupotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebupot=Ebupot::all();
        return view('ebupot.index',compact('ebupot'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas=Fasilitas::all();
        $kodepajak=Kodepajak::all();
        $dokref=DokumenReferensi::all();
        $penandatanganan=Penandatanganan::all();
        // dd($fasilitas);
        return view('ebupot.create',compact('fasilitas','kodepajak','dokref','penandatanganan'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =Ebupot::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;

        $dok_ref = $request->input('column1');
        $no_dok = $request->input('column2');
        $tgl_doc = $request->input('column3');

        $data = array(
            'ebupot_id'=>$header_id,
            'jenis_pph'=>$request->jenis_pph,
            'pilih_transaksi'=>$request->transaksi_npwp,
            'no_tlp'=>$request->no_telp,
            'attribute1'=>Auth::user()->name,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'fasilitas'=>$request->fasilitas,
            'tanggal_bukti_potong'=>$request->tgl_bukti_potong,
            'periode_pajak'=>$request->periode_pajak,
            'kode_objek_pajak'=>$request->kode_objek_pajak,
            'jumlah_bruto'=>$request->jumlah_bruto,
            'tarif'=>$request->tarif,
            'potongan_pph'=>$request->potongan_pph,
            'penandatanganan'=>$request->penandatanganan,
            'created_at'=>date('Y-m-d'),
        );
        Ebupot::create($data);
        $a= \DB::commit();
        foreach ($dok_ref as $key => $ebupot_id) {
            $data = array(
                'ebupot_id' => $header_id,
                'dok_ref' => $dok_ref[$key],
                'no_dok' => $no_dok[$key],
                'tgl_doc' => $tgl_doc[$key],
                'created_at'=>date('Y-m-d'),
            );
            Ebupotlines::create($data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
