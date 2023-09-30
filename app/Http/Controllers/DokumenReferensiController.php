<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenReferensi;
use Illuminate\Support\Facades\Auth;

class DokumenReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc=DokumenReferensi::get();
        return view('dokumenreferensi.index',compact('doc'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumenreferensi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->jenisdokumen);
        DokumenReferensi::updateOrCreate([
            'no'=>$request->no,
            'jenis_dokumen'=>$request->jenisdokumen,
            'sertifikat'=>$request->sertifikat,
            'attribute1'=>Auth::user()->id,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d'),
        ]);
        $doc=DokumenReferensi::get();
        $a= \DB::commit();

        return view('dokumenreferensi.index',compact('doc'))->with('no',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doc=DokumenReferensi::where('id',$id)->get()->first();
        // dd($fasilitas);
        return view('dokumenreferensi.show',compact('doc'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doc=DokumenReferensi::where('id',$id)->get()->first();
        // dd($doc);
        return view('dokumenreferensi.edit',compact('doc'))->with('no',1);
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
        DokumenReferensi::where('id',$id)->update([
            'no'=>$request->no,
            'jenis_dokumen'=>$request->jenisdokumen,
            'sertifikat'=>$request->sertifikat,
            'attribute2'=>Auth::user()->id,
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
        $delete=DokumenReferensi::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
   
}
