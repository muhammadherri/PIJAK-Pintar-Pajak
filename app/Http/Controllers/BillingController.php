<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Billing;
use App\Models\Ebupot;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class BillingController extends Controller
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

            $billing=Billing::get();
        }else{
            $billing=Billing::where('attribute1',$id)->get();

        }
        // dd($billing);
        return view('billing.index',compact('billing'))->with('no',1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Auth::user()->id;

        $vendor=Vendor::all();
        $trx=Ebupot::whereNotNull('trx')->where('id',$id)->where('attribute3','NULL')->get();
        // dd($trx);
        return view('billing.create',compact('vendor','trx'));
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
        if($request->trx==null){
            return back();
        }
        $end_periode_pajak = Carbon::parse($request->start_periode_pajak);

        $data = array(
            'kode_billing'=>$header_id,
            'npwp'=>$request->npwp,
            'trx_bupot'=>$request->trx,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'jenis_pajak'=>$request->jenis_pajak,
            'kode_jenis_setoran'=>$request->kode_jenis_setoran,
            'masa_pajak'=>$request->masa_pajak,
            'tahun_pajak'=>date('Y'),
            'start_periode_pajak'=>$request->start_periode_pajak,
            'end_periode_pajak'=>$end_periode_pajak->addDays(30),
            'jumlah'=>$request->jumlah,
            'keterangan'=>$request->keterangan,
            'npwp_penyetor'=>$request->npwp_penyetor,
            'nama_penyetor'=>$request->nama_penyetor,
            'no_ref'=>$request->no_ref,
            'no_rek'=>$request->no_rek,
            'perusahaan'=>$request->no_rek,
            'akun'=>$request->akun,
            'no_sk'=>$request->no_sk,
            'nop'=>$request->nop,
            'ntpn'=>$request->ntpn,
            'ntb'=>$request->ntb,
            'stan'=>$request->stan,
            'jenis_pembayaran'=>$request->jenis_pembayaran,
            'attribute1'=>Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
        );
        $ebupot=Ebupot::where('id',$request->trx)->update([
            'attribute2'=>Auth::user()->id,
            'attribute3'=>1,
        ]);
        // DD($data);
        $billing=Billing::create($data);
        // dd($billing->id);
        $a= \DB::commit();
        return redirect()->route('billing/show',['id'=>$billing->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor=Vendor::all();
        $iduser=Auth::user()->id;
        $data =[
            'title' =>'STRUK BUKTI KODE PEMBAYARAN',
            'image_path'=>public_path('images/direktorat_pajak.png'),
        ];
        if(Auth::user()->status==1){

            $billing = Billing::where('id',$id)->get()->first();
        }else{

            $billing = Billing::where('attribute1',$iduser)->where('id',$id)->get()->first();
        }
        if($billing==null){
            return back();
        }
       $pdf = PDF::loadView('pdf.billingPdf',$data,compact('billing'));
       return $pdf->stream('dokumen.pdf'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor=Vendor::all();
        $iduser=Auth::user()->id;
        $billing = Billing::where('id',$id)->where('attribute1',$iduser)->get()->first();
        // dd($billing);
        if($billing==null){
            return back();
        }else{
            return view('billing.edit',compact('billing','vendor'));
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
        $end_periode_pajak = Carbon::parse($request->start_periode_pajak);
        Billing::where('id',$id)->update([
            'npwp'=>$request->npwp,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'jenis_pajak'=>$request->jenis_pajak,
            'kode_jenis_setoran'=>$request->kode_jenis_setoran,
            'masa_pajak'=>$request->masa_pajak,
            'tahun_pajak'=>date('Y'),
            'start_periode_pajak'=>$request->start_periode_pajak,
            'end_periode_pajak'=>$end_periode_pajak->addDays(30),
            'jumlah'=>$request->jumlah,
            'keterangan'=>$request->keterangan,
            'npwp_penyetor'=>$request->npwp_penyetor,
            'nama_penyetor'=>$request->nama_penyetor,
            'no_ref'=>$request->no_ref,
            'no_rek'=>$request->no_rek,
            'perusahaan'=>$request->no_rek,
            'akun'=>$request->akun,
            'no_sk'=>$request->no_sk,
            'nop'=>$request->nop,
            'ntpn'=>$request->ntpn,
            'ntb'=>$request->ntb,
            'stan'=>$request->stan,
            'jenis_pembayaran'=>$request->jenis_pembayaran,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
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
