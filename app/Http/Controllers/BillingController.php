<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Billing;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billing = Billing::all();
        return view('billing.index',compact('billing'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Ymd');
        $header_id =Billing::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $header_id = '00'.$header_id.$date;
        // dd($header_id);
        $data = array(
            'kode_billing'=>$header_id,
            'kode_akun_pajak'=>$request->kode_akun_pajak,
            'kode_jenis_setoran'=>$request->kode_jenis_setoran,
            'npwp'=>$request->npwp,
            'start_periode_pajak'=>$request->start_periode_pajak,
            'end_periode_pajak'=>$request->end_periode_pajak,
            'keterangan'=>$request->keterangan,
            'jumlah'=>$request->jumlah,
            'attribute1'=>Auth::user()->name,
            'created_at'=>date('Y-m-d'),
        );
        Billing::create($data);
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
        $billing = Billing::where('id',$id)->get()->first();
        return view('billing.show',compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $billing = Billing::where('id',$id)->get()->first();
        return view('billing.edit',compact('billing'));
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
        Billing::where('id',$id)->update([
            'kode_akun_pajak'=>$request->kode_akun_pajak,
            'kode_jenis_setoran'=>$request->kode_jenis_setoran,
            'npwp'=>$request->npwp,
            'start_periode_pajak'=>$request->start_periode_pajak,
            'end_periode_pajak'=>$request->end_periode_pajak,
            'keterangan'=>$request->keterangan,
            'jumlah'=>$request->jumlah,
            'attribute2'=>Auth::user()->name,
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
        $delete=Billing::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
