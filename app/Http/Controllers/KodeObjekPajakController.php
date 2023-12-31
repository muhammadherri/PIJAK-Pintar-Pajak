<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kodepajak;
use Illuminate\Support\Facades\Auth;

class KodeObjekPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodepajak=Kodepajak::all();
        return view('kodeobjekpajak.index',compact('kodepajak'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kodeobjekpajak.create');
        
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
            'kode_objek_pajak'=>$request->kodeobjekpajak,
            'keterangan'=>$request->keterangan,
            'tarif'=>$request->tarif,
            'attribute1'=>Auth::user()->id,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d H:i:s'),
        );
        Kodepajak::create($data);
        $a= \DB::commit();
        return redirect()->route('kodeobjekpajak');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kodepajak=Kodepajak::where('id',$id)->get()->first();
        return view('kodeobjekpajak.show',compact('kodepajak'));
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
            $kodepajak=Kodepajak::where('id',$id)->get()->first();
        }else{
            $kodepajak=Kodepajak::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }

        if($kodepajak==null){
            return back();
        }else{
            return view('kodeobjekpajak.edit',compact('kodepajak'));
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
        Kodepajak::where('id',$id)->update([
            'kode_objek_pajak'=>$request->kodeobjekpajak,
            'keterangan'=>$request->keterangan,
            'tarif'=>$request->tarif,
            'attribute2'=>Auth::user()->id,
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('kodeobjekpajak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Kodepajak::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');

    }
}
