<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spt1770SS;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Spt1770SSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spt1770ss.index')->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spt1770ss.create');
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
        $header_id =Spt1770SS::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $data = array(
            'formulir_id'=>$header_id,
            'tahun_pajak'=>$request->tahun_pajak1770ss,
            'spt_pembetulan'=>$request->spt_pembetulan_1770ss,
            'id_npwp'=>$request->id_npwp_1770ss,
            'id_nama_npwp'=>$request->id_nama_npwp_1770ss,
            'a1_pajak'=>preg_replace('/[^0-9]/','',$request->a1_pajak_1770ss),
            'a2_pajak'=>preg_replace('/[^0-9]/','',$request->a2_pajak_1770ss),
            'a3_pajak_dd'=>$request->id_status_kewajiban,
            'a3_pajak'=>preg_replace('/[^0-9]/','',$request->a3_pajak_1770ss),
            'a4_pajak'=>preg_replace('/[^0-9]/','',$request->a4_pajak_1770ss),
            'a5_pajak'=>preg_replace('/[^0-9]/','',$request->a5_pajak_1770ss),
            'a6_pajak'=>preg_replace('/[^0-9]/','',$request->a6_pajak_1770ss),
            'a7_pajak'=>$request->a7pajak_1770s,
            'a7_jumlah_pajak'=>preg_replace('/[^0-9]/','',$request->a7_pajak_jumlah_1770ss),
            'b8_penghasilan'=>preg_replace('/[^0-9]/','',$request->a8_penghasil_1770ss),
            'b9_penghasilan'=>preg_replace('/[^0-9]/','',$request->a9_penghasil_1770ss),
            'b10_penghasilan'=>preg_replace('/[^0-9]/','',$request->a10_penghasil_1770ss),
            'c11_daftar'=>preg_replace('/[^0-9]/','',$request->a11_daftar_1770ss),
            'c12_daftar'=>preg_replace('/[^0-9]/','',$request->a12_daftar_1770ss),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data);
        Spt1770SS::create($data);
        $a= \DB::commit();
        return redirect()->route('sptSS');
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
            $spt=Spt1770SS::where('formulir_id',$id)->get()->first();
        }else{
            $spt=Spt1770SS::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
        }
        if($spt==null){
            return back();
        }
        // dd($spt);
        return view('spt1770ss.show',compact(
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Spt1770SS::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
