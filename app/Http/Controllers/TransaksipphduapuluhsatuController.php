<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\Ptkp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksipphduapuluhsatuController extends Controller
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
            $pph21 = TransaksiPphDuapuluhSatu::get();
        }else{
            $pph21 = TransaksiPphDuapuluhSatu::where('attribute1',$id)->get();
        }
        return view('transaksiduapuluhsatu.index',compact('pph21'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptkp=Ptkp::all();
        $status_pernikahan=Ptkp::select('status_pernikahan','kode_ptkp')->groupBy('status_pernikahan','kode_ptkp')->get();
        $tanggungan=Ptkp::select('tanggungan')->groupBy('tanggungan')->get();

        return view('transaksiduapuluhsatu.create',compact('ptkp','status_pernikahan','tanggungan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =TransaksiPphDuapuluhSatu::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRXPPh'.'0'.$header_id.$date;
        // dd($request);
        $data = array(
            'status_npwp'=>$request->npwp,
            'nama_wajib_pajak'=>$request->input_wajib_pajak,
            'no_npwp'=>$request->no_npwp,
            'status_pernikahan'=>$request->status_pernikahan,
            'tanggungan'=>$request->tanggungan,
            'masa_penghasilan_start'=>$request->masa_penghasilan,
            'masa_penghasilan_end'=>$request->masa_penghasilan_end,
            'tunjangan_pajak'=>$request->gross,
            'ketentuan_ptkp'=>$request->ketentuan_ptkp,
            'ketentuan_tarif'=>$request->ketentuan_tarif,
            'gaji_pensiun'=>preg_replace('/[^0-9]/','',$request->gajidanpensiun),
            'tunjangan_pph'=>preg_replace('/[^0-9]/','',$request->tunjangan_pph),
            'tunjangan_lain'=>preg_replace('/[^0-9]/','',$request->tunjanganlain),
            'honorarium'=>preg_replace('/[^0-9]/','',$request->honorarium),
            'premi_asuransi'=>preg_replace('/[^0-9]/','',$request->premi_asuransi),
            'natura'=>preg_replace('/[^0-9]/','',$request->natura),
            'tantiem'=>preg_replace('/[^0-9]/','',$request->tantiem),
            'penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->penghasilan_bruto),
            'biaya_jabatan'=>preg_replace('/[^0-9]/','',$request->biaya_jabatan),
            'tht_jht'=>preg_replace('/[^0-9]/','',$request->iuran_pensiun),
            'total_pengurangan'=>preg_replace('/[^0-9]/','',$request->total_pengurang),
            'penghasilan_netto'=>preg_replace('/[^0-9]/','',$request->penghasilan_netto),
            'netto_massa'=>preg_replace('/[^0-9]/','',$request->penghasilan_netto_ms),
            'netto_setahun'=>preg_replace('/[^0-9]/','',$request->netto_pertahun),
            'ptkp'=>preg_replace('/[^0-9]/','',$request->pilih_ptkp),
            'pkp'=>preg_replace('/[^0-9]/','',$request->input_pkp),
            'masukan_tarif1'=>preg_replace('/[^0-9]/','',$request->potongantarif1),
            'masukan_tarif2'=>preg_replace('/[^0-9]/','',$request->potongantarif2),
            'masukan_tarif3'=>preg_replace('/[^0-9]/','',$request->potongantarif3),
            'masukan_tarif4'=>preg_replace('/[^0-9]/','',$request->potongantarif4),
            'pkp1'=>preg_replace('/[^0-9]/','',$request->tarif1),
            'pkp2'=>preg_replace('/[^0-9]/','',$request->tarif2),
            'pkp3'=>preg_replace('/[^0-9]/','',$request->tarif3),
            'pkp4'=>preg_replace('/[^0-9]/','',$request->tarif4),
            'tarif1'=>preg_replace('/[^0-9]/','',$request->totaltarif1),
            'tarif2'=>preg_replace('/[^0-9]/','',$request->totaltarif2),
            'tarif3'=>preg_replace('/[^0-9]/','',$request->totaltarif3),
            'tarif4'=>preg_replace('/[^0-9]/','',$request->totaltarif4),
            'pph21ataspkp'=>preg_replace('/[^0-9]/','',$request->jumlahtotal),
            'pph21_dipotong_sebelumnya'=>preg_replace('/[^0-9]/','',$request->pph21potongan),
            'pph21_terutang'=>preg_replace('/[^0-9]/','',$request->pph21terutang),
            'attribute1'=>Auth::user()->id,
            'attribute2'=>NULL,
            'attribute3'=>NULL,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        // dd($data);
        $tf=TransaksiPphDuapuluhSatu::create($data);
        $a= \DB::commit();
        
        return redirect()->route('transaksipph21');

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
            $pph21 = TransaksiPphDuapuluhSatu::where('id',$id)->get()->first();
        }else{
            $pph21 = TransaksiPphDuapuluhSatu::where('id',$id)->where('attribute1',$iduser)->get()->first();
        }
        $ptkp=Ptkp::all();
        $status_pernikahan=Ptkp::select('status_pernikahan','kode_ptkp')->groupBy('status_pernikahan','kode_ptkp')->get();
        $tanggungan=Ptkp::select('tanggungan')->groupBy('tanggungan')->get();
        
        if($pph21==null)
        {
            return back();
        }   else{
            return view('transaksiduapuluhsatu.show',compact('pph21','ptkp','status_pernikahan','tanggungan'));
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
        if(Auth::user()->status==1){
            $pph21 = TransaksiPphDuapuluhSatu::where('id',$id)->get()->first();
        }else{
            $pph21 = TransaksiPphDuapuluhSatu::where('id',$id)->where('attribute1',$iduser)->get()->first();
        }        
        $ptkp=Ptkp::all();
        $status_pernikahan=Ptkp::select('status_pernikahan','kode_ptkp')->groupBy('status_pernikahan','kode_ptkp')->get();
        $tanggungan=Ptkp::select('tanggungan')->groupBy('tanggungan')->get();
        if($pph21==null)
        {
            return back();
        }else{
            return view('transaksiduapuluhsatu.edit',compact('pph21','ptkp','status_pernikahan','tanggungan'));
        }
    }

    public function update(Request $request, $id)
    {
            $tes=TransaksiPphDuapuluhSatu::where('id',$id)->update([
                'status_npwp'=>$request->npwp,
                'nama_wajib_pajak'=>$request->input_wajib_pajak,
                'no_npwp'=>$request->no_npwp,
                'status_pernikahan'=>$request->status_pernikahan,
                'tanggungan'=>$request->tanggungan,
                'masa_penghasilan_start'=>$request->masa_penghasilan,
                'masa_penghasilan_end'=>$request->masa_penghasilan_end,
                'tunjangan_pajak'=>$request->gross,
                'ketentuan_ptkp'=>$request->ketentuan_ptkp,
                'ketentuan_tarif'=>$request->ketentuan_tarif,
                'gaji_pensiun'=>preg_replace('/[^0-9]/','',$request->gajidanpensiun),
                'tunjangan_pph'=>preg_replace('/[^0-9]/','',$request->tunjangan_pph),
                'tunjangan_lain'=>preg_replace('/[^0-9]/','',$request->tunjanganlain),
                'honorarium'=>preg_replace('/[^0-9]/','',$request->honorarium),
                'premi_asuransi'=>preg_replace('/[^0-9]/','',$request->premi_asuransi),
                'natura'=>preg_replace('/[^0-9]/','',$request->natura),
                'tantiem'=>preg_replace('/[^0-9]/','',$request->tantiem),
                'penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->penghasilan_bruto),
                'biaya_jabatan'=>preg_replace('/[^0-9]/','',$request->biaya_jabatan),
                'tht_jht'=>preg_replace('/[^0-9]/','',$request->iuran_pensiun),
                'total_pengurangan'=>preg_replace('/[^0-9]/','',$request->total_pengurang),
                'penghasilan_netto'=>preg_replace('/[^0-9]/','',$request->penghasilan_netto),
                'netto_massa'=>preg_replace('/[^0-9]/','',$request->penghasilan_netto_ms),
                'netto_setahun'=>preg_replace('/[^0-9]/','',$request->netto_pertahun),
                'ptkp'=>preg_replace('/[^0-9]/','',$request->pilih_ptkp),
                'pkp'=>preg_replace('/[^0-9]/','',$request->input_pkp),
                'masukan_tarif1'=>preg_replace('/[^0-9]/','',$request->potongantarif1),
                'masukan_tarif2'=>preg_replace('/[^0-9]/','',$request->potongantarif2),
                'masukan_tarif3'=>preg_replace('/[^0-9]/','',$request->potongantarif3),
                'masukan_tarif4'=>preg_replace('/[^0-9]/','',$request->potongantarif4),
                'pkp1'=>preg_replace('/[^0-9]/','',$request->tarif1),
                'pkp2'=>preg_replace('/[^0-9]/','',$request->tarif2),
                'pkp3'=>preg_replace('/[^0-9]/','',$request->tarif3),
                'pkp4'=>preg_replace('/[^0-9]/','',$request->tarif4),
                'tarif1'=>preg_replace('/[^0-9]/','',$request->totaltarif1),
                'tarif2'=>preg_replace('/[^0-9]/','',$request->totaltarif2),
                'tarif3'=>preg_replace('/[^0-9]/','',$request->totaltarif3),
                'tarif4'=>preg_replace('/[^0-9]/','',$request->totaltarif4),
                'pph21ataspkp'=>preg_replace('/[^0-9]/','',$request->jumlahtotal),
                'pph21_dipotong_sebelumnya'=>preg_replace('/[^0-9]/','',$request->pph21potongan),
                'pph21_terutang'=>preg_replace('/[^0-9]/','',$request->pph21terutang),
                'attribute2'=>Auth::user()->id,
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
            // dd($tes);
            $a= \DB::commit();    
     
        return redirect()->route('transaksipph21');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=TransaksiPphDuapuluhSatu::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
