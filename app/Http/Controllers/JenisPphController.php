<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenispph;
use Illuminate\Support\Facades\Auth;

class JenisPphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispph=Jenispph::all();
        return view('jenispph.index',compact('jenispph'))->with('no',1);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenispph.create');
        
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
            'jenis_pph'=>$request->jenis_pph,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        Jenispph::create($data);
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
        $jenispph=Jenispph::where('id',$id)->get()->first();
        return view('jenispph.show',compact('jenispph'));   
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
            $jenispph=Jenispph::where('id',$id)->get()->first();
        }else{
            $jenispph=Jenispph::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }

        if($jenispph==null){
            return back();
        }else{
            return view('jenispph.edit',compact('jenispph'));   
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
        Jenispph::where('id',$id)->update([
            'jenis_pph'=>$request->jenis_pph,
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
        //
    }
}
