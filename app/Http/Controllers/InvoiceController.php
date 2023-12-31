<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use App\Models\Faktur;
use App\Models\FakturLine;
use App\Models\NoSeri;
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
        // if(Auth::user()->status==1){
        //     $invcount = Invoice::sum('ppn');
        // }else{
            $fktr10 = Faktur::where('attribute1',$id)->where('no_seri','010')->sum('ppn_fktr');
            $fktr40 = Faktur::where('attribute1',$id)->where('no_seri','040')->sum('ppn_fktr');
            $fktr60 = Faktur::where('attribute1',$id)->where('no_seri','060')->sum('ppn_fktr');
            $fktr90 = Faktur::where('attribute1',$id)->where('no_seri','090')->sum('ppn_fktr');
            $fktrgg = Faktur::where('attribute1',$id)->where('no_seri','Digunggung')->sum('ppn_fktr');
            $fktrcount= $fktr10+$fktr40+$fktr60+$fktr90+$fktrgg;
            $invcount = Invoice::where('attribute1',$id)->sum('ppn');
        // }
        return view('invoice.index',compact('invcount','fktrcount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = Vendor::all();
        $noseri = NoSeri::all();
        return view('invoice.create',compact('vendor','noseri'));
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

        $barang_inv = $request->input('angka0');
        $kuantitas_inv = preg_replace('/[^0-9]/','',$request->input('angka1'));
        $harga_satuan_inv = preg_replace('/[^0-9]/','',$request->input('angka2'));
        $total_diskon_inv = preg_replace('/[^0-9]/','',$request->input('angka3'));
        $total_harga_inv = preg_replace('/[^0-9]/','',$request->input('hasil'));

        $barang_faktur = $request->input('angka7');
        $kuantitas_faktur = preg_replace('/[^0-9]/','',$request->input('angka4'));
        $harga_satuan_faktur = preg_replace('/[^0-9]/','',$request->input('angka5'));
        $total_diskon_faktur = preg_replace('/[^0-9]/','',$request->input('angka6'));
        $total_harga_faktur = preg_replace('/[^0-9]/','',$request->input('hasil2'));

        $data_inv = array(
            'invoice_id'=>$header_id,
            'pembeli'=>$request->vendor_invoice,
            'no_faktur'=>$request->faktur_komersial,
            'tgl_faktur'=>$request->tgl_faktur,
            'no_seri'=>$request->no_seri,
            'jatuh_tempo'=>$request->tgl_jatuh_tempo,
            'termin_pembayaran'=>$request->termin_pembayaran,
            'nilai_transaksi'=>preg_replace('/[^0-9]/','',$request->nilaitransaksi),
            'potongan_harga'=>preg_replace('/[^0-9]/','',$request->potonganharga),
            'ppn'=>preg_replace('/[^0-9]/','',$request->ppn),
            'total'=>preg_replace('/[^0-9]/','',$request->totaltrx),
            'catatan'=>$request->catatan,
            'informasi_pembayaran'=>$request->informasi_pembayaran,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        $data_faktur = array(
            'faktur_id'=>$header_id,
            'pembeli'=>$request->vendor_efaktur,
            'jenis_dok'=>$request->jenisdokumen,
            'dok_lain'=>$request->dokumenlainlain,
            'no_seri'=>$request->no_seri,
            'no_dok'=>$request->no_dokumen,
            'nilai_transaksi_fktr'=>preg_replace('/[^0-9]/','',$request->nilaitransaksi_fktr),
            'potongan_harga_fktr'=>preg_replace('/[^0-9]/','',$request->potonganharga_fktr),
            'ppn_fktr'=>preg_replace('/[^0-9]/','',$request->ppn_fktr),
            'total_fktr'=>preg_replace('/[^0-9]/','',$request->totaltrx_fktr),
            'catatan'=>$request->catatan_efaktur,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        // dd($data_faktur);
        Invoice::create($data_inv);
        Faktur::create($data_faktur);
        $a= \DB::commit();
        
        foreach ($barang_inv as $key => $barang) {
            $data_inv = array(
                'invoice_id' => $header_id,
                'no_seri' => $request->no_seri,
                'nama_barang' => $barang_inv[$key],
                'kuantitas' => $kuantitas_inv[$key],
                'harga_satuan' => $harga_satuan_inv[$key],
                'total_diskon' => $total_diskon_inv[$key],
                'total_harga' => $total_harga_inv[$key],
                'attribute1' => Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
        //   dd($data_inv);
            InvoiceLine::create($data_inv);
        }
        foreach ($barang_faktur as $key => $barang) {
            $data_faktur = array(
                'faktur_id' => $header_id,
                'no_seri' => $request->no_seri,
                'nama_barang' => $barang_faktur[$key],
                'kuantitas' => $kuantitas_faktur[$key],
                'harga_satuan' => $harga_satuan_faktur[$key],
                'total_diskon' => $total_diskon_faktur[$key],
                'total_harga' => $total_harga_faktur[$key],
                'attribute1' => Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            FakturLine::create($data_faktur);
        }
        return redirect()->route('invoice');

    }

    public function show($id)
    {
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $inv=Invoice::where('invoice_id',$id)->get()->first();
            $faktur=Faktur::where('faktur_id',$id)->get()->first();
            $invline=InvoiceLine::where('invoice_id',$id)->get();
            $fktrline=FakturLine::where('faktur_id',$id)->get();
            $noseri = NoSeri::all();
            $vendor=Vendor::get();
        }else{
            $inv=Invoice::where('attribute1',$iduser)->where('invoice_id',$id)->get()->first();
            $faktur=Faktur::where('attribute1',$iduser)->where('faktur_id',$id)->get()->first();
            $invline=InvoiceLine::where('invoice_id',$id)->get();
            $fktrline=FakturLine::where('faktur_id',$id)->get();
            $noseri = NoSeri::all();
            $vendor=Vendor::get();
        }
        if($inv==null){
            return back();
        }
        return view('invoice.show',compact(
            'inv','faktur','invline','fktrline','vendor','noseri'
        ));
    }

    public function edit($id)
    {
        dd('Hubungi Developer');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        // dd($id);
        Invoice::where('invoice_id',$id)->update([
            'attribute2'=>Auth::user()->id,
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        InvoiceLine::where('invoice_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Faktur::where('faktur_id',$id)->update([
            'attribute2'=>Auth::user()->id,
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        FakturLine::where('faktur_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
