<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LatihanKeuangan;
use App\Models\Akun;
use Illuminate\Support\Facades\Auth;

class AkunLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latihankeuangan=LatihanKeuangan::all();
        return view('latihankeuangan.index',compact('latihankeuangan'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $akun=Akun::get();
        // dd($akun);
        return view('latihankeuangan.create',compact('akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cari = LatihanKeuangan::where('no_akun',$request->noakun)->first();
        // dd($cari);
        $data = array(
            'no_akun'=>$request->noakun,
            'nama_akun'=>$request->namaakun,
            'saldo'=>$request->saldo,
            'attribute1'=>Auth::user()->id,
            'attribute3'=>$request->kategori_pajak,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        if($cari==null){
            // dd('masuk');
            LatihanKeuangan::create($data);
            $a= \DB::commit();
            return redirect()->route('latihankeuangan');
        }
        // dd('keluar');
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
        $latihankeuangan=LatihanKeuangan::where('id',$id)->get()->first();
        // dd($neraca);
        return view('latihankeuangan.show',compact('latihankeuangan'));
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
            $latihankeuangan=LatihanKeuangan::where('id',$id)->get()->first();
        }else{
            $latihankeuangan=LatihanKeuangan::where('attribute1',$iduser)->where('id',$id)->get()->first();

        }
        
        if($latihankeuangan==null){
            return back();
        }else{
            return view('latihankeuangan.edit',compact('latihankeuangan'));
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
        $neraca=LatihanKeuangan::where('id',$id)->update([
            'no_akun'=>$request->noakun,
            'nama_akun'=>$request->namaakun,
            'saldo'=>$request->saldo,
            'attribute2'=>Auth::user()->id,
            'attribute3'=>$request->kategori_pajak,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('latihankeuangan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=LatihanKeuangan::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
