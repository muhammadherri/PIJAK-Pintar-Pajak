<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PphTidakFinal;
use App\Models\KodeObjekPPhTidakFinal;
use Illuminate\Support\Facades\Auth;

class PphTidakFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pphtidakfinal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $koptidakfinal = KodeObjekPPhTidakFinal::get();
        return view('pphtidakfinal.create',compact('koptidakfinal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =PphTidakFinal::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRX'.'0'.$header_id.$date.'TF';

        $data = array(
            'trx'=>$trx,
            'kode_objek_pajak'=>$request->kop,
            'bruto'=>preg_replace('/[^0-9]/','',$request->bruto),
            'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->pengenaan_pajak),
            'tarif_lebih_tinggi'=>1,
            'tarif1'=>preg_replace('/[^0-9]/','',$request->tarif1),
            'tarif2'=>preg_replace('/[^0-9]/','',$request->tarif2),
            'tarif3'=>preg_replace('/[^0-9]/','',$request->tarif3),
            'tarif4'=>preg_replace('/[^0-9]/','',$request->tarif4),
            'persen1'=>preg_replace('/[^0-9]/','',$request->persen1),
            'persen2'=>preg_replace('/[^0-9]/','',$request->persen2),
            'persen3'=>preg_replace('/[^0-9]/','',$request->persen3),
            'persen4'=>preg_replace('/[^0-9]/','',$request->persen4),
            'hasil1'=>preg_replace('/[^0-9]/','',$request->hasil1),
            'hasil2'=>preg_replace('/[^0-9]/','',$request->hasil2),
            'hasil3'=>preg_replace('/[^0-9]/','',$request->hasil3),
            'hasil4'=>preg_replace('/[^0-9]/','',$request->hasil4),
            'potongan_pph'=>preg_replace('/[^0-9]/','',$request->potongan_pph),
            'attribute1'=>Auth::user()->id
        );
        // dd($data);
        PphTidakFinal::create($data);
        $a= \DB::commit();
        return redirect()->route('pphtidakfinal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $koptidakfinal = KodeObjekPPhTidakFinal::get();
        $pphtidakfinal=PphTidakFinal::where('id',$id)->get()->first();
        return view('pphtidakfinal.show',compact('pphtidakfinal','koptidakfinal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser=Auth::user()->id;
        // if(Auth::user()->status==1){
        //     $pphtidakfinal=PphTidakFinal::where('id',$id)->get()->first();
        // }else{
            $koptidakfinal = KodeObjekPPhTidakFinal::get();
            $pphtidakfinal=PphTidakFinal::where('attribute1',$iduser)->where('id',$id)->get()->first();
        // }

        if($pphtidakfinal==null){
            return back();
        }else{
            return view('pphtidakfinal.edit',compact('pphtidakfinal','koptidakfinal'));
        }
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
        PphTidakFinal::where('id',$id)->update([
            'kode_objek_pajak'=>$request->kop,
            'bruto'=>preg_replace('/[^0-9]/','',$request->bruto),
            'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->pengenaan_pajak),
            'tarif_lebih_tinggi'=>1,
            'tarif1'=>preg_replace('/[^0-9]/','',$request->tarif1),
            'tarif2'=>preg_replace('/[^0-9]/','',$request->tarif2),
            'tarif3'=>preg_replace('/[^0-9]/','',$request->tarif3),
            'tarif4'=>preg_replace('/[^0-9]/','',$request->tarif4),
            'persen1'=>preg_replace('/[^0-9]/','',$request->persen1),
            'persen2'=>preg_replace('/[^0-9]/','',$request->persen2),
            'persen3'=>preg_replace('/[^0-9]/','',$request->persen3),
            'persen4'=>preg_replace('/[^0-9]/','',$request->persen4),
            'hasil1'=>preg_replace('/[^0-9]/','',$request->hasil1),
            'hasil2'=>preg_replace('/[^0-9]/','',$request->hasil2),
            'hasil3'=>preg_replace('/[^0-9]/','',$request->hasil3),
            'hasil4'=>preg_replace('/[^0-9]/','',$request->hasil4),
            'potongan_pph'=>preg_replace('/[^0-9]/','',$request->potongan_pph),
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('pphtidakfinal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search=PphTidakFinal::where('id',$id)->get()->first();
        if($search->attribute3==null){
        $delete=PphTidakFinal::find($id);
        $delete->delete();
        }
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
