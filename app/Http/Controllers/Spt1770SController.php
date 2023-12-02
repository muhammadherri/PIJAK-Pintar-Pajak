<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spt1770S;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Spt1770SController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spt1770s.index')->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spt1770s.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $header_id =Spt1770S::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $data = array(
            'formulir_id'=>$header_id,
            'tahun_pajak'=>$request->tahun_pajak,
            'pembetulan'=>$request->spt_pembetulan_1770s,
            'npwp'=>$request->id_npwp_1770s,
            'nama_npwp'=>$request->id_nama_wajib_pajak_1770s,
            'pekerjaan'=>$request->id_pekerjaan_1770s,
            'klu'=>$request->id_klu_1770s,
            'no_telp'=>$request->id_no_telp_1770s,
            'no_faks'=>$request->id_no_faks_1770s,
            'status_kewajiban'=>$request->id_status_kewajiban,
            'npwp_pasangan'=>$request->id_npwp_pasangan_1770s,
            'a1_penghasil'=>preg_replace('/[^0-9]/','',$request->a1_rupiah_1770s),
            'a2_penghasil'=>preg_replace('/[^0-9]/','',$request->a2_rupiah_1770s),
            'a3_penghasil'=>preg_replace('/[^0-9]/','',$request->a3_rupiah_1770s),
            'a4_penghasil'=>preg_replace('/[^0-9]/','',$request->a4_rupiah_1770s),
            'a5_penghasil'=>preg_replace('/[^0-9]/','',$request->a5_rupiah_1770s),
            'a6_penghasil'=>preg_replace('/[^0-9]/','',$request->a6_rupiah_1770s),
            'b7_kena_pajak'=>$request->b7_penghasilankenapajak,
            'b7_penghasil'=>preg_replace('/[^0-9]/','',$request->b7_rupiah_1770s),
            'b8_penghasil'=>preg_replace('/[^0-9]/','',$request->b8_rupiah_1770s),
            'c9_terutang'=>preg_replace('/[^0-9]/','',$request->c9_rupiah_1770s),
            'c10_terutang'=>preg_replace('/[^0-9]/','',$request->c10_rupiah_1770s),
            'c11_terutang'=>preg_replace('/[^0-9]/','',$request->c11_rupiah_1770s),
            'd12_kredit'=>preg_replace('/[^0-9]/','',$request->d12_rupiah_1770s),
            'pph_dibayar'=>$request->d13_pph_1770s,
            'd13_kredit'=>preg_replace('/[^0-9]/','',$request->d13_jumlah_1770s),
            'd14a_kredit'=>preg_replace('/[^0-9]/','',$request->d14a_rupiah_1770s),
            'd14b_kredit'=>preg_replace('/[^0-9]/','',$request->d14b_rupiah_1770s),
            'd15_kredit'=>preg_replace('/[^0-9]/','',$request->d15_rupiah_1770s),
            'e_kurangbayar'=>$request->e16_pph_1770s,
            'e16_date_kurangbayar'=>Carbon::parse($request->e16_date_1770s)->format('d-M-Y'),
            'e16_jumlah_kurangbayar'=>preg_replace('/[^0-9]/','',$request->e16_rupiah_1770s),
            'e17_kurangbayar'=>$request->e17_permohonan_1770s,
            'f18_lebihbayar_kurangbayar'=>$request->f18_permohonan_1770s,
            'f18_rupiah_kurangbayar'=>preg_replace('/[^0-9]/','',$request->f18_rupiah_1770s),
            'g_lampiran'=>$request->g_lampiran_1770s,
            'pernyataan'=>$request->pernyataan_1770s,
            'pernyataan_date'=>Carbon::parse($request->pernyataan_date_1770s)->format('d-M-Y'),
            'pernyataan_nama_lengkap'=>$request->pernyataan_nama_lengkap_1770s,
            'pernyataan_npwp'=>$request->pernyataan_npwp_1770s,
            'attribute1'=>Auth::user()->id,
        );
        // dd($data);
        Spt1770S::create($data);
        $a= \DB::commit();
        return redirect()->route('sptS');
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
        if(Auth::user()->status==1){
            $spt=Spt1770S::where('formulir_id',$id)->get()->first();
        }else{
            $spt=Spt1770S::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
        }
        if($spt==null){
            return back();
        }
        // dd($spt);
        return view('spt1770s.show',compact(
            'spt'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $delete=Spt1770S::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
