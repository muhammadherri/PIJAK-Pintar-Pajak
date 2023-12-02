<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PphBadanTahunan;
use Illuminate\Support\Facades\Auth;

class PphbadantahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pphbadantahunan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pphbadantahunan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        if($request->pph_terutang==0){
            return back();
        }
        $header_id =PphBadanTahunan::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRX'.'0'.$header_id.$date.'25/29';
        $data = array(
            'trx'=>$trx,
            'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->dasar_pengenaan_pajak),
            'pph_terutang'=>preg_replace('/[^0-9]/','',$request->pph_terutang),
            'mendapat_fasilitas'=>preg_replace('/[^0-9]/','',$request->mendapat_fasilitas),
            'tidak_mendapat_fasilitas'=>preg_replace('/[^0-9]/','',$request->tidak_mendapat_fasilitas),
            'dpp'=>preg_replace('/[^0-9]/','',$request->hasildpp),
            'jumlah_pph_terutang'=>preg_replace('/[^0-9]/','',$request->jumlahpph),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data);
        PphBadanTahunan::create($data);
        $a= \DB::commit();
        return redirect()->route('pphbadantahunan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iduser = Auth::user()->id;
        $pph=PphBadanTahunan::where('attribute1',$iduser)->where('id',$id)->get()->first();
        return view('pphbadantahunan.show',compact('pph'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::user()->id;
        $pph=PphBadanTahunan::where('attribute1',$iduser)->where('id',$id)->get()->first();
        return view('pphbadantahunan.edit',compact('pph'));
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
        if($request->pph_terutang==0){
            return back();
        }elseif($request->pph_terutang==1){
            $data = array(
                'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->dasar_pengenaan_pajak),
                'pph_terutang'=>preg_replace('/[^0-9]/','',$request->pph_terutang),
                'mendapat_fasilitas'=>preg_replace('/[^0-9]/','',$request->mendapat_fasilitas),
                'tidak_mendapat_fasilitas'=>preg_replace('/[^0-9]/','',$request->tidak_mendapat_fasilitas),
                'dpp'=>0,
                'jumlah_pph_terutang'=>preg_replace('/[^0-9]/','',$request->jumlahpph),
                'attribute2'=>Auth::user()->id,
            );
            // dd($data);
            PphBadanTahunan::where('id',$id)->update($data);
            $a= \DB::commit();
            return redirect()->route('pphbadantahunan');
            
        }else{
            $data = array(
                'dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->dasar_pengenaan_pajak),
                'pph_terutang'=>preg_replace('/[^0-9]/','',$request->pph_terutang),
                'mendapat_fasilitas'=>0,
                'tidak_mendapat_fasilitas'=>0,
                'dpp'=>preg_replace('/[^0-9]/','',$request->hasildpp),
                'jumlah_pph_terutang'=>preg_replace('/[^0-9]/','',$request->jumlahpph),
                'attribute2'=>Auth::user()->id,
            );
            // dd($data);
            PphBadanTahunan::where('id',$id)->update($data);
            $a= \DB::commit();
            return redirect()->route('pphbadantahunan');
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
        $search=PphBadanTahunan::where('id',$id)->get()->first();
        if($search->attribute3==null){
            $delete=PphBadanTahunan::find($id);
            $delete->delete();
        }
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
