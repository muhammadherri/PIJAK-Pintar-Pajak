<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeJenisSetoran;
use Illuminate\Support\Facades\Auth;

class KodeJenisSetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kjs=KodeJenisSetoran::all();
        return view('kodejenissetoran.index',compact('kjs'));
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
            return view('kodejenissetoran.create');
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
            'kode'=>$request->kode,
            'jenis_setoran'=>$request->jenis_setoran,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        KodeJenisSetoran::create($data);
        $a= \DB::commit();
        return redirect()->route('kodejenissetoran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kjs=KodeJenisSetoran::where('id',$id)->get()->first();
        return view('kodejenissetoran.show',compact('kjs'));
        
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
            $kjs=KodeJenisSetoran::where('id',$id)->get()->first();
        }else{
            return back();
        }
        return view('kodejenissetoran.edit',compact('kjs'));
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
            'kode'=>$request->kode,
            'jenis_setoran'=>$request->jenis_setoran,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        );
        KodeJenisSetoran::where('id',$id)->update($data);
        $a= \DB::commit();
        return redirect()->route('kodejenissetoran');
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
        KodeJenisSetoran::where('id',$id)->update($data);
        $a= \DB::commit();
        return redirect()->route('kodejenissetoran');
    }
}
