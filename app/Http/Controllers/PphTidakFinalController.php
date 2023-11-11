<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PphTidakFinal;
use Illuminate\Support\Facades\Auth;

class PphTidakFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pphtidakfinal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pphtidakfinal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =PphTidakFinal::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRX'.'0'.$header_id.$date;

        $data = array(
            'trx'=>$trx,
            'kode_objek_pajak'=>$request->kop,
            'bruto'=>preg_replace('/[^0-9]/','',$request->bruto),
            'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->pengenaan_pajak),
            'tarif_lebih_tinggi'=>1,
            'tarif'=>preg_replace('/[^0-9]/','',$request->tarif),
            'potongan_pph'=>preg_replace('/[^0-9]/','',$request->potongan_pph),
            'attribute1'=>Auth::user()->id
        );
        PphTidakFinal::create($data);
        $a= \DB::commit();
        return redirect()->route('pphtidakfinal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pphtidakfinal=PphTidakFinal::where('id',$id)->get()->first();
        return view('pphtidakfinal.show',compact('pphtidakfinal'));
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
        // if(Auth::user()->status==1){
        //     $pphtidakfinal=PphTidakFinal::where('id',$id)->get()->first();
        // }else{
            $pphtidakfinal=PphTidakFinal::where('attribute1',$iduser)->where('id',$id)->get()->first();
        // }

        if($pphtidakfinal==null){
            return back();
        }else{
            return view('pphtidakfinal.edit',compact('pphtidakfinal'));
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
        PphTidakFinal::where('id',$id)->update([
            'kode_objek_pajak'=>$request->kop,
            'bruto'=>preg_replace('/[^0-9]/','',$request->bruto),
            'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->pengenaan_pajak),
            'tarif_lebih_tinggi'=>1,
            'tarif'=>preg_replace('/[^0-9]/','',$request->tarif),
            'potongan_pph'=>preg_replace('/[^0-9]/','',$request->potongan_pph),
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->route('pphtidakfinal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search=PphTidakFinal::where('id',$id)->get()->first();
        if($search->attribute3==null){
        $delete=PphTidakFinal::find($id);
        $delete->delete();
        }
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
