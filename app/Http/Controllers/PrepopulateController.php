<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prepopulate;
use Illuminate\Support\Facades\Auth;

class PrepopulateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('tes');
        $id=Auth::user()->id;
        // if(Auth::user()->status==1){
        //     $invcount = Prepopulate::sum('jumlah_ppn');
        // }else{
            $invcount = Prepopulate::where('attribute1',$id)->sum('jumlah_ppn');
        // }
        return view('prepopulates.index',compact('invcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prepopulates.create');

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
            'masa_ppn'=>$request->masa_ppn,
            'tahun'=>$request->tahun,
            'npwp'=>$request->npwp,
            'nama_npwp'=>$request->nama_wajib_pajak,
            'alamat_npwp'=>$request->alamat_wajib_pajak,
            'no_faktur'=>$request->nomor_faktur,
            'jumlah_dpp'=>preg_replace('/[^0-9]/','',$request->jumlah_dpp),
            'jumlah_ppn'=>preg_replace('/[^0-9]/','',$request->jumlah_ppn),
            'keterangan'=>$request->keterangan,
            'attribute1'=>Auth::user()->id
        );
        Prepopulate::create($data);
        $a= \DB::commit();
        return redirect()->route('prepopulates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prep=Prepopulate::where('id',$id)->get()->first();
        return view('prepopulates.show',compact('prep'));
        
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
        $prep=Prepopulate::where('id',$id)->where('attribute1',$iduser)->get()->first();
        return view('prepopulates.edit',compact('prep'));
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
        Prepopulate::where('id',$id)->update([
            'masa_ppn'=>$request->masa_ppn,
            'tahun'=>$request->tahun,
            'npwp'=>$request->npwp,
            'nama_npwp'=>$request->nama_wajib_pajak,
            'alamat_npwp'=>$request->alamat_wajib_pajak,
            'no_faktur'=>$request->nomor_faktur,
            'jumlah_dpp'=>preg_replace('/[^0-9]/','',$request->jumlah_dpp),
            'jumlah_ppn'=>preg_replace('/[^0-9]/','',$request->jumlah_ppn),
            'keterangan'=>$request->keterangan,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('prepopulates');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('masuk');
        $delete=Prepopulate::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
