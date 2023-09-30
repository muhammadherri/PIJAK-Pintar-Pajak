<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Neraca;
use Illuminate\Support\Facades\Auth;

class NeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neraca=Neraca::all();
        return view('neraca.index',compact('neraca'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('neraca.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $cari = Neraca::where('no_akun',$request->noakun)->first();
        // dd($cari);
        $data = array(
            'no_akun'=>$request->noakun,
            'nama_akun'=>$request->namaakun,
            'saldo'=>$request->saldo,
            'attribute1'=>Auth::user()->id,
            'attribute3'=>$request->kategori_pajak,
            'created_at'=>date('Y-m-d'),
        );
        if($cari==null){
            // dd('masuk');
            Neraca::create($data);
            $a= \DB::commit();
            return redirect()->back()->with('alert','Berhasil');
        }
        // dd('keluar');
        return redirect()->back()->with('alert','Berhasil');
        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $neraca=Neraca::where('id',$id)->get()->first();
        // dd($neraca);
        return view('neraca.show',compact('neraca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $neraca=Neraca::where('id',$id)->get()->first();
        // dd($neraca);
        return view('neraca.edit',compact('neraca'));
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
        Neraca::where('id',$id)->update([
            'no_akun'=>$request->noakun,
            'nama_akun'=>$request->namaakun,
            'saldo'=>$request->saldo,
            'attribute2'=>Auth::user()->id,
            'attribute3'=>$request->kategori_pajak,
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
        $delete=Neraca::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
