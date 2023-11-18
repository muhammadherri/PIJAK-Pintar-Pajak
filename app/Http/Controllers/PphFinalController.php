<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pphfinal;
use App\Models\KodeObjekPPhFinal;
use Illuminate\Support\Facades\Auth;

class PphFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pphfinal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kopfinal = KodeObjekPPhFinal::get();
        return view('pphfinal.create',compact('kopfinal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =Pphfinal::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRX'.'0'.$header_id.$date.'F';
      
        $data = array(
            'transaksi'=>$trx,
            'kode_objek_pajak'=>$request->kop,
            'bruto'=>preg_replace('/[^0-9]/','',$request->bruto),
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
            'potongan_pph'=>preg_replace('/[^0-9]/','',$request->input('potongan_pph')),
            'nama_dosen'=>Auth::user()->dosen_pembimbing,
            'attribute1'=>Auth::user()->id,
        );
        Pphfinal::create($data);
        $a= \DB::commit();
        return redirect()->route('pphfinal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kopfinal = KodeObjekPPhFinal::get();
        $pphfinal=Pphfinal::where('id',$id)->get()->first();
        return view('pphfinal.show',compact('pphfinal','kopfinal'));
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
        //     $pphfinal=Pphfinal::where('id',$id)->get()->first();
        // }else{
            $kopfinal = KodeObjekPPhFinal::get();
            $pphfinal=Pphfinal::where('attribute1',$iduser)->where('id',$id)->get()->first();
        // }

        if($pphfinal==null){
            return back();
        }else{
            return view('pphfinal.edit',compact('pphfinal','kopfinal'));
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
        Pphfinal::where('id',$id)->update([
            'kode_objek_pajak'=>$request->kop,
            'bruto'=>preg_replace('/[^0-9]/','',$request->bruto),
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
            'potongan_pph'=>preg_replace('/[^0-9]/','',$request->input('potongan_pph')),
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('pphfinal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search=Pphfinal::where('id',$id)->get()->first();
        if($search->attribute3==null){
            $delete=Pphfinal::find($id);
            $delete->delete();
        }
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
