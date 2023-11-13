<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeObjekPPhTidakFinal;
use Illuminate\Support\Facades\Auth;

class KodeObjekPPhTidakFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $koptidakfinal=KodeObjekPPhTidakFinal::get();
        return view('kodeobjekpphtidakfinal.index',compact('koptidakfinal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            return view('kodeobjekpphtidakfinal.create');
        }else{
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'kode_objek'=>$request->kode,
            'penerima_penghasilan'=>$request->penerima_penghasilan,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        KodeObjekPPhTidakFinal::create($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpphtidakfinal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $koptidakfinal=KodeObjekPPhTidakFinal::where('id',$id)->get()->first();
        return view('kodeobjekpphtidakfinal.show',compact('koptidakfinal'));   
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
        if(Auth::user()->status==1){
            $koptidakfinal=KodeObjekPPhTidakFinal::where('id',$id)->get()->first();
        }else{
            return back();
        }
        return view('kodeobjekpphtidakfinal.edit',compact('koptidakfinal'));
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
        $data = array(
            'kode_objek'=>$request->kode,
            'penerima_penghasilan'=>$request->penerima_penghasilan,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        KodeObjekPPhTidakFinal::where('id',$id)->update($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpphtidakfinal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = array(
            'deleted_at'=>date('Y-m-d H:i:s'),
        );
        KodeObjekPPhTidakFinal::where('id',$id)->update($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpphtidakfinal');
    }
}
