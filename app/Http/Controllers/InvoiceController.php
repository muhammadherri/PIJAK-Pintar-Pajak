<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Faktur;
use App\Models\FakturLine;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        if(Auth::user()->status==1){
            $invcount = Invoice::sum('total');
        }else{
            $invcount = Invoice::where('attribute1',$id)->sum('total');
        }
        return view('invoice.index',compact('invcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = Vendor::all();
        return view('invoice.create',compact('vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =Invoice::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;

        $barang_inv = $request->input('namabarang_inv');
        $kuantitas_inv = $request->input('angka1');
        $harga_satuan_inv = $request->input('angka2');
        $total_diskon_inv = $request->input('angka3');
        $total_harga_inv = $request->input('hasil');

        $barang_faktur = $request->input('namabarang_fktr');
        $kuantitas_faktur = $request->input('angka4');
        $harga_satuan_faktur = $request->input('angka5');
        $total_diskon_faktur = $request->input('angka6');
        $total_harga_faktur = $request->input('hasil2');

        $data_inv = array(
            'invoice_id'=>$header_id,
            'pembeli'=>$request->vendor_invoice,
            'no_faktur'=>$request->faktur_komersial,
            'tgl_faktur'=>$request->tgl_faktur,
            'jatuh_tempo'=>$request->tgl_jatuh_tempo,
            'termin_pembayaran'=>$request->termin_pembayaran,
            'nilai_transaksi'=>$request->nilaitransaksi,
            'potongan_harga'=>$request->potonganharga,
            'ppn'=>$request->ppn,
            'total'=>$request->totaltrx,
            'catatan'=>$request->catatan,
            'informasi_pembayaran'=>$request->informasi_pembayaran,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d'),
        );
        $data_faktur = array(
            'faktur_id'=>$header_id,
            'pembeli'=>$request->vendor_efaktur,
            'jenis_dok'=>$request->fakturpajaknormal,
            'dok_lain'=>$request->dokumenlainlain,
            'no_seri'=>$request->no_seri,
            'no_dok'=>$request->no_dokumen,
            'catatan'=>$request->catatan_efaktur,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d'),
        );
        // dd($data_faktur);
        Invoice::create($data_inv);
        Faktur::create($data_faktur);
        $a= \DB::commit();
        
        foreach ($barang_inv as $key => $barang) {
            $data_inv = array(
                'invoice_id' => $header_id,
                'nama_barang' => $barang_inv[$key],
                'kuantitas' => $kuantitas_inv[$key],
                'harga_satuan' => $harga_satuan_inv[$key],
                'total_diskon' => $total_diskon_inv[$key],
                'total_harga' => $total_harga_inv[$key],
                'created_at'=>date('Y-m-d'),
            );
            // dd($data_inv);
            $data_faktur = array(
                'faktur_id' => $header_id,
                'nama_barang' => $barang_faktur[$key],
                'kuantitas' => $kuantitas_faktur[$key],
                'harga_satuan' => $harga_satuan_faktur[$key],
                'total_diskon' => $total_diskon_faktur[$key],
                'total_harga' => $total_harga_faktur[$key],
                'created_at'=>date('Y-m-d'),
            );
            // dd($data_inv);
            InvoiceLine::create($data_inv);
            FakturLine::create($data_faktur);
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Invoice::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
