<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaKelas;
use Illuminate\Support\Facades\Auth;

class NamaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namakelas=NamaKelas::all();
        return view('namakelas.index',compact('namakelas'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('namakelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cari = NamaKelas::where('nama_kelas',$request->namakelas)->first();
        // dd($cari);
        if($cari==null){
            $data = array(
                'nama_kelas'=>$request->namakelas,
                'attribute1'=>Auth::user()->id,
            );
            // dd($data);
            NamaKelas::create($data);
            $a= \DB::commit();
            return redirect()->route('namakelas');
        }else{
            return redirect()->route('namakelas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->status==1){
            $namakelas=NamaKelas::where('id',$id)->get()->first();
            // dd($namakelas);
            return view('namakelas.edit',compact('namakelas'));
        }else{
            return back();
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
        $cari = NamaKelas::where('nama_kelas',$request->namakelas)->first();
        // dd($cari);
        if($cari==null){
            $data = array(
                'nama_kelas'=>$request->namakelas,
                'attribute1'=>Auth::user()->id,
            );
            // dd($data);
            NamaKelas::where('id',$id)->update($data);
            $a= \DB::commit();
            return redirect()->route('namakelas');
        }else{
            return redirect()->route('namakelas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=NamaKelas::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
