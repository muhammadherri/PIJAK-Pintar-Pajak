<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebupot;
use App\Models\Ebupotlines;
use App\Models\Fasilitas;
use App\Models\Kodepajak;
use App\Models\DokumenReferensi;
use App\Models\Penandatanganan;
use App\Models\Jenispph;
use Illuminate\Support\Facades\Auth;

class EbupotController extends Controller
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
            $ebupot=Ebupot::get();
        }else{
            $ebupot=Ebupot::where('attribute1',$id)->get();
        }
        // dd($ebupot);
        return view('ebupot.index',compact('ebupot'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas=Fasilitas::all();
        $kodepajak=Kodepajak::all();
        $dokref=DokumenReferensi::all();
        $penandatanganan=Penandatanganan::all();
        $jenispph = Jenispph::all();
        // dd($fasilitas);
        return view('ebupot.create',compact('fasilitas','kodepajak','dokref','penandatanganan','jenispph'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =Ebupot::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRX'.'0'.$header_id.$date;

        $dok_ref = $request->input('column1');
        $no_dok = $request->input('column2');
        $tgl_doc = $request->input('column3');

        $data = array(
            'ebupot_id'=>$header_id,
            'trx'=>$trx,
            'jenis_pph'=>$request->jenis_pph,
            'pilih_transaksi'=>$request->transaksi_npwp,
            'no_tlp'=>$request->no_telp,
            'attribute1'=>Auth::user()->id,
            'attribute2'=>'NULL',
            'attribute3'=>'NULL',
            'fasilitas'=>$request->fasilitas,
            'tanggal_bukti_potong'=>$request->tgl_bukti_potong,
            'periode_pajak'=>$request->periode_pajak,
            'kode_objek_pajak'=>$request->kode_objek_pajak,
            'jumlah_bruto'=>$request->jumlah_bruto,
            'tarif'=>$request->tarif,
            'potongan_pph'=>$request->potongan_pph,
            'penandatanganan'=>$request->penandatanganan,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        Ebupot::create($data);
        $a= \DB::commit();
        foreach ($dok_ref as $key => $ebupot_id) {
            $data = array(
                'ebupot_id' => $header_id,
                'dok_ref' => $dok_ref[$key],
                'no_dok' => $no_dok[$key],
                'tgl_doc' => $tgl_doc[$key],
                'created_at'=>date('Y-m-d H:i:s'),
            );
            Ebupotlines::create($data);
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
        $iduser=Auth::user()->id;
        $ebupot=Ebupot::where('id',$id)->where('attribute1',$iduser)->get()->first();
        $ebupotline=Ebupotlines::where('ebupot_id',$ebupot->ebupot_id)->get();
        // dd($ebupotline);
        $fasilitas=Fasilitas::all();
        $kodepajak=Kodepajak::all();
        $dokref=DokumenReferensi::all();
        $penandatanganan=Penandatanganan::all();
        $jenispph = Jenispph::all();

        if($ebupot==null){
            return back();
        }else{
            return view('ebupot.show',compact('ebupot','ebupotline','fasilitas','kodepajak','dokref','penandatanganan','jenispph'));  
        }
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
        $ebupot=Ebupot::where('id',$id)->where('attribute1',$iduser)->get()->first();
        $ebupotline=Ebupotlines::where('ebupot_id',$ebupot->ebupot_id)->get();
        // dd($ebupotline);
        $fasilitas=Fasilitas::all();
        $kodepajak=Kodepajak::all();
        $dokref=DokumenReferensi::all();
        $penandatanganan=Penandatanganan::all();
        $jenispph = Jenispph::all();
        if($ebupot==null){
            return back();
        }else{
            return view('ebupot.edit',compact('ebupot','ebupotline','fasilitas','kodepajak','dokref','penandatanganan','jenispph'));  
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
        switch ($request->input('action')) {
            case 'hapus_dasar_pemotongan':

                // dd($request->hapus_id);
                $delete=Ebupotlines::find($request->hapus_id);
                $delete->delete();
                return back();
            break;
            case 'update_trx_ebupot':
                // dd($request->ebupot_id);

                $dok_ref = $request->input('column1');
                $no_dok = $request->input('column2');
                $tgl_doc = $request->input('column3');

                Ebupot::where('id',$id)->update([
                    'jenis_pph'=>$request->jenis_pph,
                    'pilih_transaksi'=>$request->transaksi_npwp,
                    'no_tlp'=>$request->no_telp,
                    'attribute2'=>Auth::user()->id,
                    'fasilitas'=>$request->fasilitas,
                    'tanggal_bukti_potong'=>$request->tgl_bukti_potong,
                    'periode_pajak'=>$request->periode_pajak,
                    'kode_objek_pajak'=>$request->kode_objek_pajak,
                    'jumlah_bruto'=>$request->jumlah_bruto,
                    'tarif'=>$request->tarif,
                    'potongan_pph'=>$request->potongan_pph,
                    'penandatanganan'=>$request->penandatanganan,
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]);
                $a= \DB::commit(); 
                
                if($dok_ref==null){
                    return back();  
                }
                foreach ($dok_ref as $key => $ebupot_id) {
                    $data = array(
                        'ebupot_id' => $request->ebupot_id,
                        'dok_ref' => $dok_ref[$key],
                        'no_dok' => $no_dok[$key],
                        'tgl_doc' => $tgl_doc[$key],
                        'created_at'=>date('Y-m-d H:i:s'),
                    );
                    $check=Ebupotlines::where('ebupot_id',$request->ebupot_id)->get();
                    // dd($check);
                    if(!$check){
                        // dd('buat');
                        Ebupotlines::create($data);
                    }else{
                        // dd('update');
                        Ebupotlines::updateOrCreate($data);
                    }
                }
                return back();  
            break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Ebupot::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
