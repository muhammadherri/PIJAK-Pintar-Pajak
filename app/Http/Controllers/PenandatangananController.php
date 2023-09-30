<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penandatanganan;
use Illuminate\Support\Facades\Auth;

class PenandatangananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penandatanganan=Penandatanganan::all();
        return view('penandatanganan.index',compact('penandatanganan'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penandatanganan.create');
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
            'name'=>$request->name,
            'npwp'=>$request->npwp,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        Penandatanganan::create($data);
        $a= \DB::commit();
        return redirect()->back()->with('alert','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penandatanganan=Penandatanganan::where('id',$id)->get()->first();
        return view('penandatanganan.show',compact('penandatanganan'));
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
            $penandatanganan=Penandatanganan::where('id',$id)->get()->first();
        }else{
            $penandatanganan=Penandatanganan::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }

        if($penandatanganan==null){
            return back();
        }else{
            return view('penandatanganan.edit',compact('penandatanganan'));
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
        Penandatanganan::where('id',$id)->update([
            'name'=>$request->name,
            'npwp'=>$request->npwp,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
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
        $delete=Penandatanganan::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
