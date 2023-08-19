<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor=Vendor::all();
        return view('vendor.index',compact('vendor'))->with('no',1);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vendor::updateOrCreate([
            'no_id_vendor'=>$request->no_id_vendor,
            'nama_vendor'=>$request->nama_vendor,
            'alamat_vendor'=>$request->alamat_vendor,
            'contact_person'=>$request->contact_person,
            'attribute1'=>Auth::user()->name,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d'),
        ]);
        $vendor=Vendor::all();
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
        
        $vendor=Vendor::where('id',$id)->get()->first();
        return view('vendor.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor=Vendor::where('id',$id)->get()->first();
        // dd($vendor);
        return view('vendor.edit',compact('vendor'));
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
        Vendor::where('id',$id)->update([
            'no_id_vendor'=>$request->no_id_vendor,
            'nama_vendor'=>$request->nama_vendor,
            'alamat_vendor'=>$request->alamat_vendor,
            'contact_person'=>$request->contact_person,
            'attribute2'=>Auth::user()->name,
            'attribute3'=>'NULL',
            'created_at'=>date('Y-m-d'),
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
        $delete=Vendor::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
