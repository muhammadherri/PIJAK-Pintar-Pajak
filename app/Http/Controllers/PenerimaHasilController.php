<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaHasil;
use Illuminate\Support\Facades\Auth;

class PenerimaHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimahasil=PenerimaHasil::all();
        return view('penerimapenghasilan.index',compact('penerimahasil'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerimapenghasilan.create');
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
            'penerima_penghasilan'=>$request->penerima_penghasilan,
            'kode_objek_pajak'=>$request->kop,
            'attribute1'=>Auth::user()->id,
        );
        PenerimaHasil::create($data);
        $a= \DB::commit();
        return redirect()->route('penerimapenghasilan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerimahasil=PenerimaHasil::where('id',$id)->get()->first();
        return view('penerimapenghasilan.show',compact('penerimahasil'));
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
            $penerimahasil=PenerimaHasil::where('id',$id)->get()->first();
        }else{
            $penerimahasil=PenerimaHasil::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }

        if($penerimahasil==null){
            return back();
        }else{
            return view('penerimapenghasilan.edit',compact('penerimahasil'));
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
        PenerimaHasil::where('id',$id)->update([
            'penerima_penghasilan'=>$request->penerima_penghasilan,
            'kode_objek_pajak'=>$request->kop,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('penerimapenghasilan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=PenerimaHasil::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
