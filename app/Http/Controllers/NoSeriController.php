<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoSeri;
use Illuminate\Support\Facades\Auth;

class NoSeriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noseri=NoSeri::all();
        return view('nomorseri.index',compact('noseri'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nomorseri.create');
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
            'no_seri'=>$request->noseri,
            'serial_name'=>$request->tanggungan,
            'besaran_ptkp'=>$request->nama_serial,
            'attribute1'=>Auth::user()->id,
        );
        NoSeri::create($data);
        $a= \DB::commit();
        return redirect()->route('noseri');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noseri = NoSeri::where('id',$id)->get()->first();
        return view('nomorseri.show',compact('noseri'));
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
            $noseri = NoSeri::where('id',$id)->get()->first();
        }else{
            $noseri = NoSeri::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }
        if($noseri==null){
            return back();
        }else{
            return view('nomorseri.edit',compact('noseri'));
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
        NoSeri::where('id',$id)->update([
            'no_seri'=>$request->noseri,
            'serial_name'=>$request->nama_serial,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('noseri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=NoSeri::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
