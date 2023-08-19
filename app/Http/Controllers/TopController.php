<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Top;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top=Top::all();
        return view('top.index',compact('top'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('top.create');
        
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
            'jenis_termin'=>$request->termin,
            'keterangan_termin'=>$request->kettermin,
            'attribute1'=>Auth::user()->name,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d'),
        );
        Top::create($data);
        $top=Top::all();
        $a= \DB::commit();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $top=Top::where('id',$id)->get()->first();
        return view('top.show',compact('top'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $top=Top::where('id',$id)->get()->first();
        // dd($top);
        return view('top.edit',compact('top'));
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
        Top::where('id',$id)->update([
            'jenis_termin'=>$request->termin,
            'keterangan_termin'=>$request->kettermin,
            'attribute2'=>Auth::user()->name,
            'attribute3'=>'NULL',
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
        $delete=Top::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
