<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeObjekPPhFinal;
use Illuminate\Support\Facades\Auth;

class KodeObjekPPhFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kopfinal=KodeObjekPPhFinal::all();
        return view('kodeobjekpphfinal.index',compact('kopfinal'));
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
            return view('kodeobjekpphfinal.create');
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
        KodeObjekPPhFinal::create($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpphfinal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kopfinal=KodeObjekPPhFinal::where('id',$id)->get()->first();
        return view('kodeobjekpphfinal.show',compact('kopfinal'));
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
            $kopfinal=KodeObjekPPhFinal::where('id',$id)->get()->first();
        }else{
            return back();
        }
        return view('kodeobjekpphfinal.edit',compact('kopfinal'));
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
        KodeObjekPPhFinal::where('id',$id)->update($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpphfinal');
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
        KodeObjekPPhFinal::where('id',$id)->update($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpphfinal');
    }
}
