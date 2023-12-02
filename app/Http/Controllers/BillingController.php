<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Billing;
use App\Models\Ebupot;
use App\Models\HutangPpn;
use App\Models\Pphfinal;
use App\Models\PphTidakFinal;
use App\Models\JenisPajak;
use App\Models\KodeJenisSetoran;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\PphBadanTahunan;
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
        // if(Auth::user()->status==1){

        //     $billing=Billing::get();
        // }else{
            $billing=Billing::where('attribute1',$id)->get();

        // }
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
        $kjs=KodeJenisSetoran::all();
        $jenispajak=JenisPajak::all();
        $trxpph21=TransaksiPphDuapuluhSatu::orderBy('id','DESC')->whereNotNull('trx')->where('attribute1',$id)->where('attribute3',null)->get();
        $trx=Ebupot::orderBy('id','DESC')->whereNotNull('trx')->where('attribute1',$id)->where('attribute3',null)->get();
        $trxppn=HutangPpn::orderBy('id','DESC')->where('attribute1',$id)->where('attribute3',null)->get();
        $trxpphfinal=Pphfinal::orderBy('id','DESC')->whereNotNull('transaksi')->where('attribute1',$id)->where('attribute3',null)->get();
        $trxpphtidakfinal=PphTidakFinal::orderBy('id','DESC')->where('attribute1',$id)->where('attribute3',null)->get();
        $trxpphtahunan=PphBadanTahunan::orderBy('id','DESC')->where('attribute1',$id)->where('attribute3',null)->get();
        // dd($trx);
        return view('billing.create',compact('trxpphtahunan','trxpph21','kjs','jenispajak','vendor','trx','trxppn','trxpphfinal','trxpphtidakfinal'));
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

        $end_periode_pajak = Carbon::parse($request->start_periode_pajak);
        if($request->trx_wan==1){
            if($request->trx==null){
                return back();
            }
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
                'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
                'jenis_transaksi'=>$request->trx_wan,
                'attribute1'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $ebupot=Ebupot::where('id',$request->trx)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
            $billing=Billing::create($data);

        }elseif($request->trx_wan==2){

            if($request->trx_ppn==null){
                return back();
            }
            $data = array(
                'kode_billing'=>$header_id,
                'npwp'=>$request->npwp,
                'trx_bupot'=>$request->trx_ppn,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'jenis_pajak'=>$request->jenis_pajak,
                'kode_jenis_setoran'=>$request->kode_jenis_setoran,
                'masa_pajak'=>$request->masa_pajak,
                'tahun_pajak'=>date('Y'),
                'start_periode_pajak'=>$request->start_periode_pajak,
                'end_periode_pajak'=>$end_periode_pajak->addDays(30),
                'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
                'jenis_transaksi'=>$request->trx_wan,
                'attribute1'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $ebupot=HutangPpn::where('id',$request->trx_ppn)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
            $billing=Billing::create($data);

        }elseif($request->trx_wan==3){

            if($request->trx_pphfinal==null){
                return back();
            }
            $data = array(
                'kode_billing'=>$header_id,
                'npwp'=>$request->npwp,
                'trx_bupot'=>$request->trx_pphfinal,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'jenis_pajak'=>$request->jenis_pajak,
                'kode_jenis_setoran'=>$request->kode_jenis_setoran,
                'masa_pajak'=>$request->masa_pajak,
                'tahun_pajak'=>date('Y'),
                'start_periode_pajak'=>$request->start_periode_pajak,
                'end_periode_pajak'=>$end_periode_pajak->addDays(30),
                'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
                'jenis_transaksi'=>$request->trx_wan,
                'attribute1'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $ebupot=Pphfinal::where('id',$request->trx_pphfinal)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
            $billing=Billing::create($data);

        }elseif($request->trx_wan==4){

            if($request->trx_pphtidakfinal==null){
                return back();
            }
            $data = array(
                'kode_billing'=>$header_id,
                'npwp'=>$request->npwp,
                'trx_bupot'=>$request->trx_pphtidakfinal,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'jenis_pajak'=>$request->jenis_pajak,
                'kode_jenis_setoran'=>$request->kode_jenis_setoran,
                'masa_pajak'=>$request->masa_pajak,
                'tahun_pajak'=>date('Y'),
                'start_periode_pajak'=>$request->start_periode_pajak,
                'end_periode_pajak'=>$end_periode_pajak->addDays(30),
                'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
                'jenis_transaksi'=>$request->trx_wan,
                'attribute1'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $billing=Billing::create($data);
            $ebupot=PphTidakFinal::where('id',$request->trx_pphtidakfinal)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);

        }
        elseif($request->trx_wan==5){

            if($request->trx_pph21==null){
                return back();
            }
           
            $data = array(
                'kode_billing'=>$header_id,
                'npwp'=>$request->npwp,
                'trx_bupot'=>$request->trx_pph21,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'jenis_pajak'=>$request->jenis_pajak,
                'kode_jenis_setoran'=>$request->kode_jenis_setoran,
                'masa_pajak'=>$request->masa_pajak,
                'tahun_pajak'=>date('Y'),
                'start_periode_pajak'=>$request->start_periode_pajak,
                'end_periode_pajak'=>$end_periode_pajak->addDays(30),
                'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
                'jenis_transaksi'=>$request->trx_wan,
                'attribute1'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $billing=Billing::create($data);
            $ebupot=TransaksiPphDuapuluhSatu::where('id',$request->trx_pph21)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);

        }
        elseif($request->trx_wan==6){

            if($request->trx_pphtahunan==null){
                return back();
            }
           
            $data = array(
                'kode_billing'=>$header_id,
                'npwp'=>$request->npwp,
                'trx_bupot'=>$request->trx_pphtahunan,
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'jenis_pajak'=>$request->jenis_pajak,
                'kode_jenis_setoran'=>$request->kode_jenis_setoran,
                'masa_pajak'=>$request->masa_pajak,
                'tahun_pajak'=>date('Y'),
                'start_periode_pajak'=>$request->start_periode_pajak,
                'end_periode_pajak'=>$end_periode_pajak->addDays(30),
                'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
                'jenis_transaksi'=>$request->trx_wan,
                'attribute1'=>Auth::user()->id,
                'created_at'=>date('Y-m-d H:i:s'),
            );
            $billing=Billing::create($data);
            $ebupot=PphBadanTahunan::where('id',$request->trx_pphtahunan)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);

        }else{
            return back();
        }
        
        // DD($data);
        // dd($billing->id);
        $a= \DB::commit();
        // return redirect()->route('billing/show',['id'=>$billing->id]);
        return redirect()->route('billing');

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
        $kjs=KodeJenisSetoran::all();
        $jenispajak=JenisPajak::all();
        $vendor=Vendor::all();
        $iduser=Auth::user()->id;
        $billing = Billing::where('id',$id)->where('attribute1',$iduser)->get()->first();
        // dd($billing);
        if($billing==null){
            return back();
        }else{
            return view('billing.edit',compact('kjs','jenispajak','billing','vendor'));
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
            'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah),
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
        return redirect()->route('billing');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search=Billing::where('id',$id)->get()->first();
        if($search->attribute3==null){
            Billing::where('id',$id)->update([
                'attribute2'=>Auth::user()->id,
                'deleted_at'=>date('Y-m-d H:i:s'),
            ]);
        }
       
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
