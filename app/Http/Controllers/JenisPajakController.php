<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisPajak;
use Illuminate\Support\Facades\Auth;

class JenisPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jensipajak=JenisPajak::get();
        return view('jenispajak.index',compact('jensipajak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenispajak.create');
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
            'kode'=>$request->kode,
            'jenis_pajak'=>$request->jenis,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        JenisPajak::create($data);
        $a= \DB::commit();
        return redirect()->route('jenis_pajak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jensipajak=JenisPajak::where('id',$id)->first();
        return view('jenispajak.show',compact('jensipajak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jensipajak=JenisPajak::where('id',$id)->first();
        return view('jenispajak.edit',compact('jensipajak'));
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
        JenisPajak::where('id',$id)->update([
            'kode'=>$request->kode,
            'jenis_pajak'=>$request->jenis,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('jenis_pajak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        JenisPajak::where('id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('jenis_pajak');
    }
}
