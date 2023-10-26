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
            'attribute1'=>Auth::user()->id,
            'attribute2'=>'NULL',
            'attribute3'=>$request->no_rek,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        $vendor=Vendor::all();
        $a= \DB::commit();
        return redirect()->route('vendor');
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
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $vendor=Vendor::where('id',$id)->get()->first();
        }else{
            $vendor=Vendor::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }
        // dd($vendor);
        if($vendor==null){
            return back();
        }else{
            return view('vendor.edit',compact('vendor'));
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
        Vendor::where('id',$id)->update([
            'no_id_vendor'=>$request->no_id_vendor,
            'nama_vendor'=>$request->nama_vendor,
            'alamat_vendor'=>$request->alamat_vendor,
            'contact_person'=>$request->contact_person,
            'attribute2'=>Auth::user()->id,
            'attribute3'=>$request->no_rek,
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('vendor');
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
