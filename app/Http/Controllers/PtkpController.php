<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ptkp;
use Illuminate\Support\Facades\Auth;

class PtkpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptkp=Ptkp::all();
        return view('ptkp.index',compact('ptkp'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptkp.create');
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
            'status_pernikahan'=>$request->status,
            'tanggungan'=>$request->tanggungan,
            'besaran_ptkp'=>$request->besaran_ptkp,
            'kode_ptkp'=>$request->kode,
            'attribute1'=>Auth::user()->name,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d'),
        );
        Ptkp::create($data);
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
        $ptkp = Ptkp::where('id',$id)->get()->first();
        return view('ptkp.show',compact('ptkp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ptkp = Ptkp::where('id',$id)->get()->first();
        return view('ptkp.edit',compact('ptkp'));
        
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
        Ptkp::where('id',$id)->update([
            'status_pernikahan'=>$request->status,
            'tanggungan'=>$request->tanggungan,
            'besaran_ptkp'=>$request->besaran_ptkp,
            'kode_ptkp'=>$request->kode,
            'attribute2'=>Auth::user()->name,
            'updated_at'=>date('Y-m-d'),
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
        $delete=Ptkp::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');

    }
}