<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Support\Facades\Auth;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas=Fasilitas::all();
        return view('fasilitas.index',compact('fasilitas'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitas.create');
        
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
            'no'=>$request->nomor,
            'jenis_fasilitas'=>$request->jenisfasilitas,
            'sertifikat'=>$request->sertifikat,
            'attribute1'=>Auth::user()->id,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d H:i:s'),
        );
        Fasilitas::create($data);
        $a= \DB::commit();
        return redirect()->route('fasilitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitas=Fasilitas::where('id',$id)->get()->first();
        // dd($fasilitas);
        return view('fasilitas.show',compact('fasilitas'));   
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
            $fasilitas=Fasilitas::where('id',$id)->get()->first();
        }else{
            $fasilitas=Fasilitas::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }
        if($fasilitas==null)
        {
            return back();
        }else{
            return view('fasilitas.edit',compact('fasilitas'));   
        }
        // dd($fasilitas);
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
        Fasilitas::where('id',$id)->update([
            'no'=>$request->nomor,
            'jenis_fasilitas'=>$request->jenisfasilitas,
            'sertifikat'=>$request->sertifikat,
            'attribute2'=>Auth::user()->id,
            'attribute3'=>'NULL',
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Fasilitas::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
