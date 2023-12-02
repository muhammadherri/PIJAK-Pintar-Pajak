<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Ebupot;
use App\Models\Neraca;
use App\Models\HutangPpn;
use App\Models\JurnalManual;
use App\Models\Pphfinal;
use App\Models\PphTidakFinal;
use App\Models\LatihanKeuangan;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\PphBadanTahunan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;
class PDFController extends Controller
{
    public function pembarayanPDF(Request $request){
        $id=Auth::user()->id;
        $idbilling = $request->id_billing;
        $data =[
            'title' =>'STRUK BUKTI KODE PEMBAYARAN',
            'image_path'=>public_path('images/direktorat_pajak.png'),
        ];
        $billing = Billing::where('attribute1',$id)->where('kode_billing',$idbilling)->get()->first();
        if($billing==null){
            return back()->with('msg', 'Kode Billing Tidak Ditemukan');
        }
        if($billing->jenis_transaksi==1){
            $ebupot=Ebupot::where('id',$billing->trx_bupot)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>2,
            ]);
            $billingupdate = Billing::where('kode_billing',$idbilling)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
        }elseif($billing->jenis_transaksi==2){
            $ebupot=HutangPpn::where('id',$billing->trx_bupot)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>2,
            ]);
            $billingupdate = Billing::where('kode_billing',$idbilling)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
        }
        elseif($billing->jenis_transaksi==3){
            // dd('hutang');
            $ebupot=Pphfinal::where('id',$billing->trx_bupot)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>2,
            ]);
            $billingupdate = Billing::where('kode_billing',$idbilling)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
        }elseif($billing->jenis_transaksi==4){
            $ebupot=PphTidakFinal::where('id',$billing->trx_bupot)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>2,
            ]);
            $billingupdate = Billing::where('kode_billing',$idbilling)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
        }elseif($billing->jenis_transaksi==5){
            $ebupot=TransaksiPphDuapuluhSatu::where('id',$billing->trx_bupot)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>2,
            ]);
            $billingupdate = Billing::where('kode_billing',$idbilling)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
        }elseif($billing->jenis_transaksi==6){
            $ebupot=PphBadanTahunan::where('id',$billing->trx_bupot)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>2,
            ]);
            $billingupdate = Billing::where('kode_billing',$idbilling)->update([
                'attribute2'=>Auth::user()->id,
                'attribute3'=>1,
            ]);
        }else{
            return back();
        }
        // }
        if($billing==null){
            // Session::flash('success','Data Yang Dicari Salah');
            return back();
        }
      
        // dd($billing);
        $pdf = PDF::loadView('pdf.pembayaranPdf',$data,compact('billing'));
        return $pdf->stream('dokumen.pdf'); 
    }
    public function labarugifiskalPDF(Request $request){
        $id=Auth::user()->id;

        // 4100
        $asetlancar4100=Neraca::whereNot('saldo',0)->where('no_akun','4100')->get();
        $debit4100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4100')->sum('nilai_debit');
        $kredit4100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4100')->sum('nilai_kredit');
        $saldo4100=Neraca::whereNot('saldo',0)->where('no_akun','4100')->get()->first();
        if($saldo4100==null){
            $fiskal4100=0;
        }else{
            $fiskal4100=$saldo4100->saldo+$debit4100-$kredit4100;
        }
        // 4100
         // 4101
         $asetlancar4101=Neraca::whereNot('saldo',0)->where('no_akun','4101')->get();
         $debit4101=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4101')->sum('nilai_debit');
         $kredit4101=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4101')->sum('nilai_kredit');
         $saldo4101=Neraca::whereNot('saldo',0)->where('no_akun','4101')->get()->first();
        if($saldo4101==null){
            $fiskal4101=0;
        }else{
            $fiskal4101=$saldo4101->saldo + $debit4101 - $kredit4101;
        }
         // 4101
        // 4102
        $asetlancar4102=Neraca::whereNot('saldo',0)->where('no_akun','4102')->get();
        $debit4102=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4102')->sum('nilai_debit');
        $kredit4102=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4102')->sum('nilai_kredit');
        $saldo4102=Neraca::whereNot('saldo',0)->where('no_akun','4102')->get()->first();
        if($saldo4102==null){
            $fiskal4102=0;
        }else{
           $fiskal4102=$saldo4102->saldo + $debit4102 - $kredit4102;
        }
        // 4102
        // 4103
        $asetlancar4103=Neraca::whereNot('saldo',0)->where('no_akun','4103')->get();
        $debit4103=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4103')->sum('nilai_debit');
        $kredit4103=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4103')->sum('nilai_kredit');
        $saldo4103=Neraca::whereNot('saldo',0)->where('no_akun','4103')->get()->first();
		if($saldo4103==null){
            $fiskal4103=0;
        }else{
           $fiskal4103=$saldo4103->saldo + $debit4103 - $kredit4103;
        }

        // 4103
        // 4104
        $asetlancar4104=Neraca::whereNot('saldo',0)->where('no_akun','4104')->get();
        $debit4104=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4104')->sum('nilai_debit');
        $kredit4104=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4104')->sum('nilai_kredit');
        $saldo4104=Neraca::whereNot('saldo',0)->where('no_akun','4104')->get()->first();
        if($saldo4104==null){
            $fiskal4104=0;
        }else{
           $fiskal4104=$saldo4104->saldo + $debit4104 - $kredit4104;
        }
        // 4104

        // 4200
        $asetlancar4200=Neraca::whereNot('saldo',0)->where('no_akun','4200')->get();
        $debit4200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4200')->sum('nilai_debit');
        $kredit4200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4200')->sum('nilai_kredit');
        $saldo4200=Neraca::whereNot('saldo',0)->where('no_akun','4200')->get()->first();
        if($saldo4200==null){
            $fiskal4200=0;
        }else{
           $fiskal4200=$saldo4200->saldo + $debit4200 - $kredit4200;
        } 
        // 4200
        // 4201
        $asetlancar4201=Neraca::whereNot('saldo',0)->where('no_akun','4201')->get();
        $debit4201=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4201')->sum('nilai_debit');
        $kredit4201=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4201')->sum('nilai_kredit');
        $saldo4201=Neraca::whereNot('saldo',0)->where('no_akun','4201')->get()->first();
        if($saldo4201==null){
            $fiskal4201=0;
        }else{
           $fiskal4201=$saldo4201->saldo + $debit4201 - $kredit4201;
        }
        // 4201

        // 4202
        $asetlancar4202=Neraca::whereNot('saldo',0)->where('no_akun','4202')->get();
        $debit4202=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4202')->sum('nilai_debit');
        $kredit4202=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4202')->sum('nilai_kredit');
        $saldo4202=Neraca::whereNot('saldo',0)->where('no_akun','4202')->get()->first();
        if($saldo4202==null){
            $fiskal4202=0;
        }else{
           $fiskal4202=$saldo4202->saldo + $debit4202 - $kredit4202;
        }        
        // 4202

        // 4203
        $asetlancar4203=Neraca::whereNot('saldo',0)->where('no_akun','4203')->get();
        $debit4203=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4203')->sum('nilai_debit');
        $kredit4203=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4203')->sum('nilai_kredit');
        $saldo4203=Neraca::whereNot('saldo',0)->where('no_akun','4203')->get()->first();
        if($saldo4203==null){
            $fiskal4203=0;
        }else{
           $fiskal4203=$saldo4203->saldo + $debit4203 - $kredit4203;
        }        
        // 4203

        // 4300
        $asetlancar4300=Neraca::whereNot('saldo',0)->where('no_akun','4300')->get();
        $debit4300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4300')->sum('nilai_debit');
        $kredit4300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4300')->sum('nilai_kredit');
        $saldo4300=Neraca::whereNot('saldo',0)->where('no_akun','4300')->get()->first();
        if($saldo4300==null){
            $fiskal4300=0;
        }else{
           $fiskal4300=$saldo4300->saldo + $debit4300 - $kredit4300;
        }        
        // 4300

        // 4310
        $asetlancar4310=Neraca::whereNot('saldo',0)->where('no_akun','4310')->get();
        $debit4310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4310')->sum('nilai_debit');
        $kredit4310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4310')->sum('nilai_kredit');
        $saldo4310=Neraca::whereNot('saldo',0)->where('no_akun','4310')->get()->first();
		if($saldo4310==null){
            $fiskal4310=0;
        }else{
           $fiskal4310=$saldo4310->saldo + $debit4310 - $kredit4310;
        }        
        // 4310

        // 4320
        $asetlancar4320=Neraca::whereNot('saldo',0)->where('no_akun','4320')->get();
        $debit4320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4320')->sum('nilai_debit');
        $kredit4320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4320')->sum('nilai_kredit');
        $saldo4320=Neraca::whereNot('saldo',0)->where('no_akun','4320')->get()->first();
        if($saldo4320==null){
            $fiskal4320=0;
        }else{
           $fiskal4320=$saldo4320->saldo + $debit4320 - $kredit4320;
        }                
        // 4320

        // 4330
        $asetlancar4330=Neraca::whereNot('saldo',0)->where('no_akun','4330')->get();
        $debit4330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4330')->sum('nilai_debit');
        $kredit4330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4330')->sum('nilai_kredit');
        $saldo4330=Neraca::whereNot('saldo',0)->where('no_akun','4330')->get()->first();
        if($saldo4330==null){
            $fiskal4330=0;
        }else{
           $fiskal4330=$saldo4330->saldo + $debit4330 - $kredit4330;
        }                
        // 4330

        // 4340
        $asetlancar4340=Neraca::whereNot('saldo',0)->where('no_akun','4340')->get();
        $debit4340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4340')->sum('nilai_debit');
        $kredit4340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4340')->sum('nilai_kredit');
        $saldo4340=Neraca::whereNot('saldo',0)->where('no_akun','4340')->get()->first();
        if($saldo4340==null){
            $fiskal4340=0;
        }else{
           $fiskal4340=$saldo4340->saldo + $debit4340 - $kredit4340;
        }                
        // 4340

        // 4350
        $asetlancar4350=Neraca::whereNot('saldo',0)->where('no_akun','4350')->get();
        $debit4350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4350')->sum('nilai_debit');
        $kredit4350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4350')->sum('nilai_kredit');
        $saldo4350=Neraca::whereNot('saldo',0)->where('no_akun','4350')->get()->first();
        if($saldo4350==null){
            $fiskal4350=0;
        }else{
           $fiskal4350=$saldo4350->saldo + $debit4350 - $kredit4350;
        }                
        // 4350

        // 4105
        $asetlancar4105=Neraca::whereNot('saldo',0)->where('no_akun','4105')->get();
        $debit4105=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4105')->sum('nilai_debit');
        $kredit4105=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4105')->sum('nilai_kredit');
        $saldo4105=Neraca::whereNot('saldo',0)->where('no_akun','4105')->get()->first();
        if($saldo4105==null){
            $fiskal4105=0;
        }else{
           $fiskal4105=$saldo4105->saldo + $debit4105 - $kredit4105;
        }                
        // 4105

        // 5100
        $asetlancar5100=Neraca::whereNot('saldo',0)->where('no_akun','5100')->get();
        $debit5100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5100')->sum('nilai_debit');
        $kredit5100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5100')->sum('nilai_kredit');
        $saldo5100=Neraca::whereNot('saldo',0)->where('no_akun','5100')->get()->first();
        if($saldo5100==null){
            $fiskal5100=0;
        }else{
           $fiskal5100=$saldo5100->saldo - $debit5100 + $kredit5100;
        }        
        // 5100

        // 5110
        $asetlancar5110=Neraca::whereNot('saldo',0)->where('no_akun','5110')->get();
        $debit5110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5110')->sum('nilai_debit');
        $kredit5110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5110')->sum('nilai_kredit');
        $saldo5110=Neraca::whereNot('saldo',0)->where('no_akun','5110')->get()->first();
        if($saldo5110==null){
            $fiskal5110=0;
        }else{
           $fiskal5110=$saldo5110->saldo - $debit5110 + $kredit5110;
        }                
        // 5110

        // 5120
        $asetlancar5120=Neraca::whereNot('saldo',0)->where('no_akun','5120')->get();
        $debit5120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5120')->sum('nilai_debit');
        $kredit5120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5120')->sum('nilai_kredit');
        $saldo5120=Neraca::whereNot('saldo',0)->where('no_akun','5120')->get()->first();
        if($saldo5120==null){
            $fiskal5120=0;
        }else{
           $fiskal5120=$saldo5120->saldo - $debit5120 + $kredit5120;
        }                
        // 5120

        // 5200
        $asetlancar5200=Neraca::whereNot('saldo',0)->where('no_akun','5200')->get();
        $debit5200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5200')->sum('nilai_debit');
        $kredit5200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5200')->sum('nilai_kredit');
        $saldo5200=Neraca::whereNot('saldo',0)->where('no_akun','5200')->get()->first();
        if($saldo5200==null){
            $fiskal5200=0;
        }else{
           $fiskal5200=$saldo5200->saldo - $debit5200 + $kredit5200;
        }                
        // 5200

        // 5210
        $asetlancar5210=Neraca::whereNot('saldo',0)->where('no_akun','5210')->get();
        $debit5210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5210')->sum('nilai_debit');
        $kredit5210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5210')->sum('nilai_kredit');
        $saldo5210=Neraca::whereNot('saldo',0)->where('no_akun','5210')->get()->first();
        if($saldo5210==null){
            $fiskal5210=0;
        }else{
           $fiskal5210=$saldo5210->saldo - $debit5210 + $kredit5210;
        }                
        // 5210

        // 5211
        $asetlancar5211=Neraca::whereNot('saldo',0)->where('no_akun','5211')->get();
        $debit5211=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5211')->sum('nilai_debit');
        $kredit5211=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5211')->sum('nilai_kredit');
        $saldo5211=Neraca::whereNot('saldo',0)->where('no_akun','5211')->get()->first();
        if($saldo5211==null){
            $fiskal5211=0;
        }else{
           $fiskal5211=$saldo5211->saldo - $debit5211 + $kredit5211;
        }        
        // 5211

        // 5212
        $asetlancar5212=Neraca::whereNot('saldo',0)->where('no_akun','5212')->get();
        $debit5212=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5212')->sum('nilai_debit');
        $kredit5212=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5212')->sum('nilai_kredit');
        $saldo5212=Neraca::whereNot('saldo',0)->where('no_akun','5212')->get()->first();
        if($saldo5212==null){
            $fiskal5212=0;
        }else{
           $fiskal5212=$saldo5212->saldo - $debit5212 + $kredit5212;
        }                
        // 5212

        // 5213
        $asetlancar5213=Neraca::whereNot('saldo',0)->where('no_akun','5213')->get();
        $debit5213=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5213')->sum('nilai_debit');
        $kredit5213=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5213')->sum('nilai_kredit');
        $saldo5213=Neraca::whereNot('saldo',0)->where('no_akun','5213')->get()->first();
        if($saldo5213==null){
            $fiskal5213=0;
        }else{
           $fiskal5213=$saldo5213->saldo - $debit5213 + $kredit5213;
        }                
        // 5213

        // 5250
        $asetlancar5250=Neraca::whereNot('saldo',0)->where('no_akun','5250')->get();
        $debit5250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5250')->sum('nilai_debit');
        $kredit5250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5250')->sum('nilai_kredit');
        $saldo5250=Neraca::whereNot('saldo',0)->where('no_akun','5250')->get()->first();
        if($saldo5250==null){
            $fiskal5250=0;
        }else{
           $fiskal5250=$saldo5250->saldo - $debit5250 + $kredit5250;
        }                
        // 5250

        // 5260
        $asetlancar5260=Neraca::whereNot('saldo',0)->where('no_akun','5260')->get();
        $debit5260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5260')->sum('nilai_debit');
        $kredit5260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5260')->sum('nilai_kredit');
        $saldo5260=Neraca::whereNot('saldo',0)->where('no_akun','5260')->get()->first();
        if($saldo5260==null){
            $fiskal5260=0;
        }else{
           $fiskal5260=$saldo5260->saldo - $debit5260 + $kredit5260;
        }                
        // 5260

        // 5300
        $asetlancar5300=Neraca::whereNot('saldo',0)->where('no_akun','5300')->get();
        $debit5300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5300')->sum('nilai_debit');
        $kredit5300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5300')->sum('nilai_kredit');
        $saldo5300=Neraca::whereNot('saldo',0)->where('no_akun','5300')->get()->first();
        if($saldo5300==null){
            $fiskal5300=0;
        }else{
           $fiskal5300=$saldo5300->saldo - $debit5300 + $kredit5300;
        }                
        // 5300

        // 5400
        $asetlancar5400=Neraca::whereNot('saldo',0)->where('no_akun','5400')->get();
        $debit5400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5400')->sum('nilai_debit');
        $kredit5400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5400')->sum('nilai_kredit');
        $saldo5400=Neraca::whereNot('saldo',0)->where('no_akun','5400')->get()->first();
        if($saldo5400==null){
            $fiskal5400=0;
        }else{
           $fiskal5400=$saldo5400->saldo - $debit5400 + $kredit5400;
        }                
        // 5400

        // 5410
        $asetlancar5410=Neraca::whereNot('saldo',0)->where('no_akun','5410')->get();
        $debit5410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5410')->sum('nilai_debit');
        $kredit5410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5410')->sum('nilai_kredit');
        $saldo5410=Neraca::whereNot('saldo',0)->where('no_akun','5410')->get()->first();
        if($saldo5410==null){
            $fiskal5410=0;
        }else{
           $fiskal5410=$saldo5410->saldo - $debit5410 + $kredit5410;
        }                
        // 5410

        // 5420
        $asetlancar5420=Neraca::whereNot('saldo',0)->where('no_akun','5420')->get();
        $debit5420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5420')->sum('nilai_debit');
        $kredit5420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5420')->sum('nilai_kredit');
        $saldo5420=Neraca::whereNot('saldo',0)->where('no_akun','5420')->get()->first();
        if($saldo5420==null){
            $fiskal5420=0;
        }else{
           $fiskal5420=$saldo5420->saldo - $debit5420 + $kredit5420;
        }                
        // 5420

        // 5430
        $asetlancar5430=Neraca::whereNot('saldo',0)->where('no_akun','5430')->get();
        $debit5430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5430')->sum('nilai_debit');
        $kredit5430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5430')->sum('nilai_kredit');
        $saldo5430=Neraca::whereNot('saldo',0)->where('no_akun','5430')->get()->first();
        if($saldo5430==null){
            $fiskal5430=0;
        }else{
           $fiskal5430=$saldo5430->saldo - $debit5430 + $kredit5430;
        }                
        // 5430

        // 5440
        $asetlancar5440=Neraca::whereNot('saldo',0)->where('no_akun','5440')->get();
        $debit5440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5440')->sum('nilai_debit');
        $kredit5440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5440')->sum('nilai_kredit');
        $saldo5440=Neraca::whereNot('saldo',0)->where('no_akun','5440')->get()->first();
        if($saldo5440==null){
            $fiskal5440=0;
        }else{
           $fiskal5440=$saldo5440->saldo - $debit5440 + $kredit5440;
        }                
        // 5440

        // 5450
        $asetlancar5450=Neraca::whereNot('saldo',0)->where('no_akun','5450')->get();
        $debit5450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5450')->sum('nilai_debit');
        $kredit5450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5450')->sum('nilai_kredit');
        $saldo5450=Neraca::whereNot('saldo',0)->where('no_akun','5450')->get()->first();
        if($saldo5450==null){
            $fiskal5450=0;
        }else{
           $fiskal5450=$saldo5450->saldo - $debit5450 + $kredit5450;
        }                
        // 5450

        // 5460
        $asetlancar5460=Neraca::whereNot('saldo',0)->where('no_akun','5460')->get();
        $debit5460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5460')->sum('nilai_debit');
        $kredit5460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5460')->sum('nilai_kredit');
        $saldo5460=Neraca::whereNot('saldo',0)->where('no_akun','5460')->get()->first();
        if($saldo5460==null){
            $fiskal5460=0;
        }else{
           $fiskal5460=$saldo5460->saldo - $debit5460 + $kredit5460;
        }                
        // 5460

        // 5470
        $asetlancar5470=Neraca::whereNot('saldo',0)->where('no_akun','5470')->get();
        $debit5470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5470')->sum('nilai_debit');
        $kredit5470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5470')->sum('nilai_kredit');
        $saldo5470=Neraca::whereNot('saldo',0)->where('no_akun','5470')->get()->first();
        if($saldo5470==null){
            $fiskal5470=0;
        }else{
           $fiskal5470=$saldo5470->saldo - $debit5470 + $kredit5470;
        }                
        // 5470

        // 5480
        $asetlancar5480=Neraca::whereNot('saldo',0)->where('no_akun','5480')->get();
        $debit5480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5480')->sum('nilai_debit');
        $kredit5480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5480')->sum('nilai_kredit');
        $saldo5480=Neraca::whereNot('saldo',0)->where('no_akun','5480')->get()->first();
        if($saldo5480==null){
            $fiskal5480=0;
        }else{
           $fiskal5480=$saldo5480->saldo - $debit5480 + $kredit5480;
        }                
        // 5480

        // 5600
        $asetlancar5600=Neraca::whereNot('saldo',0)->where('no_akun','5600')->get();
        $debit5600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5600')->sum('nilai_debit');
        $kredit5600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5600')->sum('nilai_kredit');
        $saldo5600=Neraca::whereNot('saldo',0)->where('no_akun','5600')->get()->first();
        if($saldo5600==null){
            $fiskal5600=0;
        }else{
           $fiskal5600=$saldo5600->saldo - $debit5600 + $kredit5600;
        }                
        // 5600

        // 6100
        $asetlancar6100=Neraca::whereNot('saldo',0)->where('no_akun','6100')->get();
        $debit6100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6100')->sum('nilai_debit');
        $kredit6100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6100')->sum('nilai_kredit');
        $saldo6100=Neraca::whereNot('saldo',0)->where('no_akun','6100')->get()->first();
        if($saldo6100==null){
            $fiskal6100=0;
        }else{
           $fiskal6100=$saldo6100->saldo - $debit6100 + $kredit6100;
        }                
        // 6100

        // 6110
        $asetlancar6110=Neraca::whereNot('saldo',0)->where('no_akun','6110')->get();
        $debit6110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6110')->sum('nilai_debit');
        $kredit6110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6110')->sum('nilai_kredit');
        $saldo6110=Neraca::whereNot('saldo',0)->where('no_akun','6110')->get()->first();
        if($saldo6110==null){
            $fiskal6110=0;
        }else{
           $fiskal6110=$saldo6110->saldo - $debit6110 + $kredit6110;
        }                
        // 6110

        // 6120
        $asetlancar6120=Neraca::whereNot('saldo',0)->where('no_akun','6120')->get();
        $debit6120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6120')->sum('nilai_debit');
        $kredit6120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6120')->sum('nilai_kredit');
        $saldo6120=Neraca::whereNot('saldo',0)->where('no_akun','6120')->get()->first();
        if($saldo6120==null){
            $fiskal6120=0;
        }else{
           $fiskal6120=$saldo6120->saldo - $debit6120 + $kredit6120;
        }                
        // 6120

        // 6130
        $asetlancar6130=Neraca::whereNot('saldo',0)->where('no_akun','6130')->get();
        $debit6130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6130')->sum('nilai_debit');
        $kredit6130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6130')->sum('nilai_kredit');
        $saldo6130=Neraca::whereNot('saldo',0)->where('no_akun','6130')->get()->first();
        if($saldo6130==null){
            $fiskal6130=0;
        }else{
           $fiskal6130=$saldo6130->saldo - $debit6130 + $kredit6130;
        }                
        // 6130

        // 6140
        $asetlancar6140=Neraca::whereNot('saldo',0)->where('no_akun','6140')->get();
        $debit6140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6140')->sum('nilai_debit');
        $kredit6140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6140')->sum('nilai_kredit');
        $saldo6140=Neraca::whereNot('saldo',0)->where('no_akun','6140')->get()->first();
        if($saldo6140==null){
            $fiskal6140=0;
        }else{
           $fiskal6140=$saldo6140->saldo - $debit6140 + $kredit6140;
        }                
        // 6140

        // 6150
        $asetlancar6150=Neraca::whereNot('saldo',0)->where('no_akun','6150')->get();
        $debit6150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6150')->sum('nilai_debit');
        $kredit6150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6150')->sum('nilai_kredit');
        $saldo6150=Neraca::whereNot('saldo',0)->where('no_akun','6150')->get()->first();
        if($saldo6150==null){
            $fiskal6150=0;
        }else{
           $fiskal6150=$saldo6150->saldo - $debit6150 + $kredit6150;
        }                
        // 6150

        // 6160
        $asetlancar6160=Neraca::whereNot('saldo',0)->where('no_akun','6160')->get();
        $debit6160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6160')->sum('nilai_debit');
        $kredit6160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6160')->sum('nilai_kredit');
        $saldo6160=Neraca::whereNot('saldo',0)->where('no_akun','6160')->get()->first();
        if($saldo6160==null){
            $fiskal6160=0;
        }else{
           $fiskal6160=$saldo6160->saldo - $debit6160 + $kredit6160;
        }                
        // 6160

        // 6170
        $asetlancar6170=Neraca::whereNot('saldo',0)->where('no_akun','6170')->get();
        $debit6170=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6170')->sum('nilai_debit');
        $kredit6170=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6170')->sum('nilai_kredit');
        $saldo6170=Neraca::whereNot('saldo',0)->where('no_akun','6170')->get()->first();
        if($saldo6170==null){
            $fiskal6170=0;
        }else{
           $fiskal6170=$saldo6170->saldo - $debit6170 + $kredit6170;
        }                
        // 6170

        // 6180
        $asetlancar6180=Neraca::whereNot('saldo',0)->where('no_akun','6180')->get();
        $debit6180=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6180')->sum('nilai_debit');
        $kredit6180=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6180')->sum('nilai_kredit');
        $saldo6180=Neraca::whereNot('saldo',0)->where('no_akun','6180')->get()->first();
        if($saldo6180==null){
            $fiskal6180=0;
        }else{
           $fiskal6180=$saldo6180->saldo - $debit6180 + $kredit6180;
        }                
        // 6180
        
        // 6190
        $asetlancar6190=Neraca::whereNot('saldo',0)->where('no_akun','6190')->get();
        $debit6190=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6190')->sum('nilai_debit');
        $kredit6190=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6190')->sum('nilai_kredit');
        $saldo6190=Neraca::whereNot('saldo',0)->where('no_akun','6190')->get()->first();
        if($saldo6190==null){
            $fiskal6190=0;
        }else{
           $fiskal6190=$saldo6190->saldo - $debit6190 + $kredit6190;
        }                
        // 6190
        
        // 6200
        $asetlancar6200=Neraca::whereNot('saldo',0)->where('no_akun','6200')->get();
        $debit6200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6200')->sum('nilai_debit');
        $kredit6200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6200')->sum('nilai_kredit');
        $saldo6200=Neraca::whereNot('saldo',0)->where('no_akun','6200')->get()->first();
        if($saldo6200==null){
            $fiskal6200=0;
        }else{
           $fiskal6200=$saldo6200->saldo - $debit6200 + $kredit6200;
        }                
        // 6200

        // 6210
        $asetlancar6210=Neraca::whereNot('saldo',0)->where('no_akun','6210')->get();
        $debit6210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6210')->sum('nilai_debit');
        $kredit6210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6210')->sum('nilai_kredit');
        $saldo6210=Neraca::whereNot('saldo',0)->where('no_akun','6210')->get()->first();
        if($saldo6210==null){
            $fiskal6210=0;
        }else{
           $fiskal6210=$saldo6210->saldo - $debit6210 + $kredit6210;
        }                
        // 6210

        // 6220
        $asetlancar6220=Neraca::whereNot('saldo',0)->where('no_akun','6220')->get();
        $debit6220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6220')->sum('nilai_debit');
        $kredit6220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6220')->sum('nilai_kredit');
        $saldo6220=Neraca::whereNot('saldo',0)->where('no_akun','6220')->get()->first();
        if($saldo6220==null){
            $fiskal6220=0;
        }else{
           $fiskal6220=$saldo6220->saldo - $debit6220 + $kredit6220;
        }                
        // 6220

        // 6230
        $asetlancar6230=Neraca::whereNot('saldo',0)->where('no_akun','6230')->get();
        $debit6230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6230')->sum('nilai_debit');
        $kredit6230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6230')->sum('nilai_kredit');
        $saldo6230=Neraca::whereNot('saldo',0)->where('no_akun','6230')->get()->first();
        if($saldo6230==null){
            $fiskal6230=0;
        }else{
           $fiskal6230=$saldo6230->saldo - $debit6230 + $kredit6230;
        }                
        // 6230

        // 6240
        $asetlancar6240=Neraca::whereNot('saldo',0)->where('no_akun','6240')->get();
        $debit6240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6240')->sum('nilai_debit');
        $kredit6240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6240')->sum('nilai_kredit');
        $saldo6240=Neraca::whereNot('saldo',0)->where('no_akun','6240')->get()->first();
        if($saldo6240==null){
            $fiskal6240=0;
        }else{
           $fiskal6240=$saldo6240->saldo - $debit6240 + $kredit6240;
        }                
        // 6240

        // 6250
        $asetlancar6250=Neraca::whereNot('saldo',0)->where('no_akun','6250')->get();
        $debit6250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6250')->sum('nilai_debit');
        $kredit6250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6250')->sum('nilai_kredit');
        $saldo6250=Neraca::whereNot('saldo',0)->where('no_akun','6250')->get()->first();
        if($saldo6250==null){
            $fiskal6250=0;
        }else{
           $fiskal6250=$saldo6250->saldo - $debit6250 + $kredit6250;
        }                
        // 6250

        // 6260
        $asetlancar6260=Neraca::whereNot('saldo',0)->where('no_akun','6260')->get();
        $debit6260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6260')->sum('nilai_debit');
        $kredit6260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6260')->sum('nilai_kredit');
        $saldo6260=Neraca::whereNot('saldo',0)->where('no_akun','6260')->get()->first();
        if($saldo6260==null){
            $fiskal6260=0;
        }else{
           $fiskal6260=$saldo6260->saldo - $debit6260 + $kredit6260;
        }                
        // 6260

        // 6270
        $asetlancar6270=Neraca::whereNot('saldo',0)->where('no_akun','6270')->get();
        $debit6270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6270')->sum('nilai_debit');
        $kredit6270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6270')->sum('nilai_kredit');
        $saldo6270=Neraca::whereNot('saldo',0)->where('no_akun','6270')->get()->first();
        if($saldo6270==null){
            $fiskal6270=0;
        }else{
           $fiskal6270=$saldo6270->saldo - $debit6270 + $kredit6270;
        }                
        // 6270

        // 6280
        $asetlancar6280=Neraca::whereNot('saldo',0)->where('no_akun','6280')->get();
        $debit6280=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6280')->sum('nilai_debit');
        $kredit6280=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6280')->sum('nilai_kredit');
        $saldo6280=Neraca::whereNot('saldo',0)->where('no_akun','6280')->get()->first();
        if($saldo6280==null){
            $fiskal6280=0;
        }else{
           $fiskal6280=$saldo6280->saldo - $debit6280 + $kredit6280;
        }                
        // 6280

        // 6290
        $asetlancar6290=Neraca::whereNot('saldo',0)->where('no_akun','6290')->get();
        $debit6290=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6290')->sum('nilai_debit');
        $kredit6290=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6290')->sum('nilai_kredit');
        $saldo6290=Neraca::whereNot('saldo',0)->where('no_akun','6290')->get()->first();
        if($saldo6290==null){
            $fiskal6290=0;
        }else{
           $fiskal6290=$saldo6290->saldo - $debit6290 + $kredit6290;
        }                
        // 6290

        // 6300
        $asetlancar6300=Neraca::whereNot('saldo',0)->where('no_akun','6300')->get();
        $debit6300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6300')->sum('nilai_debit');
        $kredit6300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6300')->sum('nilai_kredit');
        $saldo6300=Neraca::whereNot('saldo',0)->where('no_akun','6300')->get()->first();
        if($saldo6300==null){
            $fiskal6300=0;
        }else{
           $fiskal6300=$saldo6300->saldo - $debit6300 + $kredit6300;
        }                
        // 6300

        // 6310
        $asetlancar6310=Neraca::whereNot('saldo',0)->where('no_akun','6310')->get();
        $debit6310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6310')->sum('nilai_debit');
        $kredit6310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6310')->sum('nilai_kredit');
        $saldo6310=Neraca::whereNot('saldo',0)->where('no_akun','6310')->get()->first();
        if($saldo6310==null){
            $fiskal6310=0;
        }else{
           $fiskal6310=$saldo6310->saldo - $debit6310 + $kredit6310;
        }                
        // 6310

        // 6320
        $asetlancar6320=Neraca::whereNot('saldo',0)->where('no_akun','6320')->get();
        $debit6320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6320')->sum('nilai_debit');
        $kredit6320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6320')->sum('nilai_kredit');
        $saldo6320=Neraca::whereNot('saldo',0)->where('no_akun','6320')->get()->first();
        if($saldo6320==null){
            $fiskal6320=0;
        }else{
           $fiskal6320=$saldo6320->saldo - $debit6320 + $kredit6320;
        }                
        // 6320

        // 6330
        $asetlancar6330=Neraca::whereNot('saldo',0)->where('no_akun','6330')->get();
        $debit6330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6330')->sum('nilai_debit');
        $kredit6330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6330')->sum('nilai_kredit');
        $saldo6330=Neraca::whereNot('saldo',0)->where('no_akun','6330')->get()->first();
        if($saldo6330==null){
            $fiskal6330=0;
        }else{
           $fiskal6330=$saldo6330->saldo - $debit6330 + $kredit6330;
        }                
        // 6330

        // 6340
        $asetlancar6340=Neraca::whereNot('saldo',0)->where('no_akun','6340')->get();
        $debit6340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6340')->sum('nilai_debit');
        $kredit6340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6340')->sum('nilai_kredit');
        $saldo6340=Neraca::whereNot('saldo',0)->where('no_akun','6340')->get()->first();
        if($saldo6340==null){
            $fiskal6340=0;
        }else{
           $fiskal6340=$saldo6340->saldo - $debit6340 + $kredit6340;
        }                
        // 6340

        // 6350
        $asetlancar6350=Neraca::whereNot('saldo',0)->where('no_akun','6350')->get();
        $debit6350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6350')->sum('nilai_debit');
        $kredit6350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6350')->sum('nilai_kredit');
        $saldo6350=Neraca::whereNot('saldo',0)->where('no_akun','6350')->get()->first();
        if($saldo6350==null){
            $fiskal6350=0;
        }else{
           $fiskal6350=$saldo6350->saldo - $debit6350 + $kredit6350;
        }                
        // 6350

        // 6360
        $asetlancar6360=Neraca::whereNot('saldo',0)->where('no_akun','6360')->get();
        $debit6360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6360')->sum('nilai_debit');
        $kredit6360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6360')->sum('nilai_kredit');
        $saldo6360=Neraca::whereNot('saldo',0)->where('no_akun','6360')->get()->first();
        if($saldo6360==null){
            $fiskal6360=0;
        }else{
           $fiskal6360=$saldo6360->saldo - $debit6360 + $kredit6360;
        }                
        // 6360

        // 6370
        $asetlancar6370=Neraca::whereNot('saldo',0)->where('no_akun','6370')->get();
        $debit6370=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6370')->sum('nilai_debit');
        $kredit6370=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6370')->sum('nilai_kredit');
        $saldo6370=Neraca::whereNot('saldo',0)->where('no_akun','6370')->get()->first();
        if($saldo6370==null){
            $fiskal6370=0;
        }else{
           $fiskal6370=$saldo6370->saldo - $debit6370 + $kredit6370;
        }                
        // 6370

        // 6380
        $asetlancar6380=Neraca::whereNot('saldo',0)->where('no_akun','6380')->get();
        $debit6380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6380')->sum('nilai_debit');
        $kredit6380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6380')->sum('nilai_kredit');
        $saldo6380=Neraca::whereNot('saldo',0)->where('no_akun','6380')->get()->first();
        if($saldo6380==null){
            $fiskal6380=0;
        }else{
           $fiskal6380=$saldo6380->saldo - $debit6380 + $kredit6380;
        }                
        // 6380

        // 6390
        $asetlancar6390=Neraca::whereNot('saldo',0)->where('no_akun','6390')->get();
        $debit6390=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6390')->sum('nilai_debit');
        $kredit6390=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6390')->sum('nilai_kredit');
        $saldo6390=Neraca::whereNot('saldo',0)->where('no_akun','6390')->get()->first();
        if($saldo6390==null){
            $fiskal6390=0;
        }else{
           $fiskal6390=$saldo6390->saldo - $debit6390 + $kredit6390;
        }                
        // 6390

        // 6400
        $asetlancar6400=Neraca::whereNot('saldo',0)->where('no_akun','6400')->get();
        $debit6400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6400')->sum('nilai_debit');
        $kredit6400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6400')->sum('nilai_kredit');
        $saldo6400=Neraca::whereNot('saldo',0)->where('no_akun','6400')->get()->first();
        if($saldo6400==null){
            $fiskal6400=0;
        }else{
           $fiskal6400=$saldo6400->saldo - $debit6400 + $kredit6400;
        }                
        // 6400

        // 6410
        $asetlancar6410=Neraca::whereNot('saldo',0)->where('no_akun','6410')->get();
        $debit6410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6410')->sum('nilai_debit');
        $kredit6410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6410')->sum('nilai_kredit');
        $saldo6410=Neraca::whereNot('saldo',0)->where('no_akun','6410')->get()->first();
        if($saldo6410==null){
            $fiskal6410=0;
        }else{
           $fiskal6410=$saldo6410->saldo - $debit6410 + $kredit6410;
        }                
        // 6410

        // 6420
        $asetlancar6420=Neraca::whereNot('saldo',0)->where('no_akun','6420')->get();
        $debit6420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6420')->sum('nilai_debit');
        $kredit6420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6420')->sum('nilai_kredit');
        $saldo6420=Neraca::whereNot('saldo',0)->where('no_akun','6420')->get()->first();
        if($saldo6420==null){
            $fiskal6420=0;
        }else{
           $fiskal6420=$saldo6420->saldo - $debit6420 + $kredit6420;
        }                
        // 6420

        // 6430
        $asetlancar6430=Neraca::whereNot('saldo',0)->where('no_akun','6430')->get();
        $debit6430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6430')->sum('nilai_debit');
        $kredit6430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6430')->sum('nilai_kredit');
        $saldo6430=Neraca::whereNot('saldo',0)->where('no_akun','6430')->get()->first();
        if($saldo6430==null){
            $fiskal6430=0;
        }else{
           $fiskal6430=$saldo6430->saldo - $debit6430 + $kredit6430;
        }                
        // 6430

        // 6440
        $asetlancar6440=Neraca::whereNot('saldo',0)->where('no_akun','6440')->get();
        $debit6440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6440')->sum('nilai_debit');
        $kredit6440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6440')->sum('nilai_kredit');
        $saldo6440=Neraca::whereNot('saldo',0)->where('no_akun','6440')->get()->first();
        if($saldo6440==null){
            $fiskal6440=0;
        }else{
           $fiskal6440=$saldo6440->saldo - $debit6440 + $kredit6440;
        }                
        // 6440

        // 6450
        $asetlancar6450=Neraca::whereNot('saldo',0)->where('no_akun','6450')->get();
        $debit6450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6450')->sum('nilai_debit');
        $kredit6450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6450')->sum('nilai_kredit');
        $saldo6450=Neraca::whereNot('saldo',0)->where('no_akun','6450')->get()->first();
        if($saldo6450==null){
            $fiskal6450=0;
        }else{
           $fiskal6450=$saldo6450->saldo - $debit6450 + $kredit6450;
        }                
        // 6450
        
        // 6460
        $asetlancar6460=Neraca::whereNot('saldo',0)->where('no_akun','6460')->get();
        $debit6460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6460')->sum('nilai_debit');
        $kredit6460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6460')->sum('nilai_kredit');
        $saldo6460=Neraca::whereNot('saldo',0)->where('no_akun','6460')->get()->first();
        if($saldo6460==null){
            $fiskal6460=0;
        }else{
           $fiskal6460=$saldo6460->saldo - $debit6460 + $kredit6460;
        }                
        // 6460
        // 6470
        $asetlancar6470=Neraca::whereNot('saldo',0)->where('no_akun','6470')->get();
        $debit6470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6470')->sum('nilai_debit');
        $kredit6470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6470')->sum('nilai_kredit');
        $saldo6470=Neraca::whereNot('saldo',0)->where('no_akun','6470')->get()->first();
        if($saldo6470==null){
            $fiskal6470=0;
        }else{
           $fiskal6470=$saldo6470->saldo - $debit6470 + $kredit6470;
        }                
        // 6470

        // 6480
        $asetlancar6480=Neraca::whereNot('saldo',0)->where('no_akun','6480')->get();
        $debit6480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6480')->sum('nilai_debit');
        $kredit6480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6480')->sum('nilai_kredit');
        $saldo6480=Neraca::whereNot('saldo',0)->where('no_akun','6480')->get()->first();
        if($saldo6480==null){
            $fiskal6480=0;
        }else{
           $fiskal6480=$saldo6480->saldo - $debit6480 + $kredit6480;
        }                
        // 6480

        // 6490
        $asetlancar6490=Neraca::whereNot('saldo',0)->where('no_akun','6490')->get();
        $debit6490=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6490')->sum('nilai_debit');
        $kredit6490=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6490')->sum('nilai_kredit');
        $saldo6490=Neraca::whereNot('saldo',0)->where('no_akun','6490')->get()->first();
        if($saldo6490==null){
            $fiskal6490=0;
        }else{
           $fiskal6490=$saldo6490->saldo - $debit6490 + $kredit6490;
        }                
        // 6490

        // 6500
        $asetlancar6500=Neraca::whereNot('saldo',0)->where('no_akun','6500')->get();
        $debit6500=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6500')->sum('nilai_debit');
        $kredit6500=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6500')->sum('nilai_kredit');
        $saldo6500=Neraca::whereNot('saldo',0)->where('no_akun','6500')->get()->first();
        if($saldo6500==null){
            $fiskal6500=0;
        }else{
           $fiskal6500=$saldo6500->saldo - $debit6500 + $kredit6500;
        }                
        // 6500

        // 6510
        $asetlancar6510=Neraca::whereNot('saldo',0)->where('no_akun','6510')->get();
        $debit6510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6510')->sum('nilai_debit');
        $kredit6510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6510')->sum('nilai_kredit');
        $saldo6510=Neraca::whereNot('saldo',0)->where('no_akun','6510')->get()->first();
        if($saldo6510==null){
            $fiskal6510=0;
        }else{
           $fiskal6510=$saldo6510->saldo - $debit6510 + $kredit6510;
        }                
        // 6510

        // 6520
        $asetlancar6520=Neraca::whereNot('saldo',0)->where('no_akun','6520')->get();
        $debit6520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6520')->sum('nilai_debit');
        $kredit6520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6520')->sum('nilai_kredit');
        $saldo6520=Neraca::whereNot('saldo',0)->where('no_akun','6520')->get()->first();
        if($saldo6520==null){
            $fiskal6520=0;
        }else{
           $fiskal6520=$saldo6520->saldo - $debit6520 + $kredit6520;
        }                
        // 6520

        // 6530
        $asetlancar6530=Neraca::whereNot('saldo',0)->where('no_akun','6530')->get();
        $debit6530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6530')->sum('nilai_debit');
        $kredit6530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6530')->sum('nilai_kredit');
        $saldo6530=Neraca::whereNot('saldo',0)->where('no_akun','6530')->get()->first();
        if($saldo6530==null){
            $fiskal6530=0;
        }else{
           $fiskal6530=$saldo6530->saldo - $debit6530 + $kredit6530;
        }                
        // 6530

        // 6540
        $asetlancar6540=Neraca::whereNot('saldo',0)->where('no_akun','6540')->get();
        $debit6540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6540')->sum('nilai_debit');
        $kredit6540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6540')->sum('nilai_kredit');
        $saldo6540=Neraca::whereNot('saldo',0)->where('no_akun','6540')->get()->first();
        if($saldo6540==null){
            $fiskal6540=0;
        }else{
           $fiskal6540=$saldo6540->saldo - $debit6540 + $kredit6540;
        }                
        // 6540

        // 6600
        $asetlancar6600=Neraca::whereNot('saldo',0)->where('no_akun','6600')->get();
        $debit6600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6600')->sum('nilai_debit');
        $kredit6600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6600')->sum('nilai_kredit');
        $saldo6600=Neraca::whereNot('saldo',0)->where('no_akun','6600')->get()->first();
        if($saldo6600==null){
            $fiskal6600=0;
        }else{
           $fiskal6600=$saldo6600->saldo - $debit6600 + $kredit6600;
        }                
        // 6600

        // 7100
        $asetlancar7100=Neraca::whereNot('saldo',0)->where('no_akun','7100')->get();
        $debit7100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','7100')->sum('nilai_debit');
        $kredit7100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','7100')->sum('nilai_kredit');
        $saldo7100=Neraca::whereNot('saldo',0)->where('no_akun','7100')->get()->first();
        if($saldo7100==null){
            $fiskal7100=0;
        }else{
           $fiskal7100=$saldo7100->saldo + $debit7100 - $kredit7100;
        }                
        // 7100

        // 7110
        $asetlancar7110=Neraca::whereNot('saldo',0)->where('no_akun','7110')->get();
        $debit7110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','7110')->sum('nilai_debit');
        $kredit7110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','7110')->sum('nilai_kredit');
        $saldo7110=Neraca::whereNot('saldo',0)->where('no_akun','7110')->get()->first();
        if($saldo7110==null){
            $fiskal7110=0;
        }else{
           $fiskal7110=$saldo7110->saldo + $debit7110 - $kredit7110;
        }                
        // 7110

        // 8100
        $asetlancar8100=Neraca::whereNot('saldo',0)->where('no_akun','8100')->get();
        $debit8100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','8100')->sum('nilai_debit');
        $kredit8100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','8100')->sum('nilai_kredit');
        $saldo8100=Neraca::whereNot('saldo',0)->where('no_akun','8100')->get()->first();
        if($saldo8100==null){
            $fiskal8100=0;
        }else{
           $fiskal8100=$saldo8100->saldo + $debit8100 - $kredit8100;
        }                
        // 8100

        // 8110
        $asetlancar8110=Neraca::whereNot('saldo',0)->where('no_akun','8110')->get();
        $debit8110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','8110')->sum('nilai_debit');
        $kredit8110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','8110')->sum('nilai_kredit');
        $saldo8110=Neraca::whereNot('saldo',0)->where('no_akun','8110')->get()->first();
        if($saldo8110==null){
            $fiskal8110=0;
        }else{
           $fiskal8110=$saldo8110->saldo + $debit8110 - $kredit8110;
        }                
        // 8110
        // 8120
        $asetlancar8120=Neraca::whereNot('saldo',0)->where('no_akun','8120')->get();
        $debit8120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','8120')->sum('nilai_debit');
        $kredit8120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','8120')->sum('nilai_kredit');
        $saldo8120=Neraca::whereNot('saldo',0)->where('no_akun','8120')->get()->first();
        if($saldo8120==null){
            $fiskal8120=0;
        }else{
           $fiskal8120=$saldo8120->saldo + $debit8120 - $kredit8120;
        }                
        // 8120

        $totalpenjualan=Neraca::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalpenjualanfiskal=$fiskal4100+$fiskal4101+$fiskal4102+$fiskal4103+$fiskal4104+$fiskal4200+$fiskal4201+$fiskal4202+$fiskal4203+$fiskal4300+$fiskal4310+$fiskal4320+$fiskal4330+$fiskal4340+$fiskal4350+$fiskal4105;
        $totalharpok=Neraca::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalharpokfiskal= $fiskal5100+$fiskal5110+$fiskal5120+$fiskal5200+$fiskal5210+$fiskal5211+$fiskal5212+$fiskal5213+$fiskal5250+$fiskal5260+$fiskal5300+$fiskal5400+$fiskal5410+$fiskal5420+$fiskal5430+$fiskal5440+$fiskal5450+$fiskal5460+$fiskal5470+$fiskal5480+$fiskal5600;
        $totalbiayaoperasional=Neraca::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $totalbiayaoperasionalfiskal=$fiskal6100+$fiskal6110+$fiskal6120+$fiskal6130+$fiskal6140+$fiskal6150+$fiskal6160+$fiskal6170+$fiskal6180+$fiskal6190+$fiskal6200+$fiskal6210+$fiskal6220+$fiskal6230+$fiskal6240+$fiskal6250+$fiskal6260+$fiskal6270+$fiskal6280+$fiskal6290+$fiskal6300+$fiskal6310+$fiskal6320+$fiskal6330+$fiskal6340+$fiskal6350+$fiskal6360+$fiskal6370+$fiskal6380+$fiskal6390+$fiskal6400+$fiskal6410+$fiskal6420+$fiskal6430+$fiskal6440+$fiskal6450+$fiskal6460+$fiskal6470+$fiskal6480+$fiskal6490+$fiskal6500+$fiskal6510+$fiskal6520+$fiskal6530+$fiskal6540+$fiskal6600;
        $jumlahpendapatanlain=Neraca::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahpendapatanlainfiskal=$fiskal7100+$fiskal7110;
        $jumlahbebanlain=Neraca::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        $jumlahbebanlainfiskal=$fiskal8100+$fiskal8110+$fiskal8120;
        
        $labakotor = $totalpenjualan-$totalharpok;
        $labakotorfiskal = $totalpenjualanfiskal-$totalharpokfiskal;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $labaoperasionalfiskal = $labakotorfiskal-$totalbiayaoperasionalfiskal;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $totalpendapatandanbebanlainfiskal = $jumlahpendapatanlainfiskal-$jumlahbebanlainfiskal;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','>','4000')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','>','4000')->sum('nilai_kredit');
        $totalkomersial = $ikhtisarlabarugi+$totaldebit-$totalkredit;
        
        $pajakpenghasiliktisarlabarugi = $ikhtisarlabarugi*22/100;
        $pajakpenghasiltotalkomersial = $totalkomersial*22/100;
        
        $data =[
            'title' =>'LAPORAN LABA RUGI FISKAL',
        ];

        $pdf =  PDF::loadView('pdf.printpdflabarugifiskal',$data,compact(
            'totalpendapatandanbebanlainfiskal',
            'totalpenjualanfiskal','totalharpokfiskal','labakotorfiskal','totalbiayaoperasionalfiskal','labaoperasionalfiskal','jumlahpendapatanlainfiskal','jumlahbebanlainfiskal',
            'fiskal4300','fiskal4203','fiskal4202','fiskal4201','fiskal4200','fiskal4104','fiskal4103','fiskal4102','fiskal4101','fiskal4100','fiskal4340',
            'fiskal5211','fiskal5210','fiskal5200','fiskal5120','fiskal5110','fiskal5100','fiskal4105','fiskal4350','fiskal4330','fiskal4320','fiskal4310',
            'fiskal5450','fiskal5440','fiskal5430','fiskal5420','fiskal5410','fiskal5400','fiskal5300','fiskal5260','fiskal5250','fiskal5213','fiskal5212',
            'fiskal6160','fiskal6150','fiskal6140','fiskal6130','fiskal6120','fiskal6110','fiskal6100','fiskal5600','fiskal5480','fiskal5470','fiskal5460',
            'fiskal6270','fiskal6260','fiskal6250','fiskal6240','fiskal6230','fiskal6220','fiskal6210','fiskal6200','fiskal6190','fiskal6180','fiskal6170',
            'fiskal6380','fiskal6370','fiskal6360','fiskal6350','fiskal6340','fiskal6330','fiskal6320','fiskal6310','fiskal6300','fiskal6290','fiskal6280',
            'fiskal6600','fiskal6540','fiskal6530','fiskal6520','fiskal6510','fiskal6500','fiskal6490','fiskal6480','fiskal6470','fiskal6460','fiskal6450',
            'fiskal7100','fiskal7110','fiskal8100','fiskal8110','fiskal8120','fiskal6440','fiskal6430','fiskal6420','fiskal6410','fiskal6400','fiskal6390',
            'pajakpenghasiliktisarlabarugi','pajakpenghasiltotalkomersial',
            'totaldebit','totalkredit','totalkomersial',
            'totalpenjualan','totalharpok','totalbiayaoperasional','jumlahpendapatanlain',
            'jumlahbebanlain','labakotor','labaoperasional','totalpendapatandanbebanlain',
            'ikhtisarlabarugi',
            'asetlancar4100','debit4100','kredit4100',
            'asetlancar4101','debit4101','kredit4101',
            'asetlancar4102','debit4102','kredit4102',
            'asetlancar4103','debit4103','kredit4103',
            'asetlancar4104','debit4104','kredit4104',
            'asetlancar4200','debit4200','kredit4200',
            'asetlancar4201','debit4201','kredit4201',
            'asetlancar4202','debit4202','kredit4202',
            'asetlancar4203','debit4203','kredit4203',
            'asetlancar4300','debit4300','kredit4300',
            'asetlancar4310','debit4310','kredit4310',
            'asetlancar4320','debit4320','kredit4320',
            'asetlancar4330','debit4330','kredit4330',
            'asetlancar4340','debit4340','kredit4340',
            'asetlancar4350','debit4350','kredit4350',
            'asetlancar4105','debit4105','kredit4105',
            'asetlancar5100','debit5100','kredit5100',
            'asetlancar5110','debit5110','kredit5110',
            'asetlancar5120','debit5120','kredit5120',
            'asetlancar5200','debit5200','kredit5200',
            'asetlancar5210','debit5210','kredit5210',
            'asetlancar5211','debit5211','kredit5211',
            'asetlancar5212','debit5212','kredit5212',
            'asetlancar5213','debit5213','kredit5213',
            'asetlancar5250','debit5250','kredit5250',
            'asetlancar5260','debit5260','kredit5260',
            'asetlancar5300','debit5300','kredit5300',
            'asetlancar5400','debit5400','kredit5400',
            'asetlancar5410','debit5410','kredit5410',
            'asetlancar5420','debit5420','kredit5420',
            'asetlancar5430','debit5430','kredit5430',
            'asetlancar5440','debit5440','kredit5440',
            'asetlancar5450','debit5450','kredit5450',
            'asetlancar5460','debit5460','kredit5460',
            'asetlancar5470','debit5470','kredit5470',
            'asetlancar5480','debit5480','kredit5480',
            'asetlancar5600','debit5600','kredit5600',
            'asetlancar6100','debit6100','kredit6100',
            'asetlancar6110','debit6110','kredit6110',
            'asetlancar6120','debit6120','kredit6120',
            'asetlancar6130','debit6130','kredit6130',
            'asetlancar6140','debit6140','kredit6140',
            'asetlancar6150','debit6150','kredit6150',
            'asetlancar6160','debit6160','kredit6160',
            'asetlancar6170','debit6170','kredit6170',
            'asetlancar6180','debit6180','kredit6180',
            'asetlancar6190','debit6190','kredit6190',
            'asetlancar6200','debit6200','kredit6200',
            'asetlancar6210','debit6210','kredit6210',
            'asetlancar6220','debit6220','kredit6220',
            'asetlancar6230','debit6230','kredit6230',
            'asetlancar6240','debit6240','kredit6240',
            'asetlancar6250','debit6250','kredit6250',
            'asetlancar6260','debit6260','kredit6260',
            'asetlancar6270','debit6270','kredit6270',
            'asetlancar6280','debit6280','kredit6280',
            'asetlancar6290','debit6290','kredit6290',
            'asetlancar6300','debit6300','kredit6300',
            'asetlancar6310','debit6310','kredit6310',
            'asetlancar6320','debit6320','kredit6320',
            'asetlancar6330','debit6330','kredit6330',
            'asetlancar6340','debit6340','kredit6340',
            'asetlancar6350','debit6350','kredit6350',
            'asetlancar6360','debit6360','kredit6360',
            'asetlancar6370','debit6370','kredit6370',
            'asetlancar6380','debit6380','kredit6380',
            'asetlancar6390','debit6390','kredit6390',
            'asetlancar6400','debit6400','kredit6400',
            'asetlancar6410','debit6410','kredit6410',
            'asetlancar6420','debit6420','kredit6420',
            'asetlancar6430','debit6430','kredit6430',
            'asetlancar6440','debit6440','kredit6440',
            'asetlancar6450','debit6450','kredit6450',
            'asetlancar6460','debit6460','kredit6460',
            'asetlancar6470','debit6470','kredit6470',
            'asetlancar6480','debit6480','kredit6480',
            'asetlancar6490','debit6490','kredit6490',
            'asetlancar6500','debit6500','kredit6500',
            'asetlancar6510','debit6510','kredit6510',
            'asetlancar6520','debit6520','kredit6520',
            'asetlancar6530','debit6530','kredit6530',
            'asetlancar6540','debit6540','kredit6540',
            'asetlancar6600','debit6600','kredit6600',
            'asetlancar7100','debit7100','kredit7100',
            'asetlancar7110','debit7110','kredit7110',
            'asetlancar8100','debit8100','kredit8100',
            'asetlancar8110','debit8110','kredit8110',
            'asetlancar8120','debit8120','kredit8120',
        ));
        return $pdf->stream('dokumen.pdf'); 
    }
    public function neracafiskalPDF(Request $request){
        $id=Auth::user()->id;

        // 1110
        $asetlancar1110=Neraca::whereNot('saldo',0)->where('no_akun','1110')->get();
        $debit1110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1110')->sum('nilai_debit');
        $kredit1110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1110')->sum('nilai_kredit');
        $saldo1110=Neraca::whereNot('saldo',0)->where('no_akun','1110')->get()->first();
        if($saldo1110==null){
            $fiskal1110=0;
        }else{
            $fiskal1110=$saldo1110->saldo+$debit1110-$kredit1110;
        }
        // 1110
        
        // 1111
        $asetlancar1111=Neraca::whereNot('saldo',0)->where('no_akun','1111')->get();
        $debit1111=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1111')->sum('nilai_debit');
        $kredit1111=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1111')->sum('nilai_kredit');
        $saldo1111=Neraca::whereNot('saldo',0)->where('no_akun','1111')->get()->first();
        if($saldo1111==null){
            $fiskal1111=0;
        }else{
            $fiskal1111=$saldo1111->saldo+$debit1111-$kredit1111;
        }
        // 1111
        
        // 1112
        $asetlancar1112=Neraca::whereNot('saldo',0)->where('no_akun','1112')->get();
        $debit1112=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1112')->sum('nilai_debit');
        $kredit1112=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1112')->sum('nilai_kredit');
        $saldo1112=Neraca::whereNot('saldo',0)->where('no_akun','1112')->get()->first();
        if($saldo1112==null){
            $fiskal1112=0;
        }else{
            $fiskal1112=$saldo1112->saldo+$debit1112-$kredit1112;
        }
        // 1112

        // 1113
        $asetlancar1113=Neraca::whereNot('saldo',0)->where('no_akun','1113')->get();
        $debit1113=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1113')->sum('nilai_debit');
        $kredit1113=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1113')->sum('nilai_kredit');
        $saldo1113=Neraca::whereNot('saldo',0)->where('no_akun','1113')->get()->first();
        if($saldo1113==null){
            $fiskal1113=0;
        }else{
            $fiskal1113=$saldo1113->saldo+$debit1113-$kredit1113;
        }
        // 1113

        // 1114
        $asetlancar1114=Neraca::whereNot('saldo',0)->where('no_akun','1114')->get();
        $debit1114=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1114')->sum('nilai_debit');
        $kredit1114=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1114')->sum('nilai_kredit');
        $saldo1114=Neraca::whereNot('saldo',0)->where('no_akun','1114')->get()->first();
        if($saldo1114==null){
            $fiskal1114=0;
        }else{
            $fiskal1114=$saldo1114->saldo+$debit1114-$kredit1114;
        }
        // 1114

        // 1120
        $asetlancar1120=Neraca::whereNot('saldo',0)->where('no_akun','1120')->get();
        $debit1120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1120')->sum('nilai_debit');
        $kredit1120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1120')->sum('nilai_kredit');
        $saldo1120=Neraca::whereNot('saldo',0)->where('no_akun','1120')->get()->first();
        if($saldo1120==null){
            $fiskal1120=0;
        }else{
            $fiskal1120=$saldo1120->saldo+$debit1120-$kredit1120;
        }
        // 1120

        // 1130
        $asetlancar1130=Neraca::whereNot('saldo',0)->where('no_akun','1130')->get();
        $debit1130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1130')->sum('nilai_debit');
        $kredit1130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1130')->sum('nilai_kredit');
        $saldo1130=Neraca::whereNot('saldo',0)->where('no_akun','1130')->get()->first();
        if($saldo1130==null){
            $fiskal1130=0;
        }else{
            $fiskal1130=$saldo1130->saldo+$debit1130-$kredit1130;
        }
        // 1130
        
        // 1210
        $asetlancar1210=Neraca::whereNot('saldo',0)->where('no_akun','1210')->get();
        $debit1210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1210')->sum('nilai_debit');
        $kredit1210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1210')->sum('nilai_kredit');
        $saldo1210=Neraca::whereNot('saldo',0)->where('no_akun','1210')->get()->first();
        if($saldo1210==null){
            $fiskal1210=0;
        }else{
            $fiskal1210=$saldo1210->saldo+$debit1210-$kredit1210;
        }
        // 1210

        // 1220
        $asetlancar1220=Neraca::whereNot('saldo',0)->where('no_akun','1220')->get();
        $debit1220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1220')->sum('nilai_debit');
        $kredit1220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1220')->sum('nilai_kredit');
        $saldo1220=Neraca::whereNot('saldo',0)->where('no_akun','1220')->get()->first();
        if($saldo1220==null){
            $fiskal1220=0;
        }else{
            $fiskal1220=$saldo1220->saldo+$debit1220-$kredit1220;
        }
        // 1220

        // 1230
        $asetlancar1230=Neraca::whereNot('saldo',0)->where('no_akun','1230')->get();
        $debit1230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1230')->sum('nilai_debit');
        $kredit1230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1230')->sum('nilai_kredit');
        $saldo1230=Neraca::whereNot('saldo',0)->where('no_akun','1230')->get()->first();
        if($saldo1230==null){
            $fiskal1230=0;
        }else{
            $fiskal1230=$saldo1230->saldo+$debit1230-$kredit1230;
        }
        // 1230

        // 1240
        $asetlancar1240=Neraca::whereNot('saldo',0)->where('no_akun','1240')->get();
        $debit1240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1240')->sum('nilai_debit');
        $kredit1240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1240')->sum('nilai_kredit');
        $saldo1240=Neraca::whereNot('saldo',0)->where('no_akun','1240')->get()->first();
        if($saldo1240==null){
            $fiskal1240=0;
        }else{
            $fiskal1240=$saldo1240->saldo+$debit1240-$kredit1240;
        }
        // 1240

        // 1250
        $asetlancar1250=Neraca::whereNot('saldo',0)->where('no_akun','1250')->get();
        $debit1250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1250')->sum('nilai_debit');
        $kredit1250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1250')->sum('nilai_kredit');
        $saldo1250=Neraca::whereNot('saldo',0)->where('no_akun','1250')->get()->first();
        if($saldo1250==null){
            $fiskal1250=0;
        }else{
            $fiskal1250=$saldo1250->saldo+$debit1250-$kredit1250;
        }
        // 1250

        // 1251
        $asetlancar1251=Neraca::whereNot('saldo',0)->where('no_akun','1251')->get();
        $debit1251=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1251')->sum('nilai_debit');
        $kredit1251=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1251')->sum('nilai_kredit');
        $saldo1251=Neraca::whereNot('saldo',0)->where('no_akun','1251')->get()->first();
        if($saldo1251==null){
            $fiskal1251=0;
        }else{
            $fiskal1251=$saldo1251->saldo+$debit1251-$kredit1251;
        }
        // 1251

        // 1260
        $asetlancar1260=Neraca::whereNot('saldo',0)->where('no_akun','1260')->get();
        $debit1260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1260')->sum('nilai_debit');
        $kredit1260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1260')->sum('nilai_kredit');
        $saldo1260=Neraca::whereNot('saldo',0)->where('no_akun','1260')->get()->first();
        if($saldo1260==null){
            $fiskal1260=0;
        }else{
            $fiskal1260=$saldo1260->saldo+$debit1260-$kredit1260;
        }
        // 1260
        // 1270
        $asetlancar1270=Neraca::whereNot('saldo',0)->where('no_akun','1270')->get();
        $debit1270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1270')->sum('nilai_debit');
        $kredit1270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1270')->sum('nilai_kredit');
        $saldo1270=Neraca::whereNot('saldo',0)->where('no_akun','1270')->get()->first();
        if($saldo1270==null){
            $fiskal1270=0;
        }else{
            $fiskal1270=$saldo1270->saldo+$debit1270-$kredit1270;
        }
        // 1270
        // 1271
        $asetlancar1271=Neraca::whereNot('saldo',0)->where('no_akun','1271')->get();
        $debit1271=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1271')->sum('nilai_debit');
        $kredit1271=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1271')->sum('nilai_kredit');
        $saldo1271=Neraca::whereNot('saldo',0)->where('no_akun','1271')->get()->first();
        if($saldo1271==null){
            $fiskal1271=0;
        }else{
            $fiskal1271=$saldo1271->saldo+$debit1271-$kredit1271;
        }
        // 1271
        // 1272
        $asetlancar1272=Neraca::whereNot('saldo',0)->where('no_akun','1272')->get();
        $debit1272=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1272')->sum('nilai_debit');
        $kredit1272=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1272')->sum('nilai_kredit');
        $saldo1272=Neraca::whereNot('saldo',0)->where('no_akun','1272')->get()->first();
        if($saldo1272==null){
            $fiskal1272=0;
        }else{
            $fiskal1272=$saldo1272->saldo+$debit1272-$kredit1272;
        }
        // 1272
        // 1273
        $asetlancar1273=Neraca::whereNot('saldo',0)->where('no_akun','1273')->get();
        $debit1273=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1273')->sum('nilai_debit');
        $kredit1273=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1273')->sum('nilai_kredit');
        $saldo1273=Neraca::whereNot('saldo',0)->where('no_akun','1273')->get()->first();
        if($saldo1273==null){
            $fiskal1273=0;
        }else{
            $fiskal1273=$saldo1273->saldo+$debit1273-$kredit1273;
        }
        // 1273
        // 1274
        $asetlancar1274=Neraca::whereNot('saldo',0)->where('no_akun','1274')->get();
        $debit1274=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1274')->sum('nilai_debit');
        $kredit1274=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1274')->sum('nilai_kredit');
        $saldo1274=Neraca::whereNot('saldo',0)->where('no_akun','1274')->get()->first();
        if($saldo1274==null){
            $fiskal1274=0;
        }else{
            $fiskal1274=$saldo1274->saldo+$debit1274-$kredit1274;
        }
        // 1274
        // 1275
        $asetlancar1275=Neraca::whereNot('saldo',0)->where('no_akun','1275')->get();
        $debit1275=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1275')->sum('nilai_debit');
        $kredit1275=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1275')->sum('nilai_kredit');
        $saldo1275=Neraca::whereNot('saldo',0)->where('no_akun','1275')->get()->first();
        if($saldo1275==null){
            $fiskal1275=0;
        }else{
            $fiskal1275=$saldo1275->saldo+$debit1275-$kredit1275;
        }
        // 1275
        // 1310
        $asetlancar1310=Neraca::whereNot('saldo',0)->where('no_akun','1310')->get();
        $debit1310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1310')->sum('nilai_debit');
        $kredit1310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1310')->sum('nilai_kredit');
        $saldo1310=Neraca::whereNot('saldo',0)->where('no_akun','1310')->get()->first();
        if($saldo1310==null){
            $fiskal1310=0;
        }else{
            $fiskal1310=$saldo1310->saldo+$debit1310-$kredit1310;
        }
        // 1310
        // 1312
        $asetlancar1312=Neraca::whereNot('saldo',0)->where('no_akun','1312')->get();
        $debit1312=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1312')->sum('nilai_debit');
        $kredit1312=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1312')->sum('nilai_kredit');
        $saldo1312=Neraca::whereNot('saldo',0)->where('no_akun','1312')->get()->first();
        if($saldo1312==null){
            $fiskal1312=0;
        }else{
            $fiskal1312=$saldo1312->saldo+$debit1312-$kredit1312;
        }
        // 1312
        
        // 1313
        $asetlancar1313=Neraca::whereNot('saldo',0)->where('no_akun','1313')->get();
        $debit1313=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1313')->sum('nilai_debit');
        $kredit1313=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1313')->sum('nilai_kredit');
        $saldo1313=Neraca::whereNot('saldo',0)->where('no_akun','1313')->get()->first();
        if($saldo1313==null){
            $fiskal1313=0;
        }else{
            $fiskal1313=$saldo1313->saldo+$debit1313-$kredit1313;
        }
        // 1313
        
        // 1314
        $asetlancar1314=Neraca::whereNot('saldo',0)->where('no_akun','1314')->get();
        $debit1314=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1314')->sum('nilai_debit');
        $kredit1314=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1314')->sum('nilai_kredit');
        $saldo1314=Neraca::whereNot('saldo',0)->where('no_akun','1314')->get()->first();
        if($saldo1314==null){
            $fiskal1314=0;
        }else{
            $fiskal1314=$saldo1314->saldo+$debit1314-$kredit1314;
        }
        // 1314

        // 1330
        $asetlancar1330=Neraca::whereNot('saldo',0)->where('no_akun','1330')->get();
        $debit1330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1330')->sum('nilai_debit');
        $kredit1330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1330')->sum('nilai_kredit');
        $saldo1330=Neraca::whereNot('saldo',0)->where('no_akun','1330')->get()->first();
        if($saldo1330==null){
            $fiskal1330=0;
        }else{
            $fiskal1330=$saldo1330->saldo+$debit1330-$kredit1330;
        }
        // 1330
        // 1340
        $asetlancar1340=Neraca::whereNot('saldo',0)->where('no_akun','1340')->get();
        $debit1340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1340')->sum('nilai_debit');
        $kredit1340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1340')->sum('nilai_kredit');
        $saldo1340=Neraca::whereNot('saldo',0)->where('no_akun','1340')->get()->first();
        if($saldo1340==null){
            $fiskal1340=0;
        }else{
            $fiskal1340=$saldo1340->saldo+$debit1340-$kredit1340;
        }
        // 1340
        // 1341
        $asetlancar1341=Neraca::whereNot('saldo',0)->where('no_akun','1341')->get();
        $debit1341=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1341')->sum('nilai_debit');
        $kredit1341=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1341')->sum('nilai_kredit');
        $saldo1341=Neraca::whereNot('saldo',0)->where('no_akun','1341')->get()->first();
        if($saldo1341==null){
            $fiskal1341=0;
        }else{
            $fiskal1341=$saldo1341->saldo+$debit1341-$kredit1341;
        }
        // 1341
        // 1342
        $asetlancar1342=Neraca::whereNot('saldo',0)->where('no_akun','1342')->get();
        $debit1342=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1342')->sum('nilai_debit');
        $kredit1342=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1342')->sum('nilai_kredit');
        $saldo1342=Neraca::whereNot('saldo',0)->where('no_akun','1342')->get()->first();
        if($saldo1342==null){
            $fiskal1342=0;
        }else{
            $fiskal1342=$saldo1342->saldo+$debit1342-$kredit1342;
        }
        // 1342
        // 1360
        $asetlancar1360=Neraca::whereNot('saldo',0)->where('no_akun','1360')->get();
        $debit1360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1360')->sum('nilai_debit');
        $kredit1360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1360')->sum('nilai_kredit');
        $saldo1360=Neraca::whereNot('saldo',0)->where('no_akun','1360')->get()->first();
        if($saldo1360==null){
            $fiskal1360=0;
        }else{
            $fiskal1360=$saldo1360->saldo+$debit1360-$kredit1360;
        }
        // 1360
        // 1361
        $asetlancar1361=Neraca::whereNot('saldo',0)->where('no_akun','1361')->get();
        $debit1361=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1361')->sum('nilai_debit');
        $kredit1361=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1361')->sum('nilai_kredit');
        $saldo1361=Neraca::whereNot('saldo',0)->where('no_akun','1361')->get()->first();
        if($saldo1361==null){
            $fiskal1361=0;
        }else{
            $fiskal1361=$saldo1361->saldo+$debit1361-$kredit1361;
        }
        // 1361
        // 1362
        $asetlancar1362=Neraca::whereNot('saldo',0)->where('no_akun','1362')->get();
        $debit1362=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1362')->sum('nilai_debit');
        $kredit1362=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1362')->sum('nilai_kredit');
        $saldo1362=Neraca::whereNot('saldo',0)->where('no_akun','1362')->get()->first();
        if($saldo1362==null){
            $fiskal1362=0;
        }else{
            $fiskal1362=$saldo1362->saldo+$debit1362-$kredit1362;
        }
        // 1362
        // 1380
        $asetlancar1380=Neraca::whereNot('saldo',0)->where('no_akun','1380')->get();
        $debit1380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1380')->sum('nilai_debit');
        $kredit1380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1380')->sum('nilai_kredit');
        $saldo1380=Neraca::whereNot('saldo',0)->where('no_akun','1380')->get()->first();
        if($saldo1380==null){
            $fiskal1380=0;
        }else{
            $fiskal1380=$saldo1380->saldo+$debit1380-$kredit1380;
        }
        // 1380
        // 1410
        $asetlancar1410=Neraca::whereNot('saldo',0)->where('no_akun','1410')->get();
        $debit1410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1410')->sum('nilai_debit');
        $kredit1410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1410')->sum('nilai_kredit');
        $saldo1410=Neraca::whereNot('saldo',0)->where('no_akun','1410')->get()->first();
        if($saldo1410==null){
            $fiskal1410=0;
        }else{
            $fiskal1410=$saldo1410->saldo+$debit1410-$kredit1410;
        }
        // 1410
        // 1420
        $asetlancar1420=Neraca::whereNot('saldo',0)->where('no_akun','1420')->get();
        $debit1420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1420')->sum('nilai_debit');
        $kredit1420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1420')->sum('nilai_kredit');
        $saldo1420=Neraca::whereNot('saldo',0)->where('no_akun','1420')->get()->first();
        if($saldo1420==null){
            $fiskal1420=0;
        }else{
            $fiskal1420=$saldo1420->saldo+$debit1420-$kredit1420;
        }
        // 1420
        // 1430
        $asetlancar1430=Neraca::whereNot('saldo',0)->where('no_akun','1430')->get();
        $debit1430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1430')->sum('nilai_debit');
        $kredit1430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1430')->sum('nilai_kredit');
        $saldo1430=Neraca::whereNot('saldo',0)->where('no_akun','1430')->get()->first();
        if($saldo1430==null){
            $fiskal1430=0;
        }else{
            $fiskal1430=$saldo1430->saldo+$debit1430-$kredit1430;
        }
        // 1430
        // 1440
        $asetlancar1440=Neraca::whereNot('saldo',0)->where('no_akun','1440')->get();
        $debit1440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1440')->sum('nilai_debit');
        $kredit1440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1440')->sum('nilai_kredit');
        $saldo1440=Neraca::whereNot('saldo',0)->where('no_akun','1440')->get()->first();
        if($saldo1440==null){
            $fiskal1440=0;
        }else{
            $fiskal1440=$saldo1440->saldo+$debit1440-$kredit1440;
        }
        // 1440
        // 1450
        $asetlancar1450=Neraca::whereNot('saldo',0)->where('no_akun','1450')->get();
        $debit1450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1450')->sum('nilai_debit');
        $kredit1450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1450')->sum('nilai_kredit');
        $saldo1450=Neraca::whereNot('saldo',0)->where('no_akun','1450')->get()->first();
        if($saldo1450==null){
            $fiskal1450=0;
        }else{
            $fiskal1450=$saldo1450->saldo+$debit1450-$kredit1450;
        }
        // 1450
        // 1460
        $asetlancar1460=Neraca::whereNot('saldo',0)->where('no_akun','1460')->get();
        $debit1460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1460')->sum('nilai_debit');
        $kredit1460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1460')->sum('nilai_kredit');
        $saldo1460=Neraca::whereNot('saldo',0)->where('no_akun','1460')->get()->first();
        if($saldo1460==null){
            $fiskal1460=0;
        }else{
            $fiskal1460=$saldo1460->saldo+$debit1460-$kredit1460;
        }
        // 1460

        // 1510
        $asetlancar1510=Neraca::whereNot('saldo',0)->where('no_akun','1510')->get();
        $debit1510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1510')->sum('nilai_debit');
        $kredit1510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1510')->sum('nilai_kredit');
        $saldo1510=Neraca::whereNot('saldo',0)->where('no_akun','1510')->get()->first();
        if($saldo1510==null){
            $fiskal1510=0;
        }else{
            $fiskal1510=$saldo1510->saldo+$debit1510-$kredit1510;
        }
        // 1510

        // 1520
        $asetlancar1520=Neraca::whereNot('saldo',0)->where('no_akun','1520')->get();
        $debit1520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1520')->sum('nilai_debit');
        $kredit1520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1520')->sum('nilai_kredit');
        $saldo1520=Neraca::whereNot('saldo',0)->where('no_akun','1520')->get()->first();
        if($saldo1520==null){
            $fiskal1520=0;
        }else{
            $fiskal1520=$saldo1520->saldo+$debit1520-$kredit1520;
        }
        // 1520

        // 1530
        $asetlancar1530=Neraca::whereNot('saldo',0)->where('no_akun','1530')->get();
        $debit1530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1530')->sum('nilai_debit');
        $kredit1530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1530')->sum('nilai_kredit');
        $saldo1530=Neraca::whereNot('saldo',0)->where('no_akun','1530')->get()->first();
        if($saldo1530==null){
            $fiskal1530=0;
        }else{
            $fiskal1530=$saldo1530->saldo+$debit1530-$kredit1530;
        }
        // 1530

        // 1540
        $asetlancar1540=Neraca::whereNot('saldo',0)->where('no_akun','1540')->get();
        $debit1540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1540')->sum('nilai_debit');
        $kredit1540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1540')->sum('nilai_kredit');
        $saldo1540=Neraca::whereNot('saldo',0)->where('no_akun','1540')->get()->first();
        if($saldo1540==null){
            $fiskal1540=0;
        }else{
            $fiskal1540=$saldo1540->saldo+$debit1540-$kredit1540;
        }
        // 1540
        
        // 1550
        $asetlancar1550=Neraca::whereNot('saldo',0)->where('no_akun','1550')->get();
        $debit1550=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1550')->sum('nilai_debit');
        $kredit1550=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1550')->sum('nilai_kredit');
        $saldo1550=Neraca::whereNot('saldo',0)->where('no_akun','1550')->get()->first();
        if($saldo1550==null){
            $fiskal1550=0;
        }else{
            $fiskal1550=$saldo1550->saldo+$debit1550-$kredit1550;
        }
        // 1550

        // 1600
        $asetlancar1600=Neraca::whereNot('saldo',0)->where('no_akun','1600')->get();
        $debit1600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1600')->sum('nilai_debit');
        $kredit1600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1600')->sum('nilai_kredit');
        $saldo1600=Neraca::whereNot('saldo',0)->where('no_akun','1600')->get()->first();
        if($saldo1600==null){
            $fiskal1600=0;
        }else{
            $fiskal1600=$saldo1600->saldo+$debit1600-$kredit1600;
        }
        // 1600
        // 1610
        $asetlancar1610=Neraca::whereNot('saldo',0)->where('no_akun','1610')->get();
        $debit1610=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1610')->sum('nilai_debit');
        $kredit1610=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1610')->sum('nilai_kredit');
        $saldo1610=Neraca::whereNot('saldo',0)->where('no_akun','1610')->get()->first();
        if($saldo1610==null){
            $fiskal1610=0;
        }else{
            $fiskal1610=$saldo1610->saldo+$debit1610-$kredit1610;
        }
        // 1610
        // 1620
        $asetlancar1620=Neraca::whereNot('saldo',0)->where('no_akun','1620')->get();
        $debit1620=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1620')->sum('nilai_debit');
        $kredit1620=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1620')->sum('nilai_kredit');
        $saldo1620=Neraca::whereNot('saldo',0)->where('no_akun','1620')->get()->first();
        if($saldo1620==null){
            $fiskal1620=0;
        }else{
            $fiskal1620=$saldo1620->saldo+$debit1620-$kredit1620;
        }
        // 1620
        // 1630
        $asetlancar1630=Neraca::whereNot('saldo',0)->where('no_akun','1630')->get();
        $debit1630=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1630')->sum('nilai_debit');
        $kredit1630=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1630')->sum('nilai_kredit');
        $saldo1630=Neraca::whereNot('saldo',0)->where('no_akun','1630')->get()->first();
        if($saldo1630==null){
            $fiskal1630=0;
        }else{
            $fiskal1630=$saldo1630->saldo+$debit1630-$kredit1630;
        }
        // 1630
        // 1640
        $asetlancar1640=Neraca::whereNot('saldo',0)->where('no_akun','1640')->get();
        $debit1640=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1640')->sum('nilai_debit');
        $kredit1640=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1640')->sum('nilai_kredit');
        $saldo1640=Neraca::whereNot('saldo',0)->where('no_akun','1640')->get()->first();
        if($saldo1640==null){
            $fiskal1640=0;
        }else{
            $fiskal1640=$saldo1640->saldo+$debit1640-$kredit1640;
        }
        // 1640
        // 2110
        $asetlancar2110=Neraca::whereNot('saldo',0)->where('no_akun','2110')->get();
        $debit2110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2110')->sum('nilai_debit');
        $kredit2110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2110')->sum('nilai_kredit');
        $saldo2110=Neraca::whereNot('saldo',0)->where('no_akun','2110')->get()->first();
        if($saldo2110==null){
            $fiskal2110=0;
        }else{
            $fiskal2110=$saldo2110->saldo+$debit2110-$kredit2110;
        }
        // 2110
        // 2120
        $asetlancar2120=Neraca::whereNot('saldo',0)->where('no_akun','2120')->get();
        $debit2120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2120')->sum('nilai_debit');
        $kredit2120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2120')->sum('nilai_kredit');
        $saldo2120=Neraca::whereNot('saldo',0)->where('no_akun','2120')->get()->first();
        if($saldo2120==null){
            $fiskal2120=0;
        }else{
            $fiskal2120=$saldo2120->saldo+$debit2120-$kredit2120;
        }
        // 2120
        // 2130
        $asetlancar2130=Neraca::whereNot('saldo',0)->where('no_akun','2130')->get();
        $debit2130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2130')->sum('nilai_debit');
        $kredit2130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2130')->sum('nilai_kredit');
        $saldo2130=Neraca::whereNot('saldo',0)->where('no_akun','2130')->get()->first();
        if($saldo2130==null){
            $fiskal2130=0;
        }else{
            $fiskal2130=$saldo2130->saldo+$debit2130-$kredit2130;
        }
        // 2130
        // 2140
        $asetlancar2140=Neraca::whereNot('saldo',0)->where('no_akun','2140')->get();
        $debit2140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2140')->sum('nilai_debit');
        $kredit2140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2140')->sum('nilai_kredit');
        $saldo2140=Neraca::whereNot('saldo',0)->where('no_akun','2140')->get()->first();
        if($saldo2140==null){
            $fiskal2140=0;
        }else{
            $fiskal2140=$saldo2140->saldo+$debit2140-$kredit2140;
        }
        // 2140
        // 2150
        $asetlancar2150=Neraca::whereNot('saldo',0)->where('no_akun','2150')->get();
        $debit2150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2150')->sum('nilai_debit');
        $kredit2150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2150')->sum('nilai_kredit');
        $saldo2150=Neraca::whereNot('saldo',0)->where('no_akun','2150')->get()->first();
        if($saldo2150==null){
            $fiskal2150=0;
        }else{
            $fiskal2150=$saldo2150->saldo+$debit2150-$kredit2150;
        }
        // 2150
        // 2160
        $asetlancar2160=Neraca::whereNot('saldo',0)->where('no_akun','2160')->get();
        $debit2160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2160')->sum('nilai_debit');
        $kredit2160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2160')->sum('nilai_kredit');
        $saldo2160=Neraca::whereNot('saldo',0)->where('no_akun','2160')->get()->first();
        if($saldo2160==null){
            $fiskal2160=0;
        }else{
            $fiskal2160=$saldo2160->saldo+$debit2160-$kredit2160;
        }
        // 2160
        // 2310
        $asetlancar2310=Neraca::whereNot('saldo',0)->where('no_akun','2310')->get();
        $debit2310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2310')->sum('nilai_debit');
        $kredit2310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2310')->sum('nilai_kredit');
        $saldo2310=Neraca::whereNot('saldo',0)->where('no_akun','2310')->get()->first();
        if($saldo2310==null){
            $fiskal2310=0;
        }else{
            $fiskal2310=$saldo2310->saldo+$debit2310-$kredit2310;
        }
        // 2310
        // 2320
        $asetlancar2320=Neraca::whereNot('saldo',0)->where('no_akun','2320')->get();
        $debit2320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2320')->sum('nilai_debit');
        $kredit2320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2320')->sum('nilai_kredit');
        $saldo2320=Neraca::whereNot('saldo',0)->where('no_akun','2320')->get()->first();
        if($saldo2320==null){
            $fiskal2320=0;
        }else{
            $fiskal2320=$saldo2320->saldo+$debit2320-$kredit2320;
        }
        // 2320

        // 2330
        $asetlancar2330=Neraca::whereNot('saldo',0)->where('no_akun','2330')->get();
        $debit2330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2330')->sum('nilai_debit');
        $kredit2330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2330')->sum('nilai_kredit');
        $saldo2330=Neraca::whereNot('saldo',0)->where('no_akun','2330')->get()->first();
        if($saldo2330==null){
            $fiskal2330=0;
        }else{
            $fiskal2330=$saldo2330->saldo+$debit2330-$kredit2330;
        }
        // 2330

        // 2210
        $asetlancar2210=Neraca::whereNot('saldo',0)->where('no_akun','2210')->get();
        $debit2210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2210')->sum('nilai_debit');
        $kredit2210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2210')->sum('nilai_kredit');
        $saldo2210=Neraca::whereNot('saldo',0)->where('no_akun','2210')->get()->first();
        if($saldo2210==null){
            $fiskal2210=0;
        }else{
            $fiskal2210=$saldo2210->saldo+$debit2210-$kredit2210;
        }
        // 2210
        // 2220
        $asetlancar2220=Neraca::whereNot('saldo',0)->where('no_akun','2220')->get();
        $debit2220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2220')->sum('nilai_debit');
        $kredit2220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2220')->sum('nilai_kredit');
        $saldo2220=Neraca::whereNot('saldo',0)->where('no_akun','2220')->get()->first();
        if($saldo2220==null){
            $fiskal2220=0;
        }else{
            $fiskal2220=$saldo2220->saldo+$debit2220-$kredit2220;
        }
        // 2220
        // 2221
        $asetlancar2221=Neraca::whereNot('saldo',0)->where('no_akun','2221')->get();
        $debit2221=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2221')->sum('nilai_debit');
        $kredit2221=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2221')->sum('nilai_kredit');
        $saldo2221=Neraca::whereNot('saldo',0)->where('no_akun','2221')->get()->first();
        if($saldo2221==null){
            $fiskal2221=0;
        }else{
            $fiskal2221=$saldo2221->saldo+$debit2221-$kredit2221;
        }
        // 2221
        // 2222
        $asetlancar2222=Neraca::whereNot('saldo',0)->where('no_akun','2222')->get();
        $debit2222=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2222')->sum('nilai_debit');
        $kredit2222=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2222')->sum('nilai_kredit');
        $saldo2222=Neraca::whereNot('saldo',0)->where('no_akun','2222')->get()->first();
        if($saldo2222==null){
            $fiskal2222=0;
        }else{
            $fiskal2222=$saldo2222->saldo+$debit2222-$kredit2222;
        }
        // 2222
        // 2223
        $asetlancar2223=Neraca::whereNot('saldo',0)->where('no_akun','2223')->get();
        $debit2223=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2223')->sum('nilai_debit');
        $kredit2223=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2223')->sum('nilai_kredit');
        $saldo2223=Neraca::whereNot('saldo',0)->where('no_akun','2223')->get()->first();
        if($saldo2223==null){
            $fiskal2223=0;
        }else{
            $fiskal2223=$saldo2223->saldo+$debit2223-$kredit2223;
        }
        // 2223
        // 2224
        $asetlancar2224=Neraca::whereNot('saldo',0)->where('no_akun','2224')->get();
        $debit2224=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2224')->sum('nilai_debit');
        $kredit2224=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2224')->sum('nilai_kredit');
        $saldo2224=Neraca::whereNot('saldo',0)->where('no_akun','2224')->get()->first();
        if($saldo2224==null){
            $fiskal2224=0;
        }else{
            $fiskal2224=$saldo2224->saldo+$debit2224-$kredit2224;
        }
        // 2224
        // 2230
        $asetlancar2230=Neraca::whereNot('saldo',0)->where('no_akun','2230')->get();
        $debit2230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2230')->sum('nilai_debit');
        $kredit2230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2230')->sum('nilai_kredit');
        $saldo2230=Neraca::whereNot('saldo',0)->where('no_akun','2230')->get()->first();
        if($saldo2230==null){
            $fiskal2230=0;
        }else{
            $fiskal2230=$saldo2230->saldo+$debit2230-$kredit2230;
        }
        // 2230
        // 2710
        $asetlancar2710=Neraca::whereNot('saldo',0)->where('no_akun','2710')->get();
        $debit2710=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2710')->sum('nilai_debit');
        $kredit2710=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2710')->sum('nilai_kredit');
        $saldo2710=Neraca::whereNot('saldo',0)->where('no_akun','2710')->get()->first();
        if($saldo2710==null){
            $fiskal2710=0;
        }else{
            $fiskal2710=$saldo2710->saldo+$debit2710-$kredit2710;
        }
        // 2710
        // 2720
        $asetlancar2720=Neraca::whereNot('saldo',0)->where('no_akun','2720')->get();
        $debit2720=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2720')->sum('nilai_debit');
        $kredit2720=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2720')->sum('nilai_kredit');
        $saldo2720=Neraca::whereNot('saldo',0)->where('no_akun','2720')->get()->first();
        if($saldo2720==null){
            $fiskal2720=0;
        }else{
            $fiskal2720=$saldo2720->saldo+$debit2720-$kredit2720;
        }
        // 2720
        // 2730
        $asetlancar2730=Neraca::whereNot('saldo',0)->where('no_akun','2730')->get();
        $debit2730=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2730')->sum('nilai_debit');
        $kredit2730=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2730')->sum('nilai_kredit');
        $saldo2730=Neraca::whereNot('saldo',0)->where('no_akun','2730')->get()->first();
        if($saldo2730==null){
            $fiskal2730=0;
        }else{
            $fiskal2730=$saldo2730->saldo+$debit2730-$kredit2730;
        }
        // 2730
        // 2740
        $asetlancar2740=Neraca::whereNot('saldo',0)->where('no_akun','2740')->get();
        $debit2740=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2740')->sum('nilai_debit');
        $kredit2740=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2740')->sum('nilai_kredit');
        $saldo2740=Neraca::whereNot('saldo',0)->where('no_akun','2740')->get()->first();
        if($saldo2740==null){
            $fiskal2740=0;
        }else{
            $fiskal2740=$saldo2740->saldo+$debit2740-$kredit2740;
        }
        // 2740
        // 2750
        $asetlancar2750=Neraca::whereNot('saldo',0)->where('no_akun','2750')->get();
        $debit2750=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2750')->sum('nilai_debit');
        $kredit2750=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2750')->sum('nilai_kredit');
        $saldo2750=Neraca::whereNot('saldo',0)->where('no_akun','2750')->get()->first();
        if($saldo2750==null){
            $fiskal2750=0;
        }else{
            $fiskal2750=$saldo2750->saldo+$debit2750-$kredit2750;
        }
        // 2750
        // 2760
        $asetlancar2760=Neraca::whereNot('saldo',0)->where('no_akun','2760')->get();
        $debit2760=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2760')->sum('nilai_debit');
        $kredit2760=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2760')->sum('nilai_kredit');
        $saldo2760=Neraca::whereNot('saldo',0)->where('no_akun','2760')->get()->first();
        if($saldo2760==null){
            $fiskal2760=0;
        }else{
            $fiskal2760=$saldo2760->saldo+$debit2760-$kredit2760;
        }
        // 2760
        // 3100
        $asetlancar3100=Neraca::whereNot('saldo',0)->where('no_akun','3100')->get();
        $debit3100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3100')->sum('nilai_debit');
        $kredit3100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3100')->sum('nilai_kredit');
        $saldo3100=Neraca::whereNot('saldo',0)->where('no_akun','3100')->get()->first();
        if($saldo3100==null){
            $fiskal3100=0;
        }else{
            $fiskal3100=$saldo3100->saldo+$debit3100-$kredit3100;
        }
        // 3100
        // 3110
        $asetlancar3110=Neraca::whereNot('saldo',0)->where('no_akun','3110')->get();
        $debit3110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3110')->sum('nilai_debit');
        $kredit3110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3110')->sum('nilai_kredit');
        $saldo3110=Neraca::whereNot('saldo',0)->where('no_akun','3110')->get()->first();
        if($saldo3110==null){
            $fiskal3110=0;
        }else{
            $fiskal3110=$saldo3110->saldo+$debit3110-$kredit3110;
        }
        // 3110
        // 3200
        $asetlancar3200=Neraca::whereNot('saldo',0)->where('no_akun','3200')->get();
        $debit3200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3200')->sum('nilai_debit');
        $kredit3200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3200')->sum('nilai_kredit');
        $saldo3200=Neraca::whereNot('saldo',0)->where('no_akun','3200')->get()->first();
        if($saldo3200==null){
            $fiskal3200=0;
        }else{
            $fiskal3200=$saldo3200->saldo+$debit3200-$kredit3200;
        }
        // 3200
        // 3300
        $asetlancar3300=Neraca::whereNot('saldo',0)->where('no_akun','3300')->get();
        $debit3300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3300')->sum('nilai_debit');
        $kredit3300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3300')->sum('nilai_kredit');
        $saldo3300=Neraca::whereNot('saldo',0)->where('no_akun','3300')->get()->first();
        if($saldo3300==null){
            $fiskal3300=0;
        }else{
            $fiskal3300=$saldo3300->saldo+$debit3300-$kredit3300;
        }
        // 3300

        // $Neracaaset=Neraca::whereNot('saldo',0)->where('no_akun','<','1200')->get();
        // $lineaset=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->whereBetween('created_at',[$mulai,$selesai])->where('no_akun_debit','<','1200')->orWhere('no_akun_kredit','<','1200')->get();
        $totalaktivalancar=Neraca::where('no_akun','<','1500')->whereNot('saldo',0)->sum('saldo');
        $totalaktivalancarfiskal=$fiskal1460+$fiskal1450+$fiskal1440+$fiskal1430+$fiskal1420+$fiskal1410+$fiskal1380+$fiskal1362+$fiskal1361+$fiskal1360+$fiskal1342
        +$fiskal1341+$fiskal1340+$fiskal1330+$fiskal1314+$fiskal1313+$fiskal1312+$fiskal1310+$fiskal1275+$fiskal1274+$fiskal1273+$fiskal1272
        +$fiskal1271+$fiskal1270+$fiskal1260+$fiskal1251+$fiskal1250+$fiskal1240+$fiskal1230+$fiskal1220+$fiskal1210+$fiskal1130+$fiskal1120
        +$fiskal1114+$fiskal1113+$fiskal1112+$fiskal1111+$fiskal1110;
        $nilaiaktivatetap=Neraca::where('no_akun','>','1510')->whereNot('saldo',0)->where('no_akun','<','1550')->sum('saldo');
        $nilaiaktivatetapfiskal=$fiskal1550+$fiskal1540+$fiskal1530+$fiskal1520+$fiskal1510;
        $nilaipenyusutan=Neraca::where('no_akun','>','1550')->whereNot('saldo',0)->where('no_akun','<','1650')->sum('saldo');
        $nilaipenyusutanfiskal=$fiskal1640+$fiskal1630+$fiskal1620+$fiskal1610+$fiskal1600;
        $totalaktivatetap = $nilaiaktivatetap+$nilaipenyusutan;
        $totalaktivatetapfiskal = $nilaiaktivatetapfiskal+$nilaipenyusutanfiskal;
        $totalaktiva = $totalaktivalancar+$totalaktivatetap;
        $totalaktivafiskal = $totalaktivalancarfiskal+$totalaktivatetapfiskal;

        $totalliabilitislancar=Neraca::where('no_akun','>','2100')->where('no_akun','<','2710')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitislancarfiskal=$fiskal2160+$fiskal2150+$fiskal2140+$fiskal2130+$fiskal2120+$fiskal2110+$fiskal2310+$fiskal2330+$fiskal2210+$fiskal2220+$fiskal2221
        +$fiskal2222+$fiskal2223+$fiskal2224+$fiskal2230;
        $totalliabilitisjangkapanjang=Neraca::where('no_akun','>','2700')->where('no_akun','<','2770')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitisjangkapanjangfiskal=$fiskal2710+$fiskal2720+$fiskal2730+$fiskal2740+$fiskal2750+$fiskal2760;
        $totalmodal=Neraca::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->sum('saldo');
        $totalmodalfiskal=$fiskal3100+$fiskal3110+$fiskal3200+$fiskal3300;
        $totalliabilitasmodal = $totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        
        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','<','3300')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','<','3300')->sum('nilai_kredit');
        $totalkomersial=$totalliabilitasmodal+$totaldebit-$totalkredit;
        $data =[
            'title' =>'LAPORAN NERACA FISKAL',
        ];

        $pdf = PDF::loadView('pdf.printpdfneracafiskal',$data,compact( 
            'totalliabilitisjangkapanjang','totalliabilitisjangkapanjangfiskal','totalmodalfiskal',
            'totalaktivalancarfiskal','nilaiaktivatetapfiskal','nilaipenyusutanfiskal','totalaktivafiskal','totalliabilitislancarfiskal',
            'fiskal3300','fiskal3200','fiskal3110','fiskal3100','fiskal2760','fiskal2750','fiskal2740','fiskal2730','fiskal2720','fiskal2710','fiskal2230',
            'fiskal2224','fiskal2223','fiskal2222','fiskal2221','fiskal2220','fiskal2210','fiskal2330','fiskal2320','fiskal2310','fiskal2160','fiskal2150',
            'fiskal2140','fiskal2130','fiskal2120','fiskal2110','fiskal1640','fiskal1630','fiskal1620','fiskal1610','fiskal1600','fiskal1550','fiskal1540',
            'fiskal1530','fiskal1520','fiskal1510','fiskal1460','fiskal1450','fiskal1440','fiskal1430','fiskal1420','fiskal1410','fiskal1380','fiskal1362',
            'fiskal1361','fiskal1360','fiskal1342','fiskal1341','fiskal1340','fiskal1330','fiskal1314','fiskal1313','fiskal1312','fiskal1310','fiskal1275',
            'fiskal1274','fiskal1273','fiskal1272','fiskal1271','fiskal1270','fiskal1260','fiskal1251','fiskal1250','fiskal1240','fiskal1230','fiskal1220',
            'fiskal1210','fiskal1130','fiskal1120','fiskal1114','fiskal1113','fiskal1112','fiskal1111','fiskal1110',
            'totaldebit','totalkredit','totalkomersial',
            'kredit1110','debit1110','asetlancar1110',
            'asetlancar1111','debit1111','kredit1111',
            'asetlancar1112','debit1112','kredit1112',
            'asetlancar1113','debit1113','kredit1113',
            'asetlancar1114','debit1114','kredit1114',
            'asetlancar1120','debit1120','kredit1120',
            'asetlancar1130','debit1130','kredit1130',
            'asetlancar1210','debit1210','kredit1210',
            'asetlancar1220','debit1220','kredit1220',
            'asetlancar1230','debit1230','kredit1230',
            'asetlancar1240','debit1240','kredit1240',
            'asetlancar1250','debit1250','kredit1250',
            'asetlancar1251','debit1251','kredit1251',
            'asetlancar1260','debit1260','kredit1260',
            'asetlancar1270','debit1270','kredit1270',
            'asetlancar1271','debit1271','kredit1271',
            'asetlancar1272','debit1272','kredit1272',
            'asetlancar1273','debit1273','kredit1273',
            'asetlancar1274','debit1274','kredit1274',
            'asetlancar1275','debit1275','kredit1275',
            'asetlancar1310','debit1310','kredit1310',
            'asetlancar1312','debit1312','kredit1312','totalaktivalancar',
            'asetlancar1313','debit1313','kredit1313',
            'asetlancar1314','debit1314','kredit1314',
            'asetlancar1330','debit1330','kredit1330',
            'asetlancar1340','debit1340','kredit1340',
            'asetlancar1341','debit1341','kredit1341',
            'asetlancar1342','debit1342','kredit1342',
            'asetlancar1360','debit1360','kredit1360',
            'asetlancar1361','debit1361','kredit1361',
            'asetlancar1362','debit1362','kredit1362',
            'asetlancar1380','debit1380','kredit1380',
            'asetlancar1410','debit1410','kredit1410',
            'asetlancar1420','debit1420','kredit1420',
            'asetlancar1430','debit1430','kredit1430',
            'asetlancar1440','debit1440','kredit1440',
            'asetlancar1450','debit1450','kredit1450',
            'asetlancar1460','debit1460','kredit1460',
            'asetlancar1510','debit1510','kredit1510',
            'asetlancar1520','debit1520','kredit1520',
            'asetlancar1530','debit1530','kredit1530',
            'asetlancar1540','debit1540','kredit1540',
            'asetlancar1550','debit1550','kredit1550','nilaiaktivatetap',
            'asetlancar1600','debit1600','kredit1600',
            'asetlancar1610','debit1610','kredit1610',
            'asetlancar1620','debit1620','kredit1620',
            'asetlancar1630','debit1630','kredit1630',
            'asetlancar1640','debit1640','kredit1640',
            'asetlancar2110','debit2110','kredit2110','nilaipenyusutan','totalaktivatetap','totalaktiva',
            'asetlancar2120','debit2120','kredit2120',
            'asetlancar2130','debit2130','kredit2130',
            'asetlancar2140','debit2140','kredit2140',
            'asetlancar2150','debit2150','kredit2150',
            'asetlancar2160','debit2160','kredit2160',
            'asetlancar2310','debit2310','kredit2310',
            'asetlancar2320','debit2320','kredit2320',
            'asetlancar2330','debit2330','kredit2330',
            'asetlancar2210','debit2210','kredit2210',
            'asetlancar2220','debit2220','kredit2220',
            'asetlancar2221','debit2221','kredit2221',
            'asetlancar2222','debit2222','kredit2222',
            'asetlancar2223','debit2223','kredit2223',
            'asetlancar2224','debit2224','kredit2224',
            'asetlancar2230','debit2230','kredit2230',
            'asetlancar2710','debit2710','kredit2710','totalliabilitislancar',
            'asetlancar2720','debit2720','kredit2720',
            'asetlancar2730','debit2730','kredit2730',
            'asetlancar2740','debit2740','kredit2740',
            'asetlancar2750','debit2750','kredit2750',
            'asetlancar2760','debit2760','kredit2760',
            'asetlancar3100','debit3100','kredit3100',
            'asetlancar3110','debit3110','kredit3110',
            'asetlancar3200','debit3200','kredit3200',
            'asetlancar3300','debit3300','kredit3300','totalmodal','totalliabilitasmodal'
        ));
        return $pdf->stream('dokumen.pdf'); 

    }
    public function latihanneracafiskalPDF(Request $request){
        $id=Auth::user()->id;

        // 1110
        $asetlancar1110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1110')->get();
        $debit1110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1110')->sum('nilai_debit');
        $kredit1110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1110')->sum('nilai_kredit');
        $saldo1110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1110')->get()->first();
        if($saldo1110==null){
            $fiskal1110=0;
        }else{
            $fiskal1110=$saldo1110->saldo+$debit1110-$kredit1110;
        }
        // 1110
        
        // 1111
        $asetlancar1111=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1111')->get();
        $debit1111=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1111')->sum('nilai_debit');
        $kredit1111=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1111')->sum('nilai_kredit');
        $saldo1111=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1111')->get()->first();
        if($saldo1111==null){
            $fiskal1111=0;
        }else{
            $fiskal1111=$saldo1111->saldo+$debit1111-$kredit1111;
        }
        // 1111
        
        // 1112
        $asetlancar1112=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1112')->get();
        $debit1112=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1112')->sum('nilai_debit');
        $kredit1112=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1112')->sum('nilai_kredit');
        $saldo1112=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1112')->get()->first();
        if($saldo1112==null){
            $fiskal1112=0;
        }else{
            $fiskal1112=$saldo1112->saldo+$debit1112-$kredit1112;
        }
        // 1112

        // 1113
        $asetlancar1113=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1113')->get();
        $debit1113=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1113')->sum('nilai_debit');
        $kredit1113=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1113')->sum('nilai_kredit');
        $saldo1113=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1113')->get()->first();
        if($saldo1113==null){
            $fiskal1113=0;
        }else{
            $fiskal1113=$saldo1113->saldo+$debit1113-$kredit1113;
        }
        // 1113

        // 1114
        $asetlancar1114=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1114')->get();
        $debit1114=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1114')->sum('nilai_debit');
        $kredit1114=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1114')->sum('nilai_kredit');
        $saldo1114=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1114')->get()->first();
        if($saldo1114==null){
            $fiskal1114=0;
        }else{
            $fiskal1114=$saldo1114->saldo+$debit1114-$kredit1114;
        }
        // 1114

        // 1120
        $asetlancar1120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1120')->get();
        $debit1120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1120')->sum('nilai_debit');
        $kredit1120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1120')->sum('nilai_kredit');
        $saldo1120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1120')->get()->first();
        if($saldo1120==null){
            $fiskal1120=0;
        }else{
            $fiskal1120=$saldo1120->saldo+$debit1120-$kredit1120;
        }
        // 1120

        // 1130
        $asetlancar1130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1130')->get();
        $debit1130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1130')->sum('nilai_debit');
        $kredit1130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1130')->sum('nilai_kredit');
        $saldo1130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1130')->get()->first();
        if($saldo1130==null){
            $fiskal1130=0;
        }else{
            $fiskal1130=$saldo1130->saldo+$debit1130-$kredit1130;
        }
        // 1130
        
        // 1210
        $asetlancar1210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1210')->get();
        $debit1210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1210')->sum('nilai_debit');
        $kredit1210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1210')->sum('nilai_kredit');
        $saldo1210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1210')->get()->first();
        if($saldo1210==null){
            $fiskal1210=0;
        }else{
            $fiskal1210=$saldo1210->saldo+$debit1210-$kredit1210;
        }
        // 1210

        // 1220
        $asetlancar1220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1220')->get();
        $debit1220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1220')->sum('nilai_debit');
        $kredit1220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1220')->sum('nilai_kredit');
        $saldo1220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1220')->get()->first();
        if($saldo1220==null){
            $fiskal1220=0;
        }else{
            $fiskal1220=$saldo1220->saldo+$debit1220-$kredit1220;
        }
        // 1220

        // 1230
        $asetlancar1230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1230')->get();
        $debit1230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1230')->sum('nilai_debit');
        $kredit1230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1230')->sum('nilai_kredit');
        $saldo1230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1230')->get()->first();
        if($saldo1230==null){
            $fiskal1230=0;
        }else{
            $fiskal1230=$saldo1230->saldo+$debit1230-$kredit1230;
        }
        // 1230

        // 1240
        $asetlancar1240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1240')->get();
        $debit1240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1240')->sum('nilai_debit');
        $kredit1240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1240')->sum('nilai_kredit');
        $saldo1240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1240')->get()->first();
        if($saldo1240==null){
            $fiskal1240=0;
        }else{
            $fiskal1240=$saldo1240->saldo+$debit1240-$kredit1240;
        }
        // 1240

        // 1250
        $asetlancar1250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1250')->get();
        $debit1250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1250')->sum('nilai_debit');
        $kredit1250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1250')->sum('nilai_kredit');
        $saldo1250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1250')->get()->first();
        if($saldo1250==null){
            $fiskal1250=0;
        }else{
            $fiskal1250=$saldo1250->saldo+$debit1250-$kredit1250;
        }
        // 1250

        // 1251
        $asetlancar1251=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1251')->get();
        $debit1251=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1251')->sum('nilai_debit');
        $kredit1251=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1251')->sum('nilai_kredit');
        $saldo1251=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1251')->get()->first();
        if($saldo1251==null){
            $fiskal1251=0;
        }else{
            $fiskal1251=$saldo1251->saldo+$debit1251-$kredit1251;
        }
        // 1251

        // 1260
        $asetlancar1260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1260')->get();
        $debit1260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1260')->sum('nilai_debit');
        $kredit1260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1260')->sum('nilai_kredit');
        $saldo1260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1260')->get()->first();
        if($saldo1260==null){
            $fiskal1260=0;
        }else{
            $fiskal1260=$saldo1260->saldo+$debit1260-$kredit1260;
        }
        // 1260
        // 1270
        $asetlancar1270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1270')->get();
        $debit1270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1270')->sum('nilai_debit');
        $kredit1270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1270')->sum('nilai_kredit');
        $saldo1270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1270')->get()->first();
        if($saldo1270==null){
            $fiskal1270=0;
        }else{
            $fiskal1270=$saldo1270->saldo+$debit1270-$kredit1270;
        }
        // 1270
        // 1271
        $asetlancar1271=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1271')->get();
        $debit1271=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1271')->sum('nilai_debit');
        $kredit1271=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1271')->sum('nilai_kredit');
        $saldo1271=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1271')->get()->first();
        if($saldo1271==null){
            $fiskal1271=0;
        }else{
            $fiskal1271=$saldo1271->saldo+$debit1271-$kredit1271;
        }
        // 1271
        // 1272
        $asetlancar1272=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1272')->get();
        $debit1272=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1272')->sum('nilai_debit');
        $kredit1272=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1272')->sum('nilai_kredit');
        $saldo1272=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1272')->get()->first();
        if($saldo1272==null){
            $fiskal1272=0;
        }else{
            $fiskal1272=$saldo1272->saldo+$debit1272-$kredit1272;
        }
        // 1272
        // 1273
        $asetlancar1273=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1273')->get();
        $debit1273=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1273')->sum('nilai_debit');
        $kredit1273=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1273')->sum('nilai_kredit');
        $saldo1273=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1273')->get()->first();
        if($saldo1273==null){
            $fiskal1273=0;
        }else{
            $fiskal1273=$saldo1273->saldo+$debit1273-$kredit1273;
        }
        // 1273
        // 1274
        $asetlancar1274=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1274')->get();
        $debit1274=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1274')->sum('nilai_debit');
        $kredit1274=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1274')->sum('nilai_kredit');
        $saldo1274=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1274')->get()->first();
        if($saldo1274==null){
            $fiskal1274=0;
        }else{
            $fiskal1274=$saldo1274->saldo+$debit1274-$kredit1274;
        }
        // 1274
        // 1275
        $asetlancar1275=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1275')->get();
        $debit1275=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1275')->sum('nilai_debit');
        $kredit1275=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1275')->sum('nilai_kredit');
        $saldo1275=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1275')->get()->first();
        if($saldo1275==null){
            $fiskal1275=0;
        }else{
            $fiskal1275=$saldo1275->saldo+$debit1275-$kredit1275;
        }
        // 1275
        // 1310
        $asetlancar1310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1310')->get();
        $debit1310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1310')->sum('nilai_debit');
        $kredit1310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1310')->sum('nilai_kredit');
        $saldo1310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1310')->get()->first();
        if($saldo1310==null){
            $fiskal1310=0;
        }else{
            $fiskal1310=$saldo1310->saldo+$debit1310-$kredit1310;
        }
        // 1310
        // 1312
        $asetlancar1312=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1312')->get();
        $debit1312=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1312')->sum('nilai_debit');
        $kredit1312=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1312')->sum('nilai_kredit');
        $saldo1312=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1312')->get()->first();
        if($saldo1312==null){
            $fiskal1312=0;
        }else{
            $fiskal1312=$saldo1312->saldo+$debit1312-$kredit1312;
        }
        // 1312
        
        // 1313
        $asetlancar1313=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1313')->get();
        $debit1313=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1313')->sum('nilai_debit');
        $kredit1313=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1313')->sum('nilai_kredit');
        $saldo1313=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1313')->get()->first();
        if($saldo1313==null){
            $fiskal1313=0;
        }else{
            $fiskal1313=$saldo1313->saldo+$debit1313-$kredit1313;
        }
        // 1313
        
        // 1314
        $asetlancar1314=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1314')->get();
        $debit1314=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1314')->sum('nilai_debit');
        $kredit1314=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1314')->sum('nilai_kredit');
        $saldo1314=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1314')->get()->first();
        if($saldo1314==null){
            $fiskal1314=0;
        }else{
            $fiskal1314=$saldo1314->saldo+$debit1314-$kredit1314;
        }
        // 1314

        // 1330
        $asetlancar1330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1330')->get();
        $debit1330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1330')->sum('nilai_debit');
        $kredit1330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1330')->sum('nilai_kredit');
        $saldo1330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1330')->get()->first();
        if($saldo1330==null){
            $fiskal1330=0;
        }else{
            $fiskal1330=$saldo1330->saldo+$debit1330-$kredit1330;
        }
        // 1330
        // 1340
        $asetlancar1340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1340')->get();
        $debit1340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1340')->sum('nilai_debit');
        $kredit1340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1340')->sum('nilai_kredit');
        $saldo1340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1340')->get()->first();
        if($saldo1340==null){
            $fiskal1340=0;
        }else{
            $fiskal1340=$saldo1340->saldo+$debit1340-$kredit1340;
        }
        // 1340
        // 1341
        $asetlancar1341=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1341')->get();
        $debit1341=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1341')->sum('nilai_debit');
        $kredit1341=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1341')->sum('nilai_kredit');
        $saldo1341=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1341')->get()->first();
        if($saldo1341==null){
            $fiskal1341=0;
        }else{
            $fiskal1341=$saldo1341->saldo+$debit1341-$kredit1341;
        }
        // 1341
        // 1342
        $asetlancar1342=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1342')->get();
        $debit1342=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1342')->sum('nilai_debit');
        $kredit1342=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1342')->sum('nilai_kredit');
        $saldo1342=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1342')->get()->first();
        if($saldo1342==null){
            $fiskal1342=0;
        }else{
            $fiskal1342=$saldo1342->saldo+$debit1342-$kredit1342;
        }
        // 1342
        // 1360
        $asetlancar1360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1360')->get();
        $debit1360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1360')->sum('nilai_debit');
        $kredit1360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1360')->sum('nilai_kredit');
        $saldo1360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1360')->get()->first();
        if($saldo1360==null){
            $fiskal1360=0;
        }else{
            $fiskal1360=$saldo1360->saldo+$debit1360-$kredit1360;
        }
        // 1360
        // 1361
        $asetlancar1361=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1361')->get();
        $debit1361=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1361')->sum('nilai_debit');
        $kredit1361=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1361')->sum('nilai_kredit');
        $saldo1361=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1361')->get()->first();
        if($saldo1361==null){
            $fiskal1361=0;
        }else{
            $fiskal1361=$saldo1361->saldo+$debit1361-$kredit1361;
        }
        // 1361
        // 1362
        $asetlancar1362=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1362')->get();
        $debit1362=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1362')->sum('nilai_debit');
        $kredit1362=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1362')->sum('nilai_kredit');
        $saldo1362=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1362')->get()->first();
        if($saldo1362==null){
            $fiskal1362=0;
        }else{
            $fiskal1362=$saldo1362->saldo+$debit1362-$kredit1362;
        }
        // 1362
        // 1380
        $asetlancar1380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1380')->get();
        $debit1380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1380')->sum('nilai_debit');
        $kredit1380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1380')->sum('nilai_kredit');
        $saldo1380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1380')->get()->first();
        if($saldo1380==null){
            $fiskal1380=0;
        }else{
            $fiskal1380=$saldo1380->saldo+$debit1380-$kredit1380;
        }
        // 1380
        // 1410
        $asetlancar1410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1410')->get();
        $debit1410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1410')->sum('nilai_debit');
        $kredit1410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1410')->sum('nilai_kredit');
        $saldo1410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1410')->get()->first();
        if($saldo1410==null){
            $fiskal1410=0;
        }else{
            $fiskal1410=$saldo1410->saldo+$debit1410-$kredit1410;
        }
        // 1410
        // 1420
        $asetlancar1420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1420')->get();
        $debit1420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1420')->sum('nilai_debit');
        $kredit1420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1420')->sum('nilai_kredit');
        $saldo1420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1420')->get()->first();
        if($saldo1420==null){
            $fiskal1420=0;
        }else{
            $fiskal1420=$saldo1420->saldo+$debit1420-$kredit1420;
        }
        // 1420
        // 1430
        $asetlancar1430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1430')->get();
        $debit1430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1430')->sum('nilai_debit');
        $kredit1430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1430')->sum('nilai_kredit');
        $saldo1430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1430')->get()->first();
        if($saldo1430==null){
            $fiskal1430=0;
        }else{
            $fiskal1430=$saldo1430->saldo+$debit1430-$kredit1430;
        }
        // 1430
        // 1440
        $asetlancar1440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1440')->get();
        $debit1440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1440')->sum('nilai_debit');
        $kredit1440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1440')->sum('nilai_kredit');
        $saldo1440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1440')->get()->first();
        if($saldo1440==null){
            $fiskal1440=0;
        }else{
            $fiskal1440=$saldo1440->saldo+$debit1440-$kredit1440;
        }
        // 1440
        // 1450
        $asetlancar1450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1450')->get();
        $debit1450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1450')->sum('nilai_debit');
        $kredit1450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1450')->sum('nilai_kredit');
        $saldo1450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1450')->get()->first();
        if($saldo1450==null){
            $fiskal1450=0;
        }else{
            $fiskal1450=$saldo1450->saldo+$debit1450-$kredit1450;
        }
        // 1450
        // 1460
        $asetlancar1460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1460')->get();
        $debit1460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1460')->sum('nilai_debit');
        $kredit1460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1460')->sum('nilai_kredit');
        $saldo1460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1460')->get()->first();
        if($saldo1460==null){
            $fiskal1460=0;
        }else{
            $fiskal1460=$saldo1460->saldo+$debit1460-$kredit1460;
        }
        // 1460

        // 1510
        $asetlancar1510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1510')->get();
        $debit1510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1510')->sum('nilai_debit');
        $kredit1510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1510')->sum('nilai_kredit');
        $saldo1510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1510')->get()->first();
        if($saldo1510==null){
            $fiskal1510=0;
        }else{
            $fiskal1510=$saldo1510->saldo+$debit1510-$kredit1510;
        }
        // 1510

        // 1520
        $asetlancar1520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1520')->get();
        $debit1520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1520')->sum('nilai_debit');
        $kredit1520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1520')->sum('nilai_kredit');
        $saldo1520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1520')->get()->first();
        if($saldo1520==null){
            $fiskal1520=0;
        }else{
            $fiskal1520=$saldo1520->saldo+$debit1520-$kredit1520;
        }
        // 1520

        // 1530
        $asetlancar1530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1530')->get();
        $debit1530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1530')->sum('nilai_debit');
        $kredit1530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1530')->sum('nilai_kredit');
        $saldo1530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1530')->get()->first();
        if($saldo1530==null){
            $fiskal1530=0;
        }else{
            $fiskal1530=$saldo1530->saldo+$debit1530-$kredit1530;
        }
        // 1530

        // 1540
        $asetlancar1540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1540')->get();
        $debit1540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1540')->sum('nilai_debit');
        $kredit1540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1540')->sum('nilai_kredit');
        $saldo1540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1540')->get()->first();
        if($saldo1540==null){
            $fiskal1540=0;
        }else{
            $fiskal1540=$saldo1540->saldo+$debit1540-$kredit1540;
        }
        // 1540
        
        // 1550
        $asetlancar1550=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1550')->get();
        $debit1550=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1550')->sum('nilai_debit');
        $kredit1550=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1550')->sum('nilai_kredit');
        $saldo1550=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1550')->get()->first();
        if($saldo1550==null){
            $fiskal1550=0;
        }else{
            $fiskal1550=$saldo1550->saldo+$debit1550-$kredit1550;
        }
        // 1550

        // 1600
        $asetlancar1600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1600')->get();
        $debit1600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1600')->sum('nilai_debit');
        $kredit1600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1600')->sum('nilai_kredit');
        $saldo1600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1600')->get()->first();
        if($saldo1600==null){
            $fiskal1600=0;
        }else{
            $fiskal1600=$saldo1600->saldo+$debit1600-$kredit1600;
        }
        // 1600
        // 1610
        $asetlancar1610=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1610')->get();
        $debit1610=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1610')->sum('nilai_debit');
        $kredit1610=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1610')->sum('nilai_kredit');
        $saldo1610=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1610')->get()->first();
        if($saldo1610==null){
            $fiskal1610=0;
        }else{
            $fiskal1610=$saldo1610->saldo+$debit1610-$kredit1610;
        }
        // 1610
        // 1620
        $asetlancar1620=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1620')->get();
        $debit1620=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1620')->sum('nilai_debit');
        $kredit1620=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1620')->sum('nilai_kredit');
        $saldo1620=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1620')->get()->first();
        if($saldo1620==null){
            $fiskal1620=0;
        }else{
            $fiskal1620=$saldo1620->saldo+$debit1620-$kredit1620;
        }
        // 1620
        // 1630
        $asetlancar1630=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1630')->get();
        $debit1630=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1630')->sum('nilai_debit');
        $kredit1630=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1630')->sum('nilai_kredit');
        $saldo1630=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1630')->get()->first();
        if($saldo1630==null){
            $fiskal1630=0;
        }else{
            $fiskal1630=$saldo1630->saldo+$debit1630-$kredit1630;
        }
        // 1630
        // 1640
        $asetlancar1640=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1640')->get();
        $debit1640=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1640')->sum('nilai_debit');
        $kredit1640=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1640')->sum('nilai_kredit');
        $saldo1640=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1640')->get()->first();
        if($saldo1640==null){
            $fiskal1640=0;
        }else{
            $fiskal1640=$saldo1640->saldo+$debit1640-$kredit1640;
        }
        // 1640
        // 2110
        $asetlancar2110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2110')->get();
        $debit2110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2110')->sum('nilai_debit');
        $kredit2110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2110')->sum('nilai_kredit');
        $saldo2110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2110')->get()->first();
        if($saldo2110==null){
            $fiskal2110=0;
        }else{
            $fiskal2110=$saldo2110->saldo+$debit2110-$kredit2110;
        }
        // 2110
        // 2120
        $asetlancar2120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2120')->get();
        $debit2120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2120')->sum('nilai_debit');
        $kredit2120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2120')->sum('nilai_kredit');
        $saldo2120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2120')->get()->first();
        if($saldo2120==null){
            $fiskal2120=0;
        }else{
            $fiskal2120=$saldo2120->saldo+$debit2120-$kredit2120;
        }
        // 2120
        // 2130
        $asetlancar2130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2130')->get();
        $debit2130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2130')->sum('nilai_debit');
        $kredit2130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2130')->sum('nilai_kredit');
        $saldo2130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2130')->get()->first();
        if($saldo2130==null){
            $fiskal2130=0;
        }else{
            $fiskal2130=$saldo2130->saldo+$debit2130-$kredit2130;
        }
        // 2130
        // 2140
        $asetlancar2140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2140')->get();
        $debit2140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2140')->sum('nilai_debit');
        $kredit2140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2140')->sum('nilai_kredit');
        $saldo2140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2140')->get()->first();
        if($saldo2140==null){
            $fiskal2140=0;
        }else{
            $fiskal2140=$saldo2140->saldo+$debit2140-$kredit2140;
        }
        // 2140
        // 2150
        $asetlancar2150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2150')->get();
        $debit2150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2150')->sum('nilai_debit');
        $kredit2150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2150')->sum('nilai_kredit');
        $saldo2150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2150')->get()->first();
        if($saldo2150==null){
            $fiskal2150=0;
        }else{
            $fiskal2150=$saldo2150->saldo+$debit2150-$kredit2150;
        }
        // 2150
        // 2160
        $asetlancar2160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2160')->get();
        $debit2160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2160')->sum('nilai_debit');
        $kredit2160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2160')->sum('nilai_kredit');
        $saldo2160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2160')->get()->first();
        if($saldo2160==null){
            $fiskal2160=0;
        }else{
            $fiskal2160=$saldo2160->saldo+$debit2160-$kredit2160;
        }
        // 2160
        // 2310
        $asetlancar2310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2310')->get();
        $debit2310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2310')->sum('nilai_debit');
        $kredit2310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2310')->sum('nilai_kredit');
        $saldo2310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2310')->get()->first();
        if($saldo2310==null){
            $fiskal2310=0;
        }else{
            $fiskal2310=$saldo2310->saldo+$debit2310-$kredit2310;
        }
        // 2310
        // 2320
        $asetlancar2320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2320')->get();
        $debit2320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2320')->sum('nilai_debit');
        $kredit2320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2320')->sum('nilai_kredit');
        $saldo2320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2320')->get()->first();
        if($saldo2320==null){
            $fiskal2320=0;
        }else{
            $fiskal2320=$saldo2320->saldo+$debit2320-$kredit2320;
        }
        // 2320

        // 2330
        $asetlancar2330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2330')->get();
        $debit2330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2330')->sum('nilai_debit');
        $kredit2330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2330')->sum('nilai_kredit');
        $saldo2330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2330')->get()->first();
        if($saldo2330==null){
            $fiskal2330=0;
        }else{
            $fiskal2330=$saldo2330->saldo+$debit2330-$kredit2330;
        }
        // 2330

        // 2210
        $asetlancar2210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2210')->get();
        $debit2210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2210')->sum('nilai_debit');
        $kredit2210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2210')->sum('nilai_kredit');
        $saldo2210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2210')->get()->first();
        if($saldo2210==null){
            $fiskal2210=0;
        }else{
            $fiskal2210=$saldo2210->saldo+$debit2210-$kredit2210;
        }
        // 2210
        // 2220
        $asetlancar2220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2220')->get();
        $debit2220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2220')->sum('nilai_debit');
        $kredit2220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2220')->sum('nilai_kredit');
        $saldo2220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2220')->get()->first();
        if($saldo2220==null){
            $fiskal2220=0;
        }else{
            $fiskal2220=$saldo2220->saldo+$debit2220-$kredit2220;
        }
        // 2220
        // 2221
        $asetlancar2221=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2221')->get();
        $debit2221=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2221')->sum('nilai_debit');
        $kredit2221=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2221')->sum('nilai_kredit');
        $saldo2221=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2221')->get()->first();
        if($saldo2221==null){
            $fiskal2221=0;
        }else{
            $fiskal2221=$saldo2221->saldo+$debit2221-$kredit2221;
        }
        // 2221
        // 2222
        $asetlancar2222=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2222')->get();
        $debit2222=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2222')->sum('nilai_debit');
        $kredit2222=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2222')->sum('nilai_kredit');
        $saldo2222=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2222')->get()->first();
        if($saldo2222==null){
            $fiskal2222=0;
        }else{
            $fiskal2222=$saldo2222->saldo+$debit2222-$kredit2222;
        }
        // 2222
        // 2223
        $asetlancar2223=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2223')->get();
        $debit2223=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2223')->sum('nilai_debit');
        $kredit2223=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2223')->sum('nilai_kredit');
        $saldo2223=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2223')->get()->first();
        if($saldo2223==null){
            $fiskal2223=0;
        }else{
            $fiskal2223=$saldo2223->saldo+$debit2223-$kredit2223;
        }
        // 2223
        // 2224
        $asetlancar2224=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2224')->get();
        $debit2224=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2224')->sum('nilai_debit');
        $kredit2224=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2224')->sum('nilai_kredit');
        $saldo2224=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2224')->get()->first();
        if($saldo2224==null){
            $fiskal2224=0;
        }else{
            $fiskal2224=$saldo2224->saldo+$debit2224-$kredit2224;
        }
        // 2224
        // 2230
        $asetlancar2230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2230')->get();
        $debit2230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2230')->sum('nilai_debit');
        $kredit2230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2230')->sum('nilai_kredit');
        $saldo2230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2230')->get()->first();
        if($saldo2230==null){
            $fiskal2230=0;
        }else{
            $fiskal2230=$saldo2230->saldo+$debit2230-$kredit2230;
        }
        // 2230
        // 2710
        $asetlancar2710=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2710')->get();
        $debit2710=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2710')->sum('nilai_debit');
        $kredit2710=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2710')->sum('nilai_kredit');
        $saldo2710=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2710')->get()->first();
        if($saldo2710==null){
            $fiskal2710=0;
        }else{
            $fiskal2710=$saldo2710->saldo+$debit2710-$kredit2710;
        }
        // 2710
        // 2720
        $asetlancar2720=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2720')->get();
        $debit2720=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2720')->sum('nilai_debit');
        $kredit2720=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2720')->sum('nilai_kredit');
        $saldo2720=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2720')->get()->first();
        if($saldo2720==null){
            $fiskal2720=0;
        }else{
            $fiskal2720=$saldo2720->saldo+$debit2720-$kredit2720;
        }
        // 2720
        // 2730
        $asetlancar2730=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2730')->get();
        $debit2730=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2730')->sum('nilai_debit');
        $kredit2730=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2730')->sum('nilai_kredit');
        $saldo2730=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2730')->get()->first();
        if($saldo2730==null){
            $fiskal2730=0;
        }else{
            $fiskal2730=$saldo2730->saldo+$debit2730-$kredit2730;
        }
        // 2730
        // 2740
        $asetlancar2740=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2740')->get();
        $debit2740=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2740')->sum('nilai_debit');
        $kredit2740=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2740')->sum('nilai_kredit');
        $saldo2740=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2740')->get()->first();
        if($saldo2740==null){
            $fiskal2740=0;
        }else{
            $fiskal2740=$saldo2740->saldo+$debit2740-$kredit2740;
        }
        // 2740
        // 2750
        $asetlancar2750=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2750')->get();
        $debit2750=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2750')->sum('nilai_debit');
        $kredit2750=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2750')->sum('nilai_kredit');
        $saldo2750=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2750')->get()->first();
        if($saldo2750==null){
            $fiskal2750=0;
        }else{
            $fiskal2750=$saldo2750->saldo+$debit2750-$kredit2750;
        }
        // 2750
        // 2760
        $asetlancar2760=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2760')->get();
        $debit2760=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2760')->sum('nilai_debit');
        $kredit2760=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2760')->sum('nilai_kredit');
        $saldo2760=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2760')->get()->first();
        if($saldo2760==null){
            $fiskal2760=0;
        }else{
            $fiskal2760=$saldo2760->saldo+$debit2760-$kredit2760;
        }
        // 2760
        // 3100
        $asetlancar3100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3100')->get();
        $debit3100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3100')->sum('nilai_debit');
        $kredit3100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3100')->sum('nilai_kredit');
        $saldo3100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3100')->get()->first();
        if($saldo3100==null){
            $fiskal3100=0;
        }else{
            $fiskal3100=$saldo3100->saldo+$debit3100-$kredit3100;
        }
        // 3100
        // 3110
        $asetlancar3110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3110')->get();
        $debit3110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3110')->sum('nilai_debit');
        $kredit3110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3110')->sum('nilai_kredit');
        $saldo3110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3110')->get()->first();
        if($saldo3110==null){
            $fiskal3110=0;
        }else{
            $fiskal3110=$saldo3110->saldo+$debit3110-$kredit3110;
        }
        // 3110
        // 3200
        $asetlancar3200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3200')->get();
        $debit3200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3200')->sum('nilai_debit');
        $kredit3200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3200')->sum('nilai_kredit');
        $saldo3200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3200')->get()->first();
        if($saldo3200==null){
            $fiskal3200=0;
        }else{
            $fiskal3200=$saldo3200->saldo+$debit3200-$kredit3200;
        }
        // 3200
        // 3300
        $asetlancar3300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3300')->get();
        $debit3300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3300')->sum('nilai_debit');
        $kredit3300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3300')->sum('nilai_kredit');
        $saldo3300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3300')->get()->first();
        if($saldo3300==null){
            $fiskal3300=0;
        }else{
            $fiskal3300=$saldo3300->saldo+$debit3300-$kredit3300;
        }
        // 3300

        // $LatihanKeuanganaset=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','<','1200')->get();
        // $lineaset=JurnalManual::where('attribute1',$id)->where('attribute3',1)->whereBetween('created_at',[$mulai,$selesai])->where('no_akun_debit','<','1200')->orWhere('no_akun_kredit','<','1200')->get();
        $totalaktivalancar=LatihanKeuangan::where('no_akun','<','1500')->whereNot('saldo',0)->sum('saldo');
        $totalaktivalancarfiskal=$fiskal1460+$fiskal1450+$fiskal1440+$fiskal1430+$fiskal1420+$fiskal1410+$fiskal1380+$fiskal1362+$fiskal1361+$fiskal1360+$fiskal1342
        +$fiskal1341+$fiskal1340+$fiskal1330+$fiskal1314+$fiskal1313+$fiskal1312+$fiskal1310+$fiskal1275+$fiskal1274+$fiskal1273+$fiskal1272
        +$fiskal1271+$fiskal1270+$fiskal1260+$fiskal1251+$fiskal1250+$fiskal1240+$fiskal1230+$fiskal1220+$fiskal1210+$fiskal1130+$fiskal1120
        +$fiskal1114+$fiskal1113+$fiskal1112+$fiskal1111+$fiskal1110;
        $nilaiaktivatetap=LatihanKeuangan::where('no_akun','>','1510')->whereNot('saldo',0)->where('no_akun','<','1550')->sum('saldo');
        $nilaiaktivatetapfiskal=$fiskal1550+$fiskal1540+$fiskal1530+$fiskal1520+$fiskal1510;
        $nilaipenyusutan=LatihanKeuangan::where('no_akun','>','1550')->whereNot('saldo',0)->where('no_akun','<','1650')->sum('saldo');
        $nilaipenyusutanfiskal=$fiskal1640+$fiskal1630+$fiskal1620+$fiskal1610+$fiskal1600;
        $totalaktivatetap = $nilaiaktivatetap+$nilaipenyusutan;
        $totalaktivatetapfiskal = $nilaiaktivatetapfiskal+$nilaipenyusutanfiskal;
        $totalaktiva = $totalaktivalancar+$totalaktivatetap;
        $totalaktivafiskal = $totalaktivalancarfiskal+$totalaktivatetapfiskal;

        $totalliabilitislancar=LatihanKeuangan::where('no_akun','>','2100')->where('no_akun','<','2710')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitislancarfiskal=$fiskal2160+$fiskal2150+$fiskal2140+$fiskal2130+$fiskal2120+$fiskal2110+$fiskal2310+$fiskal2330+$fiskal2210+$fiskal2220+$fiskal2221
        +$fiskal2222+$fiskal2223+$fiskal2224+$fiskal2230;
        $totalliabilitisjangkapanjang=LatihanKeuangan::where('no_akun','>','2700')->where('no_akun','<','2770')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitisjangkapanjangfiskal=$fiskal2710+$fiskal2720+$fiskal2730+$fiskal2740+$fiskal2750+$fiskal2760;
        $totalmodal=LatihanKeuangan::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->sum('saldo');
        $totalmodalfiskal=$fiskal3100+$fiskal3110+$fiskal3200+$fiskal3300;
        $totalliabilitasmodal = $totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        
        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','<','3300')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','<','3300')->sum('nilai_kredit');
        $totalkomersial=$totalliabilitasmodal+$totaldebit-$totalkredit;
        $data =[
            'title' =>'LAPORAN NERACA FISKAL',
        ];
        $pdf = PDF::loadView('pdf.printpdflatihanneracafiskal',$data,compact( 
            'totalliabilitisjangkapanjang','totalliabilitisjangkapanjangfiskal','totalmodalfiskal',
            'totalaktivalancarfiskal','nilaiaktivatetapfiskal','nilaipenyusutanfiskal','totalaktivafiskal','totalliabilitislancarfiskal',
            'fiskal3300','fiskal3200','fiskal3110','fiskal3100','fiskal2760','fiskal2750','fiskal2740','fiskal2730','fiskal2720','fiskal2710','fiskal2230',
            'fiskal2224','fiskal2223','fiskal2222','fiskal2221','fiskal2220','fiskal2210','fiskal2330','fiskal2320','fiskal2310','fiskal2160','fiskal2150',
            'fiskal2140','fiskal2130','fiskal2120','fiskal2110','fiskal1640','fiskal1630','fiskal1620','fiskal1610','fiskal1600','fiskal1550','fiskal1540',
            'fiskal1530','fiskal1520','fiskal1510','fiskal1460','fiskal1450','fiskal1440','fiskal1430','fiskal1420','fiskal1410','fiskal1380','fiskal1362',
            'fiskal1361','fiskal1360','fiskal1342','fiskal1341','fiskal1340','fiskal1330','fiskal1314','fiskal1313','fiskal1312','fiskal1310','fiskal1275',
            'fiskal1274','fiskal1273','fiskal1272','fiskal1271','fiskal1270','fiskal1260','fiskal1251','fiskal1250','fiskal1240','fiskal1230','fiskal1220',
            'fiskal1210','fiskal1130','fiskal1120','fiskal1114','fiskal1113','fiskal1112','fiskal1111','fiskal1110',
            'totaldebit','totalkredit','totalkomersial',
            'kredit1110','debit1110','asetlancar1110',
            'asetlancar1111','debit1111','kredit1111',
            'asetlancar1112','debit1112','kredit1112',
            'asetlancar1113','debit1113','kredit1113',
            'asetlancar1114','debit1114','kredit1114',
            'asetlancar1120','debit1120','kredit1120',
            'asetlancar1130','debit1130','kredit1130',
            'asetlancar1210','debit1210','kredit1210',
            'asetlancar1220','debit1220','kredit1220',
            'asetlancar1230','debit1230','kredit1230',
            'asetlancar1240','debit1240','kredit1240',
            'asetlancar1250','debit1250','kredit1250',
            'asetlancar1251','debit1251','kredit1251',
            'asetlancar1260','debit1260','kredit1260',
            'asetlancar1270','debit1270','kredit1270',
            'asetlancar1271','debit1271','kredit1271',
            'asetlancar1272','debit1272','kredit1272',
            'asetlancar1273','debit1273','kredit1273',
            'asetlancar1274','debit1274','kredit1274',
            'asetlancar1275','debit1275','kredit1275',
            'asetlancar1310','debit1310','kredit1310',
            'asetlancar1312','debit1312','kredit1312','totalaktivalancar',
            'asetlancar1313','debit1313','kredit1313',
            'asetlancar1314','debit1314','kredit1314',
            'asetlancar1330','debit1330','kredit1330',
            'asetlancar1340','debit1340','kredit1340',
            'asetlancar1341','debit1341','kredit1341',
            'asetlancar1342','debit1342','kredit1342',
            'asetlancar1360','debit1360','kredit1360',
            'asetlancar1361','debit1361','kredit1361',
            'asetlancar1362','debit1362','kredit1362',
            'asetlancar1380','debit1380','kredit1380',
            'asetlancar1410','debit1410','kredit1410',
            'asetlancar1420','debit1420','kredit1420',
            'asetlancar1430','debit1430','kredit1430',
            'asetlancar1440','debit1440','kredit1440',
            'asetlancar1450','debit1450','kredit1450',
            'asetlancar1460','debit1460','kredit1460',
            'asetlancar1510','debit1510','kredit1510',
            'asetlancar1520','debit1520','kredit1520',
            'asetlancar1530','debit1530','kredit1530',
            'asetlancar1540','debit1540','kredit1540',
            'asetlancar1550','debit1550','kredit1550','nilaiaktivatetap',
            'asetlancar1600','debit1600','kredit1600',
            'asetlancar1610','debit1610','kredit1610',
            'asetlancar1620','debit1620','kredit1620',
            'asetlancar1630','debit1630','kredit1630',
            'asetlancar1640','debit1640','kredit1640',
            'asetlancar2110','debit2110','kredit2110','nilaipenyusutan','totalaktivatetap','totalaktiva',
            'asetlancar2120','debit2120','kredit2120',
            'asetlancar2130','debit2130','kredit2130',
            'asetlancar2140','debit2140','kredit2140',
            'asetlancar2150','debit2150','kredit2150',
            'asetlancar2160','debit2160','kredit2160',
            'asetlancar2310','debit2310','kredit2310',
            'asetlancar2320','debit2320','kredit2320',
            'asetlancar2330','debit2330','kredit2330',
            'asetlancar2210','debit2210','kredit2210',
            'asetlancar2220','debit2220','kredit2220',
            'asetlancar2221','debit2221','kredit2221',
            'asetlancar2222','debit2222','kredit2222',
            'asetlancar2223','debit2223','kredit2223',
            'asetlancar2224','debit2224','kredit2224',
            'asetlancar2230','debit2230','kredit2230',
            'asetlancar2710','debit2710','kredit2710','totalliabilitislancar',
            'asetlancar2720','debit2720','kredit2720',
            'asetlancar2730','debit2730','kredit2730',
            'asetlancar2740','debit2740','kredit2740',
            'asetlancar2750','debit2750','kredit2750',
            'asetlancar2760','debit2760','kredit2760',
            'asetlancar3100','debit3100','kredit3100',
            'asetlancar3110','debit3110','kredit3110',
            'asetlancar3200','debit3200','kredit3200',
            'asetlancar3300','debit3300','kredit3300','totalmodal','totalliabilitasmodal'
        ));
        return $pdf->stream('dokumen.pdf'); 

    }
    public function latihanlabarugifiskalPDF(Request $request){ 
        $id=Auth::user()->id;

        // 4100
        $asetlancar4100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4100')->get();
        $debit4100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4100')->sum('nilai_debit');
        $kredit4100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4100')->sum('nilai_kredit');
        $saldo4100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4100')->get()->first();
        if($saldo4100==null){
            $fiskal4100=0;
        }else{
            $fiskal4100=$saldo4100->saldo+$debit4100-$kredit4100;
        }
        // 4100
         // 4101
         $asetlancar4101=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4101')->get();
         $debit4101=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4101')->sum('nilai_debit');
         $kredit4101=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4101')->sum('nilai_kredit');
         $saldo4101=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4101')->get()->first();
        if($saldo4101==null){
            $fiskal4101=0;
        }else{
            $fiskal4101=$saldo4101->saldo + $debit4101 - $kredit4101;
        }
         // 4101
        // 4102
        $asetlancar4102=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4102')->get();
        $debit4102=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4102')->sum('nilai_debit');
        $kredit4102=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4102')->sum('nilai_kredit');
        $saldo4102=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4102')->get()->first();
        if($saldo4102==null){
            $fiskal4102=0;
        }else{
           $fiskal4102=$saldo4102->saldo + $debit4102 - $kredit4102;
        }
        // 4102
        // 4103
        $asetlancar4103=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4103')->get();
        $debit4103=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4103')->sum('nilai_debit');
        $kredit4103=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4103')->sum('nilai_kredit');
        $saldo4103=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4103')->get()->first();
		if($saldo4103==null){
            $fiskal4103=0;
        }else{
           $fiskal4103=$saldo4103->saldo + $debit4103 - $kredit4103;
        }

        // 4103
        // 4104
        $asetlancar4104=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4104')->get();
        $debit4104=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4104')->sum('nilai_debit');
        $kredit4104=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4104')->sum('nilai_kredit');
        $saldo4104=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4104')->get()->first();
        if($saldo4104==null){
            $fiskal4104=0;
        }else{
           $fiskal4104=$saldo4104->saldo + $debit4104 - $kredit4104;
        }
        // 4104

        // 4200
        $asetlancar4200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4200')->get();
        $debit4200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4200')->sum('nilai_debit');
        $kredit4200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4200')->sum('nilai_kredit');
        $saldo4200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4200')->get()->first();
        if($saldo4200==null){
            $fiskal4200=0;
        }else{
           $fiskal4200=$saldo4200->saldo + $debit4200 - $kredit4200;
        } 
        // 4200
        // 4201
        $asetlancar4201=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4201')->get();
        $debit4201=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4201')->sum('nilai_debit');
        $kredit4201=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4201')->sum('nilai_kredit');
        $saldo4201=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4201')->get()->first();
        if($saldo4201==null){
            $fiskal4201=0;
        }else{
           $fiskal4201=$saldo4201->saldo + $debit4201 - $kredit4201;
        }
        // 4201

        // 4202
        $asetlancar4202=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4202')->get();
        $debit4202=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4202')->sum('nilai_debit');
        $kredit4202=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4202')->sum('nilai_kredit');
        $saldo4202=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4202')->get()->first();
        if($saldo4202==null){
            $fiskal4202=0;
        }else{
           $fiskal4202=$saldo4202->saldo + $debit4202 - $kredit4202;
        }        
        // 4202

        // 4203
        $asetlancar4203=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4203')->get();
        $debit4203=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4203')->sum('nilai_debit');
        $kredit4203=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4203')->sum('nilai_kredit');
        $saldo4203=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4203')->get()->first();
        if($saldo4203==null){
            $fiskal4203=0;
        }else{
           $fiskal4203=$saldo4203->saldo + $debit4203 - $kredit4203;
        }        
        // 4203

        // 4300
        $asetlancar4300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4300')->get();
        $debit4300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4300')->sum('nilai_debit');
        $kredit4300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4300')->sum('nilai_kredit');
        $saldo4300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4300')->get()->first();
        if($saldo4300==null){
            $fiskal4300=0;
        }else{
           $fiskal4300=$saldo4300->saldo + $debit4300 - $kredit4300;
        }        
        // 4300

        // 4310
        $asetlancar4310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4310')->get();
        $debit4310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4310')->sum('nilai_debit');
        $kredit4310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4310')->sum('nilai_kredit');
        $saldo4310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4310')->get()->first();
		if($saldo4310==null){
            $fiskal4310=0;
        }else{
           $fiskal4310=$saldo4310->saldo + $debit4310 - $kredit4310;
        }        
        // 4310

        // 4320
        $asetlancar4320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4320')->get();
        $debit4320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4320')->sum('nilai_debit');
        $kredit4320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4320')->sum('nilai_kredit');
        $saldo4320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4320')->get()->first();
        if($saldo4320==null){
            $fiskal4320=0;
        }else{
           $fiskal4320=$saldo4320->saldo + $debit4320 - $kredit4320;
        }                
        // 4320

        // 4330
        $asetlancar4330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4330')->get();
        $debit4330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4330')->sum('nilai_debit');
        $kredit4330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4330')->sum('nilai_kredit');
        $saldo4330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4330')->get()->first();
        if($saldo4330==null){
            $fiskal4330=0;
        }else{
           $fiskal4330=$saldo4330->saldo + $debit4330 - $kredit4330;
        }                
        // 4330

        // 4340
        $asetlancar4340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4340')->get();
        $debit4340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4340')->sum('nilai_debit');
        $kredit4340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4340')->sum('nilai_kredit');
        $saldo4340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4340')->get()->first();
        if($saldo4340==null){
            $fiskal4340=0;
        }else{
           $fiskal4340=$saldo4340->saldo + $debit4340 - $kredit4340;
        }                
        // 4340

        // 4350
        $asetlancar4350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4350')->get();
        $debit4350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4350')->sum('nilai_debit');
        $kredit4350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4350')->sum('nilai_kredit');
        $saldo4350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4350')->get()->first();
        if($saldo4350==null){
            $fiskal4350=0;
        }else{
           $fiskal4350=$saldo4350->saldo + $debit4350 - $kredit4350;
        }                
        // 4350

        // 4105
        $asetlancar4105=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4105')->get();
        $debit4105=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4105')->sum('nilai_debit');
        $kredit4105=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4105')->sum('nilai_kredit');
        $saldo4105=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4105')->get()->first();
        if($saldo4105==null){
            $fiskal4105=0;
        }else{
           $fiskal4105=$saldo4105->saldo + $debit4105 - $kredit4105;
        }                
        // 4105

        // 5100
        $asetlancar5100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5100')->get();
        $debit5100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5100')->sum('nilai_debit');
        $kredit5100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5100')->sum('nilai_kredit');
        $saldo5100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5100')->get()->first();
        if($saldo5100==null){
            $fiskal5100=0;
        }else{
           $fiskal5100=$saldo5100->saldo - $debit5100 + $kredit5100;
        }        
        // 5100

        // 5110
        $asetlancar5110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5110')->get();
        $debit5110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5110')->sum('nilai_debit');
        $kredit5110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5110')->sum('nilai_kredit');
        $saldo5110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5110')->get()->first();
        if($saldo5110==null){
            $fiskal5110=0;
        }else{
           $fiskal5110=$saldo5110->saldo - $debit5110 + $kredit5110;
        }                
        // 5110

        // 5120
        $asetlancar5120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5120')->get();
        $debit5120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5120')->sum('nilai_debit');
        $kredit5120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5120')->sum('nilai_kredit');
        $saldo5120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5120')->get()->first();
        if($saldo5120==null){
            $fiskal5120=0;
        }else{
           $fiskal5120=$saldo5120->saldo - $debit5120 + $kredit5120;
        }                
        // 5120

        // 5200
        $asetlancar5200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5200')->get();
        $debit5200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5200')->sum('nilai_debit');
        $kredit5200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5200')->sum('nilai_kredit');
        $saldo5200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5200')->get()->first();
        if($saldo5200==null){
            $fiskal5200=0;
        }else{
           $fiskal5200=$saldo5200->saldo - $debit5200 + $kredit5200;
        }                
        // 5200

        // 5210
        $asetlancar5210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5210')->get();
        $debit5210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5210')->sum('nilai_debit');
        $kredit5210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5210')->sum('nilai_kredit');
        $saldo5210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5210')->get()->first();
        if($saldo5210==null){
            $fiskal5210=0;
        }else{
           $fiskal5210=$saldo5210->saldo - $debit5210 + $kredit5210;
        }                
        // 5210

        // 5211
        $asetlancar5211=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5211')->get();
        $debit5211=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5211')->sum('nilai_debit');
        $kredit5211=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5211')->sum('nilai_kredit');
        $saldo5211=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5211')->get()->first();
        if($saldo5211==null){
            $fiskal5211=0;
        }else{
           $fiskal5211=$saldo5211->saldo - $debit5211 + $kredit5211;
        }        
        // 5211

        // 5212
        $asetlancar5212=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5212')->get();
        $debit5212=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5212')->sum('nilai_debit');
        $kredit5212=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5212')->sum('nilai_kredit');
        $saldo5212=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5212')->get()->first();
        if($saldo5212==null){
            $fiskal5212=0;
        }else{
           $fiskal5212=$saldo5212->saldo - $debit5212 + $kredit5212;
        }                
        // 5212

        // 5213
        $asetlancar5213=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5213')->get();
        $debit5213=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5213')->sum('nilai_debit');
        $kredit5213=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5213')->sum('nilai_kredit');
        $saldo5213=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5213')->get()->first();
        if($saldo5213==null){
            $fiskal5213=0;
        }else{
           $fiskal5213=$saldo5213->saldo - $debit5213 + $kredit5213;
        }                
        // 5213

        // 5250
        $asetlancar5250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5250')->get();
        $debit5250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5250')->sum('nilai_debit');
        $kredit5250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5250')->sum('nilai_kredit');
        $saldo5250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5250')->get()->first();
        if($saldo5250==null){
            $fiskal5250=0;
        }else{
           $fiskal5250=$saldo5250->saldo - $debit5250 + $kredit5250;
        }                
        // 5250

        // 5260
        $asetlancar5260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5260')->get();
        $debit5260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5260')->sum('nilai_debit');
        $kredit5260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5260')->sum('nilai_kredit');
        $saldo5260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5260')->get()->first();
        if($saldo5260==null){
            $fiskal5260=0;
        }else{
           $fiskal5260=$saldo5260->saldo - $debit5260 + $kredit5260;
        }                
        // 5260

        // 5300
        $asetlancar5300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5300')->get();
        $debit5300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5300')->sum('nilai_debit');
        $kredit5300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5300')->sum('nilai_kredit');
        $saldo5300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5300')->get()->first();
        if($saldo5300==null){
            $fiskal5300=0;
        }else{
           $fiskal5300=$saldo5300->saldo - $debit5300 + $kredit5300;
        }                
        // 5300

        // 5400
        $asetlancar5400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5400')->get();
        $debit5400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5400')->sum('nilai_debit');
        $kredit5400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5400')->sum('nilai_kredit');
        $saldo5400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5400')->get()->first();
        if($saldo5400==null){
            $fiskal5400=0;
        }else{
           $fiskal5400=$saldo5400->saldo - $debit5400 + $kredit5400;
        }                
        // 5400

        // 5410
        $asetlancar5410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5410')->get();
        $debit5410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5410')->sum('nilai_debit');
        $kredit5410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5410')->sum('nilai_kredit');
        $saldo5410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5410')->get()->first();
        if($saldo5410==null){
            $fiskal5410=0;
        }else{
           $fiskal5410=$saldo5410->saldo - $debit5410 + $kredit5410;
        }                
        // 5410

        // 5420
        $asetlancar5420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5420')->get();
        $debit5420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5420')->sum('nilai_debit');
        $kredit5420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5420')->sum('nilai_kredit');
        $saldo5420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5420')->get()->first();
        if($saldo5420==null){
            $fiskal5420=0;
        }else{
           $fiskal5420=$saldo5420->saldo - $debit5420 + $kredit5420;
        }                
        // 5420

        // 5430
        $asetlancar5430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5430')->get();
        $debit5430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5430')->sum('nilai_debit');
        $kredit5430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5430')->sum('nilai_kredit');
        $saldo5430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5430')->get()->first();
        if($saldo5430==null){
            $fiskal5430=0;
        }else{
           $fiskal5430=$saldo5430->saldo - $debit5430 + $kredit5430;
        }                
        // 5430

        // 5440
        $asetlancar5440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5440')->get();
        $debit5440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5440')->sum('nilai_debit');
        $kredit5440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5440')->sum('nilai_kredit');
        $saldo5440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5440')->get()->first();
        if($saldo5440==null){
            $fiskal5440=0;
        }else{
           $fiskal5440=$saldo5440->saldo - $debit5440 + $kredit5440;
        }                
        // 5440

        // 5450
        $asetlancar5450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5450')->get();
        $debit5450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5450')->sum('nilai_debit');
        $kredit5450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5450')->sum('nilai_kredit');
        $saldo5450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5450')->get()->first();
        if($saldo5450==null){
            $fiskal5450=0;
        }else{
           $fiskal5450=$saldo5450->saldo - $debit5450 + $kredit5450;
        }                
        // 5450

        // 5460
        $asetlancar5460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5460')->get();
        $debit5460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5460')->sum('nilai_debit');
        $kredit5460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5460')->sum('nilai_kredit');
        $saldo5460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5460')->get()->first();
        if($saldo5460==null){
            $fiskal5460=0;
        }else{
           $fiskal5460=$saldo5460->saldo - $debit5460 + $kredit5460;
        }                
        // 5460

        // 5470
        $asetlancar5470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5470')->get();
        $debit5470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5470')->sum('nilai_debit');
        $kredit5470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5470')->sum('nilai_kredit');
        $saldo5470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5470')->get()->first();
        if($saldo5470==null){
            $fiskal5470=0;
        }else{
           $fiskal5470=$saldo5470->saldo - $debit5470 + $kredit5470;
        }                
        // 5470

        // 5480
        $asetlancar5480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5480')->get();
        $debit5480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5480')->sum('nilai_debit');
        $kredit5480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5480')->sum('nilai_kredit');
        $saldo5480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5480')->get()->first();
        if($saldo5480==null){
            $fiskal5480=0;
        }else{
           $fiskal5480=$saldo5480->saldo - $debit5480 + $kredit5480;
        }                
        // 5480

        // 5600
        $asetlancar5600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5600')->get();
        $debit5600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5600')->sum('nilai_debit');
        $kredit5600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5600')->sum('nilai_kredit');
        $saldo5600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5600')->get()->first();
        if($saldo5600==null){
            $fiskal5600=0;
        }else{
           $fiskal5600=$saldo5600->saldo - $debit5600 + $kredit5600;
        }                
        // 5600

        // 6100
        $asetlancar6100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6100')->get();
        $debit6100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6100')->sum('nilai_debit');
        $kredit6100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6100')->sum('nilai_kredit');
        $saldo6100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6100')->get()->first();
        if($saldo6100==null){
            $fiskal6100=0;
        }else{
           $fiskal6100=$saldo6100->saldo - $debit6100 + $kredit6100;
        }                
        // 6100

        // 6110
        $asetlancar6110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6110')->get();
        $debit6110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6110')->sum('nilai_debit');
        $kredit6110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6110')->sum('nilai_kredit');
        $saldo6110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6110')->get()->first();
        if($saldo6110==null){
            $fiskal6110=0;
        }else{
           $fiskal6110=$saldo6110->saldo - $debit6110 + $kredit6110;
        }                
        // 6110

        // 6120
        $asetlancar6120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6120')->get();
        $debit6120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6120')->sum('nilai_debit');
        $kredit6120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6120')->sum('nilai_kredit');
        $saldo6120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6120')->get()->first();
        if($saldo6120==null){
            $fiskal6120=0;
        }else{
           $fiskal6120=$saldo6120->saldo - $debit6120 + $kredit6120;
        }                
        // 6120

        // 6130
        $asetlancar6130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6130')->get();
        $debit6130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6130')->sum('nilai_debit');
        $kredit6130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6130')->sum('nilai_kredit');
        $saldo6130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6130')->get()->first();
        if($saldo6130==null){
            $fiskal6130=0;
        }else{
           $fiskal6130=$saldo6130->saldo - $debit6130 + $kredit6130;
        }                
        // 6130

        // 6140
        $asetlancar6140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6140')->get();
        $debit6140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6140')->sum('nilai_debit');
        $kredit6140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6140')->sum('nilai_kredit');
        $saldo6140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6140')->get()->first();
        if($saldo6140==null){
            $fiskal6140=0;
        }else{
           $fiskal6140=$saldo6140->saldo - $debit6140 + $kredit6140;
        }                
        // 6140

        // 6150
        $asetlancar6150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6150')->get();
        $debit6150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6150')->sum('nilai_debit');
        $kredit6150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6150')->sum('nilai_kredit');
        $saldo6150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6150')->get()->first();
        if($saldo6150==null){
            $fiskal6150=0;
        }else{
           $fiskal6150=$saldo6150->saldo - $debit6150 + $kredit6150;
        }                
        // 6150

        // 6160
        $asetlancar6160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6160')->get();
        $debit6160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6160')->sum('nilai_debit');
        $kredit6160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6160')->sum('nilai_kredit');
        $saldo6160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6160')->get()->first();
        if($saldo6160==null){
            $fiskal6160=0;
        }else{
           $fiskal6160=$saldo6160->saldo - $debit6160 + $kredit6160;
        }                
        // 6160

        // 6170
        $asetlancar6170=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6170')->get();
        $debit6170=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6170')->sum('nilai_debit');
        $kredit6170=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6170')->sum('nilai_kredit');
        $saldo6170=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6170')->get()->first();
        if($saldo6170==null){
            $fiskal6170=0;
        }else{
           $fiskal6170=$saldo6170->saldo - $debit6170 + $kredit6170;
        }                
        // 6170

        // 6180
        $asetlancar6180=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6180')->get();
        $debit6180=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6180')->sum('nilai_debit');
        $kredit6180=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6180')->sum('nilai_kredit');
        $saldo6180=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6180')->get()->first();
        if($saldo6180==null){
            $fiskal6180=0;
        }else{
           $fiskal6180=$saldo6180->saldo - $debit6180 + $kredit6180;
        }                
        // 6180
        
        // 6190
        $asetlancar6190=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6190')->get();
        $debit6190=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6190')->sum('nilai_debit');
        $kredit6190=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6190')->sum('nilai_kredit');
        $saldo6190=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6190')->get()->first();
        if($saldo6190==null){
            $fiskal6190=0;
        }else{
           $fiskal6190=$saldo6190->saldo - $debit6190 + $kredit6190;
        }                
        // 6190
        
        // 6200
        $asetlancar6200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6200')->get();
        $debit6200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6200')->sum('nilai_debit');
        $kredit6200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6200')->sum('nilai_kredit');
        $saldo6200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6200')->get()->first();
        if($saldo6200==null){
            $fiskal6200=0;
        }else{
           $fiskal6200=$saldo6200->saldo - $debit6200 + $kredit6200;
        }                
        // 6200

        // 6210
        $asetlancar6210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6210')->get();
        $debit6210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6210')->sum('nilai_debit');
        $kredit6210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6210')->sum('nilai_kredit');
        $saldo6210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6210')->get()->first();
        if($saldo6210==null){
            $fiskal6210=0;
        }else{
           $fiskal6210=$saldo6210->saldo - $debit6210 + $kredit6210;
        }                
        // 6210

        // 6220
        $asetlancar6220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6220')->get();
        $debit6220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6220')->sum('nilai_debit');
        $kredit6220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6220')->sum('nilai_kredit');
        $saldo6220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6220')->get()->first();
        if($saldo6220==null){
            $fiskal6220=0;
        }else{
           $fiskal6220=$saldo6220->saldo - $debit6220 + $kredit6220;
        }                
        // 6220

        // 6230
        $asetlancar6230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6230')->get();
        $debit6230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6230')->sum('nilai_debit');
        $kredit6230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6230')->sum('nilai_kredit');
        $saldo6230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6230')->get()->first();
        if($saldo6230==null){
            $fiskal6230=0;
        }else{
           $fiskal6230=$saldo6230->saldo - $debit6230 + $kredit6230;
        }                
        // 6230

        // 6240
        $asetlancar6240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6240')->get();
        $debit6240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6240')->sum('nilai_debit');
        $kredit6240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6240')->sum('nilai_kredit');
        $saldo6240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6240')->get()->first();
        if($saldo6240==null){
            $fiskal6240=0;
        }else{
           $fiskal6240=$saldo6240->saldo - $debit6240 + $kredit6240;
        }                
        // 6240

        // 6250
        $asetlancar6250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6250')->get();
        $debit6250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6250')->sum('nilai_debit');
        $kredit6250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6250')->sum('nilai_kredit');
        $saldo6250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6250')->get()->first();
        if($saldo6250==null){
            $fiskal6250=0;
        }else{
           $fiskal6250=$saldo6250->saldo - $debit6250 + $kredit6250;
        }                
        // 6250

        // 6260
        $asetlancar6260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6260')->get();
        $debit6260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6260')->sum('nilai_debit');
        $kredit6260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6260')->sum('nilai_kredit');
        $saldo6260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6260')->get()->first();
        if($saldo6260==null){
            $fiskal6260=0;
        }else{
           $fiskal6260=$saldo6260->saldo - $debit6260 + $kredit6260;
        }                
        // 6260

        // 6270
        $asetlancar6270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6270')->get();
        $debit6270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6270')->sum('nilai_debit');
        $kredit6270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6270')->sum('nilai_kredit');
        $saldo6270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6270')->get()->first();
        if($saldo6270==null){
            $fiskal6270=0;
        }else{
           $fiskal6270=$saldo6270->saldo - $debit6270 + $kredit6270;
        }                
        // 6270

        // 6280
        $asetlancar6280=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6280')->get();
        $debit6280=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6280')->sum('nilai_debit');
        $kredit6280=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6280')->sum('nilai_kredit');
        $saldo6280=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6280')->get()->first();
        if($saldo6280==null){
            $fiskal6280=0;
        }else{
           $fiskal6280=$saldo6280->saldo - $debit6280 + $kredit6280;
        }                
        // 6280

        // 6290
        $asetlancar6290=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6290')->get();
        $debit6290=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6290')->sum('nilai_debit');
        $kredit6290=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6290')->sum('nilai_kredit');
        $saldo6290=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6290')->get()->first();
        if($saldo6290==null){
            $fiskal6290=0;
        }else{
           $fiskal6290=$saldo6290->saldo - $debit6290 + $kredit6290;
        }                
        // 6290

        // 6300
        $asetlancar6300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6300')->get();
        $debit6300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6300')->sum('nilai_debit');
        $kredit6300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6300')->sum('nilai_kredit');
        $saldo6300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6300')->get()->first();
        if($saldo6300==null){
            $fiskal6300=0;
        }else{
           $fiskal6300=$saldo6300->saldo - $debit6300 + $kredit6300;
        }                
        // 6300

        // 6310
        $asetlancar6310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6310')->get();
        $debit6310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6310')->sum('nilai_debit');
        $kredit6310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6310')->sum('nilai_kredit');
        $saldo6310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6310')->get()->first();
        if($saldo6310==null){
            $fiskal6310=0;
        }else{
           $fiskal6310=$saldo6310->saldo - $debit6310 + $kredit6310;
        }                
        // 6310

        // 6320
        $asetlancar6320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6320')->get();
        $debit6320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6320')->sum('nilai_debit');
        $kredit6320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6320')->sum('nilai_kredit');
        $saldo6320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6320')->get()->first();
        if($saldo6320==null){
            $fiskal6320=0;
        }else{
           $fiskal6320=$saldo6320->saldo - $debit6320 + $kredit6320;
        }                
        // 6320

        // 6330
        $asetlancar6330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6330')->get();
        $debit6330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6330')->sum('nilai_debit');
        $kredit6330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6330')->sum('nilai_kredit');
        $saldo6330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6330')->get()->first();
        if($saldo6330==null){
            $fiskal6330=0;
        }else{
           $fiskal6330=$saldo6330->saldo - $debit6330 + $kredit6330;
        }                
        // 6330

        // 6340
        $asetlancar6340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6340')->get();
        $debit6340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6340')->sum('nilai_debit');
        $kredit6340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6340')->sum('nilai_kredit');
        $saldo6340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6340')->get()->first();
        if($saldo6340==null){
            $fiskal6340=0;
        }else{
           $fiskal6340=$saldo6340->saldo - $debit6340 + $kredit6340;
        }                
        // 6340

        // 6350
        $asetlancar6350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6350')->get();
        $debit6350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6350')->sum('nilai_debit');
        $kredit6350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6350')->sum('nilai_kredit');
        $saldo6350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6350')->get()->first();
        if($saldo6350==null){
            $fiskal6350=0;
        }else{
           $fiskal6350=$saldo6350->saldo - $debit6350 + $kredit6350;
        }                
        // 6350

        // 6360
        $asetlancar6360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6360')->get();
        $debit6360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6360')->sum('nilai_debit');
        $kredit6360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6360')->sum('nilai_kredit');
        $saldo6360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6360')->get()->first();
        if($saldo6360==null){
            $fiskal6360=0;
        }else{
           $fiskal6360=$saldo6360->saldo - $debit6360 + $kredit6360;
        }                
        // 6360

        // 6370
        $asetlancar6370=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6370')->get();
        $debit6370=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6370')->sum('nilai_debit');
        $kredit6370=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6370')->sum('nilai_kredit');
        $saldo6370=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6370')->get()->first();
        if($saldo6370==null){
            $fiskal6370=0;
        }else{
           $fiskal6370=$saldo6370->saldo - $debit6370 + $kredit6370;
        }                
        // 6370

        // 6380
        $asetlancar6380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6380')->get();
        $debit6380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6380')->sum('nilai_debit');
        $kredit6380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6380')->sum('nilai_kredit');
        $saldo6380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6380')->get()->first();
        if($saldo6380==null){
            $fiskal6380=0;
        }else{
           $fiskal6380=$saldo6380->saldo - $debit6380 + $kredit6380;
        }                
        // 6380

        // 6390
        $asetlancar6390=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6390')->get();
        $debit6390=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6390')->sum('nilai_debit');
        $kredit6390=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6390')->sum('nilai_kredit');
        $saldo6390=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6390')->get()->first();
        if($saldo6390==null){
            $fiskal6390=0;
        }else{
           $fiskal6390=$saldo6390->saldo - $debit6390 + $kredit6390;
        }                
        // 6390

        // 6400
        $asetlancar6400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6400')->get();
        $debit6400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6400')->sum('nilai_debit');
        $kredit6400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6400')->sum('nilai_kredit');
        $saldo6400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6400')->get()->first();
        if($saldo6400==null){
            $fiskal6400=0;
        }else{
           $fiskal6400=$saldo6400->saldo - $debit6400 + $kredit6400;
        }                
        // 6400

        // 6410
        $asetlancar6410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6410')->get();
        $debit6410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6410')->sum('nilai_debit');
        $kredit6410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6410')->sum('nilai_kredit');
        $saldo6410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6410')->get()->first();
        if($saldo6410==null){
            $fiskal6410=0;
        }else{
           $fiskal6410=$saldo6410->saldo - $debit6410 + $kredit6410;
        }                
        // 6410

        // 6420
        $asetlancar6420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6420')->get();
        $debit6420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6420')->sum('nilai_debit');
        $kredit6420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6420')->sum('nilai_kredit');
        $saldo6420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6420')->get()->first();
        if($saldo6420==null){
            $fiskal6420=0;
        }else{
           $fiskal6420=$saldo6420->saldo - $debit6420 + $kredit6420;
        }                
        // 6420

        // 6430
        $asetlancar6430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6430')->get();
        $debit6430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6430')->sum('nilai_debit');
        $kredit6430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6430')->sum('nilai_kredit');
        $saldo6430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6430')->get()->first();
        if($saldo6430==null){
            $fiskal6430=0;
        }else{
           $fiskal6430=$saldo6430->saldo - $debit6430 + $kredit6430;
        }                
        // 6430

        // 6440
        $asetlancar6440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6440')->get();
        $debit6440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6440')->sum('nilai_debit');
        $kredit6440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6440')->sum('nilai_kredit');
        $saldo6440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6440')->get()->first();
        if($saldo6440==null){
            $fiskal6440=0;
        }else{
           $fiskal6440=$saldo6440->saldo - $debit6440 + $kredit6440;
        }                
        // 6440

        // 6450
        $asetlancar6450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6450')->get();
        $debit6450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6450')->sum('nilai_debit');
        $kredit6450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6450')->sum('nilai_kredit');
        $saldo6450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6450')->get()->first();
        if($saldo6450==null){
            $fiskal6450=0;
        }else{
           $fiskal6450=$saldo6450->saldo - $debit6450 + $kredit6450;
        }                
        // 6450
        
        // 6460
        $asetlancar6460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6460')->get();
        $debit6460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6460')->sum('nilai_debit');
        $kredit6460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6460')->sum('nilai_kredit');
        $saldo6460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6460')->get()->first();
        if($saldo6460==null){
            $fiskal6460=0;
        }else{
           $fiskal6460=$saldo6460->saldo - $debit6460 + $kredit6460;
        }                
        // 6460
        // 6470
        $asetlancar6470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6470')->get();
        $debit6470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6470')->sum('nilai_debit');
        $kredit6470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6470')->sum('nilai_kredit');
        $saldo6470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6470')->get()->first();
        if($saldo6470==null){
            $fiskal6470=0;
        }else{
           $fiskal6470=$saldo6470->saldo - $debit6470 + $kredit6470;
        }                
        // 6470

        // 6480
        $asetlancar6480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6480')->get();
        $debit6480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6480')->sum('nilai_debit');
        $kredit6480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6480')->sum('nilai_kredit');
        $saldo6480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6480')->get()->first();
        if($saldo6480==null){
            $fiskal6480=0;
        }else{
           $fiskal6480=$saldo6480->saldo - $debit6480 + $kredit6480;
        }                
        // 6480

        // 6490
        $asetlancar6490=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6490')->get();
        $debit6490=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6490')->sum('nilai_debit');
        $kredit6490=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6490')->sum('nilai_kredit');
        $saldo6490=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6490')->get()->first();
        if($saldo6490==null){
            $fiskal6490=0;
        }else{
           $fiskal6490=$saldo6490->saldo - $debit6490 + $kredit6490;
        }                
        // 6490

        // 6500
        $asetlancar6500=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6500')->get();
        $debit6500=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6500')->sum('nilai_debit');
        $kredit6500=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6500')->sum('nilai_kredit');
        $saldo6500=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6500')->get()->first();
        if($saldo6500==null){
            $fiskal6500=0;
        }else{
           $fiskal6500=$saldo6500->saldo - $debit6500 + $kredit6500;
        }                
        // 6500

        // 6510
        $asetlancar6510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6510')->get();
        $debit6510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6510')->sum('nilai_debit');
        $kredit6510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6510')->sum('nilai_kredit');
        $saldo6510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6510')->get()->first();
        if($saldo6510==null){
            $fiskal6510=0;
        }else{
           $fiskal6510=$saldo6510->saldo - $debit6510 + $kredit6510;
        }                
        // 6510

        // 6520
        $asetlancar6520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6520')->get();
        $debit6520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6520')->sum('nilai_debit');
        $kredit6520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6520')->sum('nilai_kredit');
        $saldo6520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6520')->get()->first();
        if($saldo6520==null){
            $fiskal6520=0;
        }else{
           $fiskal6520=$saldo6520->saldo - $debit6520 + $kredit6520;
        }                
        // 6520

        // 6530
        $asetlancar6530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6530')->get();
        $debit6530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6530')->sum('nilai_debit');
        $kredit6530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6530')->sum('nilai_kredit');
        $saldo6530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6530')->get()->first();
        if($saldo6530==null){
            $fiskal6530=0;
        }else{
           $fiskal6530=$saldo6530->saldo - $debit6530 + $kredit6530;
        }                
        // 6530

        // 6540
        $asetlancar6540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6540')->get();
        $debit6540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6540')->sum('nilai_debit');
        $kredit6540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6540')->sum('nilai_kredit');
        $saldo6540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6540')->get()->first();
        if($saldo6540==null){
            $fiskal6540=0;
        }else{
           $fiskal6540=$saldo6540->saldo - $debit6540 + $kredit6540;
        }                
        // 6540

        // 6600
        $asetlancar6600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6600')->get();
        $debit6600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6600')->sum('nilai_debit');
        $kredit6600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6600')->sum('nilai_kredit');
        $saldo6600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6600')->get()->first();
        if($saldo6600==null){
            $fiskal6600=0;
        }else{
           $fiskal6600=$saldo6600->saldo - $debit6600 + $kredit6600;
        }                
        // 6600

        // 7100
        $asetlancar7100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7100')->get();
        $debit7100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','7100')->sum('nilai_debit');
        $kredit7100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','7100')->sum('nilai_kredit');
        $saldo7100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7100')->get()->first();
        if($saldo7100==null){
            $fiskal7100=0;
        }else{
           $fiskal7100=$saldo7100->saldo + $debit7100 - $kredit7100;
        }                
        // 7100

        // 7110
        $asetlancar7110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7110')->get();
        $debit7110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','7110')->sum('nilai_debit');
        $kredit7110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','7110')->sum('nilai_kredit');
        $saldo7110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7110')->get()->first();
        if($saldo7110==null){
            $fiskal7110=0;
        }else{
           $fiskal7110=$saldo7110->saldo + $debit7110 - $kredit7110;
        }                
        // 7110

        // 8100
        $asetlancar8100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8100')->get();
        $debit8100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8100')->sum('nilai_debit');
        $kredit8100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8100')->sum('nilai_kredit');
        $saldo8100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8100')->get()->first();
        if($saldo8100==null){
            $fiskal8100=0;
        }else{
           $fiskal8100=$saldo8100->saldo + $debit8100 - $kredit8100;
        }                
        // 8100

        // 8110
        $asetlancar8110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8110')->get();
        $debit8110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8110')->sum('nilai_debit');
        $kredit8110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8110')->sum('nilai_kredit');
        $saldo8110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8110')->get()->first();
        if($saldo8110==null){
            $fiskal8110=0;
        }else{
           $fiskal8110=$saldo8110->saldo + $debit8110 - $kredit8110;
        }                
        // 8110
        // 8120
        $asetlancar8120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8120')->get();
        $debit8120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8120')->sum('nilai_debit');
        $kredit8120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8120')->sum('nilai_kredit');
        $saldo8120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8120')->get()->first();
        if($saldo8120==null){
            $fiskal8120=0;
        }else{
           $fiskal8120=$saldo8120->saldo + $debit8120 - $kredit8120;
        }                
        // 8120

        $totalpenjualan=LatihanKeuangan::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalpenjualanfiskal=$fiskal4100+$fiskal4101+$fiskal4102+$fiskal4103+$fiskal4104+$fiskal4200+$fiskal4201+$fiskal4202+$fiskal4203+$fiskal4300+$fiskal4310+$fiskal4320+$fiskal4330+$fiskal4340+$fiskal4350+$fiskal4105;
        $totalharpok=LatihanKeuangan::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalharpokfiskal= $fiskal5100+$fiskal5110+$fiskal5120+$fiskal5200+$fiskal5210+$fiskal5211+$fiskal5212+$fiskal5213+$fiskal5250+$fiskal5260+$fiskal5300+$fiskal5400+$fiskal5410+$fiskal5420+$fiskal5430+$fiskal5440+$fiskal5450+$fiskal5460+$fiskal5470+$fiskal5480+$fiskal5600;
        $totalbiayaoperasional=LatihanKeuangan::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $totalbiayaoperasionalfiskal=$fiskal6100+$fiskal6110+$fiskal6120+$fiskal6130+$fiskal6140+$fiskal6150+$fiskal6160+$fiskal6170+$fiskal6180+$fiskal6190+$fiskal6200+$fiskal6210+$fiskal6220+$fiskal6230+$fiskal6240+$fiskal6250+$fiskal6260+$fiskal6270+$fiskal6280+$fiskal6290+$fiskal6300+$fiskal6310+$fiskal6320+$fiskal6330+$fiskal6340+$fiskal6350+$fiskal6360+$fiskal6370+$fiskal6380+$fiskal6390+$fiskal6400+$fiskal6410+$fiskal6420+$fiskal6430+$fiskal6440+$fiskal6450+$fiskal6460+$fiskal6470+$fiskal6480+$fiskal6490+$fiskal6500+$fiskal6510+$fiskal6520+$fiskal6530+$fiskal6540+$fiskal6600;
        $jumlahpendapatanlain=LatihanKeuangan::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahpendapatanlainfiskal=$fiskal7100+$fiskal7110;
        $jumlahbebanlain=LatihanKeuangan::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        $jumlahbebanlainfiskal=$fiskal8100+$fiskal8110+$fiskal8120;
        
        $labakotor = $totalpenjualan-$totalharpok;
        $labakotorfiskal = $totalpenjualanfiskal-$totalharpokfiskal;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $labaoperasionalfiskal = $labakotorfiskal-$totalbiayaoperasionalfiskal;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $totalpendapatandanbebanlainfiskal = $jumlahpendapatanlainfiskal-$jumlahbebanlainfiskal;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','>','4000')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','>','4000')->sum('nilai_kredit');
        $totalkomersial = $ikhtisarlabarugi+$totaldebit-$totalkredit;
        
        $pajakpenghasiliktisarlabarugi = $ikhtisarlabarugi*22/100;
        $pajakpenghasiltotalkomersial = $totalkomersial*22/100;
        $data =[
            'title' =>'LAPORAN LABA RUGI FISKAL',
        ];

        $pdf = PDF::loadView('pdf.printpdflatihanlabarugifiskal',$data,compact(
            'totalpendapatandanbebanlainfiskal',
            'totalpenjualanfiskal','totalharpokfiskal','labakotorfiskal','totalbiayaoperasionalfiskal','labaoperasionalfiskal','jumlahpendapatanlainfiskal','jumlahbebanlainfiskal',
            'fiskal4300','fiskal4203','fiskal4202','fiskal4201','fiskal4200','fiskal4104','fiskal4103','fiskal4102','fiskal4101','fiskal4100','fiskal4340',
            'fiskal5211','fiskal5210','fiskal5200','fiskal5120','fiskal5110','fiskal5100','fiskal4105','fiskal4350','fiskal4330','fiskal4320','fiskal4310',
            'fiskal5450','fiskal5440','fiskal5430','fiskal5420','fiskal5410','fiskal5400','fiskal5300','fiskal5260','fiskal5250','fiskal5213','fiskal5212',
            'fiskal6160','fiskal6150','fiskal6140','fiskal6130','fiskal6120','fiskal6110','fiskal6100','fiskal5600','fiskal5480','fiskal5470','fiskal5460',
            'fiskal6270','fiskal6260','fiskal6250','fiskal6240','fiskal6230','fiskal6220','fiskal6210','fiskal6200','fiskal6190','fiskal6180','fiskal6170',
            'fiskal6380','fiskal6370','fiskal6360','fiskal6350','fiskal6340','fiskal6330','fiskal6320','fiskal6310','fiskal6300','fiskal6290','fiskal6280',
            'fiskal6600','fiskal6540','fiskal6530','fiskal6520','fiskal6510','fiskal6500','fiskal6490','fiskal6480','fiskal6470','fiskal6460','fiskal6450',
            'fiskal7100','fiskal7110','fiskal8100','fiskal8110','fiskal8120','fiskal6440','fiskal6430','fiskal6420','fiskal6410','fiskal6400','fiskal6390',
            'pajakpenghasiliktisarlabarugi','pajakpenghasiltotalkomersial',
            'totaldebit','totalkredit','totalkomersial',
            'totalpenjualan','totalharpok','totalbiayaoperasional','jumlahpendapatanlain',
            'jumlahbebanlain','labakotor','labaoperasional','totalpendapatandanbebanlain',
            'ikhtisarlabarugi',
            'asetlancar4100','debit4100','kredit4100',
            'asetlancar4101','debit4101','kredit4101',
            'asetlancar4102','debit4102','kredit4102',
            'asetlancar4103','debit4103','kredit4103',
            'asetlancar4104','debit4104','kredit4104',
            'asetlancar4200','debit4200','kredit4200',
            'asetlancar4201','debit4201','kredit4201',
            'asetlancar4202','debit4202','kredit4202',
            'asetlancar4203','debit4203','kredit4203',
            'asetlancar4300','debit4300','kredit4300',
            'asetlancar4310','debit4310','kredit4310',
            'asetlancar4320','debit4320','kredit4320',
            'asetlancar4330','debit4330','kredit4330',
            'asetlancar4340','debit4340','kredit4340',
            'asetlancar4350','debit4350','kredit4350',
            'asetlancar4105','debit4105','kredit4105',
            'asetlancar5100','debit5100','kredit5100',
            'asetlancar5110','debit5110','kredit5110',
            'asetlancar5120','debit5120','kredit5120',
            'asetlancar5200','debit5200','kredit5200',
            'asetlancar5210','debit5210','kredit5210',
            'asetlancar5211','debit5211','kredit5211',
            'asetlancar5212','debit5212','kredit5212',
            'asetlancar5213','debit5213','kredit5213',
            'asetlancar5250','debit5250','kredit5250',
            'asetlancar5260','debit5260','kredit5260',
            'asetlancar5300','debit5300','kredit5300',
            'asetlancar5400','debit5400','kredit5400',
            'asetlancar5410','debit5410','kredit5410',
            'asetlancar5420','debit5420','kredit5420',
            'asetlancar5430','debit5430','kredit5430',
            'asetlancar5440','debit5440','kredit5440',
            'asetlancar5450','debit5450','kredit5450',
            'asetlancar5460','debit5460','kredit5460',
            'asetlancar5470','debit5470','kredit5470',
            'asetlancar5480','debit5480','kredit5480',
            'asetlancar5600','debit5600','kredit5600',
            'asetlancar6100','debit6100','kredit6100',
            'asetlancar6110','debit6110','kredit6110',
            'asetlancar6120','debit6120','kredit6120',
            'asetlancar6130','debit6130','kredit6130',
            'asetlancar6140','debit6140','kredit6140',
            'asetlancar6150','debit6150','kredit6150',
            'asetlancar6160','debit6160','kredit6160',
            'asetlancar6170','debit6170','kredit6170',
            'asetlancar6180','debit6180','kredit6180',
            'asetlancar6190','debit6190','kredit6190',
            'asetlancar6200','debit6200','kredit6200',
            'asetlancar6210','debit6210','kredit6210',
            'asetlancar6220','debit6220','kredit6220',
            'asetlancar6230','debit6230','kredit6230',
            'asetlancar6240','debit6240','kredit6240',
            'asetlancar6250','debit6250','kredit6250',
            'asetlancar6260','debit6260','kredit6260',
            'asetlancar6270','debit6270','kredit6270',
            'asetlancar6280','debit6280','kredit6280',
            'asetlancar6290','debit6290','kredit6290',
            'asetlancar6300','debit6300','kredit6300',
            'asetlancar6310','debit6310','kredit6310',
            'asetlancar6320','debit6320','kredit6320',
            'asetlancar6330','debit6330','kredit6330',
            'asetlancar6340','debit6340','kredit6340',
            'asetlancar6350','debit6350','kredit6350',
            'asetlancar6360','debit6360','kredit6360',
            'asetlancar6370','debit6370','kredit6370',
            'asetlancar6380','debit6380','kredit6380',
            'asetlancar6390','debit6390','kredit6390',
            'asetlancar6400','debit6400','kredit6400',
            'asetlancar6410','debit6410','kredit6410',
            'asetlancar6420','debit6420','kredit6420',
            'asetlancar6430','debit6430','kredit6430',
            'asetlancar6440','debit6440','kredit6440',
            'asetlancar6450','debit6450','kredit6450',
            'asetlancar6460','debit6460','kredit6460',
            'asetlancar6470','debit6470','kredit6470',
            'asetlancar6480','debit6480','kredit6480',
            'asetlancar6490','debit6490','kredit6490',
            'asetlancar6500','debit6500','kredit6500',
            'asetlancar6510','debit6510','kredit6510',
            'asetlancar6520','debit6520','kredit6520',
            'asetlancar6530','debit6530','kredit6530',
            'asetlancar6540','debit6540','kredit6540',
            'asetlancar6600','debit6600','kredit6600',
            'asetlancar7100','debit7100','kredit7100',
            'asetlancar7110','debit7110','kredit7110',
            'asetlancar8100','debit8100','kredit8100',
            'asetlancar8110','debit8110','kredit8110',
            'asetlancar8120','debit8120','kredit8120',
        ));
        return $pdf->stream('dokumen.pdf'); 

    }
    public function latihanlabarugifiskalPDFshow(Request $request){ 
        $id=$request->user_id;
        // 4100
        $asetlancar4100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4100')->get();
        $debit4100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4100')->sum('nilai_debit');
        $kredit4100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4100')->sum('nilai_kredit');
        $saldo4100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4100')->get()->first();
        if($saldo4100==null){
            $fiskal4100=0;
        }else{
            $fiskal4100=$saldo4100->saldo+$debit4100-$kredit4100;
        }
        // 4100
         // 4101
         $asetlancar4101=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4101')->get();
         $debit4101=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4101')->sum('nilai_debit');
         $kredit4101=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4101')->sum('nilai_kredit');
         $saldo4101=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4101')->get()->first();
        if($saldo4101==null){
            $fiskal4101=0;
        }else{
            $fiskal4101=$saldo4101->saldo + $debit4101 - $kredit4101;
        }
         // 4101
        // 4102
        $asetlancar4102=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4102')->get();
        $debit4102=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4102')->sum('nilai_debit');
        $kredit4102=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4102')->sum('nilai_kredit');
        $saldo4102=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4102')->get()->first();
        if($saldo4102==null){
            $fiskal4102=0;
        }else{
           $fiskal4102=$saldo4102->saldo + $debit4102 - $kredit4102;
        }
        // 4102
        // 4103
        $asetlancar4103=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4103')->get();
        $debit4103=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4103')->sum('nilai_debit');
        $kredit4103=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4103')->sum('nilai_kredit');
        $saldo4103=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4103')->get()->first();
		if($saldo4103==null){
            $fiskal4103=0;
        }else{
           $fiskal4103=$saldo4103->saldo + $debit4103 - $kredit4103;
        }

        // 4103
        // 4104
        $asetlancar4104=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4104')->get();
        $debit4104=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4104')->sum('nilai_debit');
        $kredit4104=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4104')->sum('nilai_kredit');
        $saldo4104=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4104')->get()->first();
        if($saldo4104==null){
            $fiskal4104=0;
        }else{
           $fiskal4104=$saldo4104->saldo + $debit4104 - $kredit4104;
        }
        // 4104

        // 4200
        $asetlancar4200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4200')->get();
        $debit4200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4200')->sum('nilai_debit');
        $kredit4200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4200')->sum('nilai_kredit');
        $saldo4200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4200')->get()->first();
        if($saldo4200==null){
            $fiskal4200=0;
        }else{
           $fiskal4200=$saldo4200->saldo + $debit4200 - $kredit4200;
        } 
        // 4200
        // 4201
        $asetlancar4201=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4201')->get();
        $debit4201=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4201')->sum('nilai_debit');
        $kredit4201=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4201')->sum('nilai_kredit');
        $saldo4201=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4201')->get()->first();
        if($saldo4201==null){
            $fiskal4201=0;
        }else{
           $fiskal4201=$saldo4201->saldo + $debit4201 - $kredit4201;
        }
        // 4201

        // 4202
        $asetlancar4202=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4202')->get();
        $debit4202=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4202')->sum('nilai_debit');
        $kredit4202=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4202')->sum('nilai_kredit');
        $saldo4202=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4202')->get()->first();
        if($saldo4202==null){
            $fiskal4202=0;
        }else{
           $fiskal4202=$saldo4202->saldo + $debit4202 - $kredit4202;
        }        
        // 4202

        // 4203
        $asetlancar4203=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4203')->get();
        $debit4203=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4203')->sum('nilai_debit');
        $kredit4203=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4203')->sum('nilai_kredit');
        $saldo4203=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4203')->get()->first();
        if($saldo4203==null){
            $fiskal4203=0;
        }else{
           $fiskal4203=$saldo4203->saldo + $debit4203 - $kredit4203;
        }        
        // 4203

        // 4300
        $asetlancar4300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4300')->get();
        $debit4300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4300')->sum('nilai_debit');
        $kredit4300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4300')->sum('nilai_kredit');
        $saldo4300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4300')->get()->first();
        if($saldo4300==null){
            $fiskal4300=0;
        }else{
           $fiskal4300=$saldo4300->saldo + $debit4300 - $kredit4300;
        }        
        // 4300

        // 4310
        $asetlancar4310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4310')->get();
        $debit4310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4310')->sum('nilai_debit');
        $kredit4310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4310')->sum('nilai_kredit');
        $saldo4310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4310')->get()->first();
		if($saldo4310==null){
            $fiskal4310=0;
        }else{
           $fiskal4310=$saldo4310->saldo + $debit4310 - $kredit4310;
        }        
        // 4310

        // 4320
        $asetlancar4320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4320')->get();
        $debit4320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4320')->sum('nilai_debit');
        $kredit4320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4320')->sum('nilai_kredit');
        $saldo4320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4320')->get()->first();
        if($saldo4320==null){
            $fiskal4320=0;
        }else{
           $fiskal4320=$saldo4320->saldo + $debit4320 - $kredit4320;
        }                
        // 4320

        // 4330
        $asetlancar4330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4330')->get();
        $debit4330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4330')->sum('nilai_debit');
        $kredit4330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4330')->sum('nilai_kredit');
        $saldo4330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4330')->get()->first();
        if($saldo4330==null){
            $fiskal4330=0;
        }else{
           $fiskal4330=$saldo4330->saldo + $debit4330 - $kredit4330;
        }                
        // 4330

        // 4340
        $asetlancar4340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4340')->get();
        $debit4340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4340')->sum('nilai_debit');
        $kredit4340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4340')->sum('nilai_kredit');
        $saldo4340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4340')->get()->first();
        if($saldo4340==null){
            $fiskal4340=0;
        }else{
           $fiskal4340=$saldo4340->saldo + $debit4340 - $kredit4340;
        }                
        // 4340

        // 4350
        $asetlancar4350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4350')->get();
        $debit4350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4350')->sum('nilai_debit');
        $kredit4350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4350')->sum('nilai_kredit');
        $saldo4350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4350')->get()->first();
        if($saldo4350==null){
            $fiskal4350=0;
        }else{
           $fiskal4350=$saldo4350->saldo + $debit4350 - $kredit4350;
        }                
        // 4350

        // 4105
        $asetlancar4105=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4105')->get();
        $debit4105=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','4105')->sum('nilai_debit');
        $kredit4105=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','4105')->sum('nilai_kredit');
        $saldo4105=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','4105')->get()->first();
        if($saldo4105==null){
            $fiskal4105=0;
        }else{
           $fiskal4105=$saldo4105->saldo + $debit4105 - $kredit4105;
        }                
        // 4105

        // 5100
        $asetlancar5100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5100')->get();
        $debit5100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5100')->sum('nilai_debit');
        $kredit5100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5100')->sum('nilai_kredit');
        $saldo5100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5100')->get()->first();
        if($saldo5100==null){
            $fiskal5100=0;
        }else{
           $fiskal5100=$saldo5100->saldo - $debit5100 + $kredit5100;
        }        
        // 5100

        // 5110
        $asetlancar5110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5110')->get();
        $debit5110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5110')->sum('nilai_debit');
        $kredit5110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5110')->sum('nilai_kredit');
        $saldo5110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5110')->get()->first();
        if($saldo5110==null){
            $fiskal5110=0;
        }else{
           $fiskal5110=$saldo5110->saldo - $debit5110 + $kredit5110;
        }                
        // 5110

        // 5120
        $asetlancar5120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5120')->get();
        $debit5120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5120')->sum('nilai_debit');
        $kredit5120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5120')->sum('nilai_kredit');
        $saldo5120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5120')->get()->first();
        if($saldo5120==null){
            $fiskal5120=0;
        }else{
           $fiskal5120=$saldo5120->saldo - $debit5120 + $kredit5120;
        }                
        // 5120

        // 5200
        $asetlancar5200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5200')->get();
        $debit5200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5200')->sum('nilai_debit');
        $kredit5200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5200')->sum('nilai_kredit');
        $saldo5200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5200')->get()->first();
        if($saldo5200==null){
            $fiskal5200=0;
        }else{
           $fiskal5200=$saldo5200->saldo - $debit5200 + $kredit5200;
        }                
        // 5200

        // 5210
        $asetlancar5210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5210')->get();
        $debit5210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5210')->sum('nilai_debit');
        $kredit5210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5210')->sum('nilai_kredit');
        $saldo5210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5210')->get()->first();
        if($saldo5210==null){
            $fiskal5210=0;
        }else{
           $fiskal5210=$saldo5210->saldo - $debit5210 + $kredit5210;
        }                
        // 5210

        // 5211
        $asetlancar5211=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5211')->get();
        $debit5211=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5211')->sum('nilai_debit');
        $kredit5211=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5211')->sum('nilai_kredit');
        $saldo5211=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5211')->get()->first();
        if($saldo5211==null){
            $fiskal5211=0;
        }else{
           $fiskal5211=$saldo5211->saldo - $debit5211 + $kredit5211;
        }        
        // 5211

        // 5212
        $asetlancar5212=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5212')->get();
        $debit5212=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5212')->sum('nilai_debit');
        $kredit5212=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5212')->sum('nilai_kredit');
        $saldo5212=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5212')->get()->first();
        if($saldo5212==null){
            $fiskal5212=0;
        }else{
           $fiskal5212=$saldo5212->saldo - $debit5212 + $kredit5212;
        }                
        // 5212

        // 5213
        $asetlancar5213=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5213')->get();
        $debit5213=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5213')->sum('nilai_debit');
        $kredit5213=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5213')->sum('nilai_kredit');
        $saldo5213=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5213')->get()->first();
        if($saldo5213==null){
            $fiskal5213=0;
        }else{
           $fiskal5213=$saldo5213->saldo - $debit5213 + $kredit5213;
        }                
        // 5213

        // 5250
        $asetlancar5250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5250')->get();
        $debit5250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5250')->sum('nilai_debit');
        $kredit5250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5250')->sum('nilai_kredit');
        $saldo5250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5250')->get()->first();
        if($saldo5250==null){
            $fiskal5250=0;
        }else{
           $fiskal5250=$saldo5250->saldo - $debit5250 + $kredit5250;
        }                
        // 5250

        // 5260
        $asetlancar5260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5260')->get();
        $debit5260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5260')->sum('nilai_debit');
        $kredit5260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5260')->sum('nilai_kredit');
        $saldo5260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5260')->get()->first();
        if($saldo5260==null){
            $fiskal5260=0;
        }else{
           $fiskal5260=$saldo5260->saldo - $debit5260 + $kredit5260;
        }                
        // 5260

        // 5300
        $asetlancar5300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5300')->get();
        $debit5300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5300')->sum('nilai_debit');
        $kredit5300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5300')->sum('nilai_kredit');
        $saldo5300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5300')->get()->first();
        if($saldo5300==null){
            $fiskal5300=0;
        }else{
           $fiskal5300=$saldo5300->saldo - $debit5300 + $kredit5300;
        }                
        // 5300

        // 5400
        $asetlancar5400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5400')->get();
        $debit5400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5400')->sum('nilai_debit');
        $kredit5400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5400')->sum('nilai_kredit');
        $saldo5400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5400')->get()->first();
        if($saldo5400==null){
            $fiskal5400=0;
        }else{
           $fiskal5400=$saldo5400->saldo - $debit5400 + $kredit5400;
        }                
        // 5400

        // 5410
        $asetlancar5410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5410')->get();
        $debit5410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5410')->sum('nilai_debit');
        $kredit5410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5410')->sum('nilai_kredit');
        $saldo5410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5410')->get()->first();
        if($saldo5410==null){
            $fiskal5410=0;
        }else{
           $fiskal5410=$saldo5410->saldo - $debit5410 + $kredit5410;
        }                
        // 5410

        // 5420
        $asetlancar5420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5420')->get();
        $debit5420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5420')->sum('nilai_debit');
        $kredit5420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5420')->sum('nilai_kredit');
        $saldo5420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5420')->get()->first();
        if($saldo5420==null){
            $fiskal5420=0;
        }else{
           $fiskal5420=$saldo5420->saldo - $debit5420 + $kredit5420;
        }                
        // 5420

        // 5430
        $asetlancar5430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5430')->get();
        $debit5430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5430')->sum('nilai_debit');
        $kredit5430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5430')->sum('nilai_kredit');
        $saldo5430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5430')->get()->first();
        if($saldo5430==null){
            $fiskal5430=0;
        }else{
           $fiskal5430=$saldo5430->saldo - $debit5430 + $kredit5430;
        }                
        // 5430

        // 5440
        $asetlancar5440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5440')->get();
        $debit5440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5440')->sum('nilai_debit');
        $kredit5440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5440')->sum('nilai_kredit');
        $saldo5440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5440')->get()->first();
        if($saldo5440==null){
            $fiskal5440=0;
        }else{
           $fiskal5440=$saldo5440->saldo - $debit5440 + $kredit5440;
        }                
        // 5440

        // 5450
        $asetlancar5450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5450')->get();
        $debit5450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5450')->sum('nilai_debit');
        $kredit5450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5450')->sum('nilai_kredit');
        $saldo5450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5450')->get()->first();
        if($saldo5450==null){
            $fiskal5450=0;
        }else{
           $fiskal5450=$saldo5450->saldo - $debit5450 + $kredit5450;
        }                
        // 5450

        // 5460
        $asetlancar5460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5460')->get();
        $debit5460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5460')->sum('nilai_debit');
        $kredit5460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5460')->sum('nilai_kredit');
        $saldo5460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5460')->get()->first();
        if($saldo5460==null){
            $fiskal5460=0;
        }else{
           $fiskal5460=$saldo5460->saldo - $debit5460 + $kredit5460;
        }                
        // 5460

        // 5470
        $asetlancar5470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5470')->get();
        $debit5470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5470')->sum('nilai_debit');
        $kredit5470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5470')->sum('nilai_kredit');
        $saldo5470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5470')->get()->first();
        if($saldo5470==null){
            $fiskal5470=0;
        }else{
           $fiskal5470=$saldo5470->saldo - $debit5470 + $kredit5470;
        }                
        // 5470

        // 5480
        $asetlancar5480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5480')->get();
        $debit5480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5480')->sum('nilai_debit');
        $kredit5480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5480')->sum('nilai_kredit');
        $saldo5480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5480')->get()->first();
        if($saldo5480==null){
            $fiskal5480=0;
        }else{
           $fiskal5480=$saldo5480->saldo - $debit5480 + $kredit5480;
        }                
        // 5480

        // 5600
        $asetlancar5600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5600')->get();
        $debit5600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','5600')->sum('nilai_debit');
        $kredit5600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','5600')->sum('nilai_kredit');
        $saldo5600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','5600')->get()->first();
        if($saldo5600==null){
            $fiskal5600=0;
        }else{
           $fiskal5600=$saldo5600->saldo - $debit5600 + $kredit5600;
        }                
        // 5600

        // 6100
        $asetlancar6100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6100')->get();
        $debit6100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6100')->sum('nilai_debit');
        $kredit6100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6100')->sum('nilai_kredit');
        $saldo6100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6100')->get()->first();
        if($saldo6100==null){
            $fiskal6100=0;
        }else{
           $fiskal6100=$saldo6100->saldo - $debit6100 + $kredit6100;
        }                
        // 6100

        // 6110
        $asetlancar6110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6110')->get();
        $debit6110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6110')->sum('nilai_debit');
        $kredit6110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6110')->sum('nilai_kredit');
        $saldo6110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6110')->get()->first();
        if($saldo6110==null){
            $fiskal6110=0;
        }else{
           $fiskal6110=$saldo6110->saldo - $debit6110 + $kredit6110;
        }                
        // 6110

        // 6120
        $asetlancar6120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6120')->get();
        $debit6120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6120')->sum('nilai_debit');
        $kredit6120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6120')->sum('nilai_kredit');
        $saldo6120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6120')->get()->first();
        if($saldo6120==null){
            $fiskal6120=0;
        }else{
           $fiskal6120=$saldo6120->saldo - $debit6120 + $kredit6120;
        }                
        // 6120

        // 6130
        $asetlancar6130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6130')->get();
        $debit6130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6130')->sum('nilai_debit');
        $kredit6130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6130')->sum('nilai_kredit');
        $saldo6130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6130')->get()->first();
        if($saldo6130==null){
            $fiskal6130=0;
        }else{
           $fiskal6130=$saldo6130->saldo - $debit6130 + $kredit6130;
        }                
        // 6130

        // 6140
        $asetlancar6140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6140')->get();
        $debit6140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6140')->sum('nilai_debit');
        $kredit6140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6140')->sum('nilai_kredit');
        $saldo6140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6140')->get()->first();
        if($saldo6140==null){
            $fiskal6140=0;
        }else{
           $fiskal6140=$saldo6140->saldo - $debit6140 + $kredit6140;
        }                
        // 6140

        // 6150
        $asetlancar6150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6150')->get();
        $debit6150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6150')->sum('nilai_debit');
        $kredit6150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6150')->sum('nilai_kredit');
        $saldo6150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6150')->get()->first();
        if($saldo6150==null){
            $fiskal6150=0;
        }else{
           $fiskal6150=$saldo6150->saldo - $debit6150 + $kredit6150;
        }                
        // 6150

        // 6160
        $asetlancar6160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6160')->get();
        $debit6160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6160')->sum('nilai_debit');
        $kredit6160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6160')->sum('nilai_kredit');
        $saldo6160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6160')->get()->first();
        if($saldo6160==null){
            $fiskal6160=0;
        }else{
           $fiskal6160=$saldo6160->saldo - $debit6160 + $kredit6160;
        }                
        // 6160

        // 6170
        $asetlancar6170=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6170')->get();
        $debit6170=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6170')->sum('nilai_debit');
        $kredit6170=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6170')->sum('nilai_kredit');
        $saldo6170=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6170')->get()->first();
        if($saldo6170==null){
            $fiskal6170=0;
        }else{
           $fiskal6170=$saldo6170->saldo - $debit6170 + $kredit6170;
        }                
        // 6170

        // 6180
        $asetlancar6180=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6180')->get();
        $debit6180=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6180')->sum('nilai_debit');
        $kredit6180=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6180')->sum('nilai_kredit');
        $saldo6180=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6180')->get()->first();
        if($saldo6180==null){
            $fiskal6180=0;
        }else{
           $fiskal6180=$saldo6180->saldo - $debit6180 + $kredit6180;
        }                
        // 6180
        
        // 6190
        $asetlancar6190=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6190')->get();
        $debit6190=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6190')->sum('nilai_debit');
        $kredit6190=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6190')->sum('nilai_kredit');
        $saldo6190=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6190')->get()->first();
        if($saldo6190==null){
            $fiskal6190=0;
        }else{
           $fiskal6190=$saldo6190->saldo - $debit6190 + $kredit6190;
        }                
        // 6190
        
        // 6200
        $asetlancar6200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6200')->get();
        $debit6200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6200')->sum('nilai_debit');
        $kredit6200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6200')->sum('nilai_kredit');
        $saldo6200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6200')->get()->first();
        if($saldo6200==null){
            $fiskal6200=0;
        }else{
           $fiskal6200=$saldo6200->saldo - $debit6200 + $kredit6200;
        }                
        // 6200

        // 6210
        $asetlancar6210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6210')->get();
        $debit6210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6210')->sum('nilai_debit');
        $kredit6210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6210')->sum('nilai_kredit');
        $saldo6210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6210')->get()->first();
        if($saldo6210==null){
            $fiskal6210=0;
        }else{
           $fiskal6210=$saldo6210->saldo - $debit6210 + $kredit6210;
        }                
        // 6210

        // 6220
        $asetlancar6220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6220')->get();
        $debit6220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6220')->sum('nilai_debit');
        $kredit6220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6220')->sum('nilai_kredit');
        $saldo6220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6220')->get()->first();
        if($saldo6220==null){
            $fiskal6220=0;
        }else{
           $fiskal6220=$saldo6220->saldo - $debit6220 + $kredit6220;
        }                
        // 6220

        // 6230
        $asetlancar6230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6230')->get();
        $debit6230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6230')->sum('nilai_debit');
        $kredit6230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6230')->sum('nilai_kredit');
        $saldo6230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6230')->get()->first();
        if($saldo6230==null){
            $fiskal6230=0;
        }else{
           $fiskal6230=$saldo6230->saldo - $debit6230 + $kredit6230;
        }                
        // 6230

        // 6240
        $asetlancar6240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6240')->get();
        $debit6240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6240')->sum('nilai_debit');
        $kredit6240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6240')->sum('nilai_kredit');
        $saldo6240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6240')->get()->first();
        if($saldo6240==null){
            $fiskal6240=0;
        }else{
           $fiskal6240=$saldo6240->saldo - $debit6240 + $kredit6240;
        }                
        // 6240

        // 6250
        $asetlancar6250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6250')->get();
        $debit6250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6250')->sum('nilai_debit');
        $kredit6250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6250')->sum('nilai_kredit');
        $saldo6250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6250')->get()->first();
        if($saldo6250==null){
            $fiskal6250=0;
        }else{
           $fiskal6250=$saldo6250->saldo - $debit6250 + $kredit6250;
        }                
        // 6250

        // 6260
        $asetlancar6260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6260')->get();
        $debit6260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6260')->sum('nilai_debit');
        $kredit6260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6260')->sum('nilai_kredit');
        $saldo6260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6260')->get()->first();
        if($saldo6260==null){
            $fiskal6260=0;
        }else{
           $fiskal6260=$saldo6260->saldo - $debit6260 + $kredit6260;
        }                
        // 6260

        // 6270
        $asetlancar6270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6270')->get();
        $debit6270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6270')->sum('nilai_debit');
        $kredit6270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6270')->sum('nilai_kredit');
        $saldo6270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6270')->get()->first();
        if($saldo6270==null){
            $fiskal6270=0;
        }else{
           $fiskal6270=$saldo6270->saldo - $debit6270 + $kredit6270;
        }                
        // 6270

        // 6280
        $asetlancar6280=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6280')->get();
        $debit6280=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6280')->sum('nilai_debit');
        $kredit6280=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6280')->sum('nilai_kredit');
        $saldo6280=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6280')->get()->first();
        if($saldo6280==null){
            $fiskal6280=0;
        }else{
           $fiskal6280=$saldo6280->saldo - $debit6280 + $kredit6280;
        }                
        // 6280

        // 6290
        $asetlancar6290=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6290')->get();
        $debit6290=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6290')->sum('nilai_debit');
        $kredit6290=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6290')->sum('nilai_kredit');
        $saldo6290=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6290')->get()->first();
        if($saldo6290==null){
            $fiskal6290=0;
        }else{
           $fiskal6290=$saldo6290->saldo - $debit6290 + $kredit6290;
        }                
        // 6290

        // 6300
        $asetlancar6300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6300')->get();
        $debit6300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6300')->sum('nilai_debit');
        $kredit6300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6300')->sum('nilai_kredit');
        $saldo6300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6300')->get()->first();
        if($saldo6300==null){
            $fiskal6300=0;
        }else{
           $fiskal6300=$saldo6300->saldo - $debit6300 + $kredit6300;
        }                
        // 6300

        // 6310
        $asetlancar6310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6310')->get();
        $debit6310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6310')->sum('nilai_debit');
        $kredit6310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6310')->sum('nilai_kredit');
        $saldo6310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6310')->get()->first();
        if($saldo6310==null){
            $fiskal6310=0;
        }else{
           $fiskal6310=$saldo6310->saldo - $debit6310 + $kredit6310;
        }                
        // 6310

        // 6320
        $asetlancar6320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6320')->get();
        $debit6320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6320')->sum('nilai_debit');
        $kredit6320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6320')->sum('nilai_kredit');
        $saldo6320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6320')->get()->first();
        if($saldo6320==null){
            $fiskal6320=0;
        }else{
           $fiskal6320=$saldo6320->saldo - $debit6320 + $kredit6320;
        }                
        // 6320

        // 6330
        $asetlancar6330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6330')->get();
        $debit6330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6330')->sum('nilai_debit');
        $kredit6330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6330')->sum('nilai_kredit');
        $saldo6330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6330')->get()->first();
        if($saldo6330==null){
            $fiskal6330=0;
        }else{
           $fiskal6330=$saldo6330->saldo - $debit6330 + $kredit6330;
        }                
        // 6330

        // 6340
        $asetlancar6340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6340')->get();
        $debit6340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6340')->sum('nilai_debit');
        $kredit6340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6340')->sum('nilai_kredit');
        $saldo6340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6340')->get()->first();
        if($saldo6340==null){
            $fiskal6340=0;
        }else{
           $fiskal6340=$saldo6340->saldo - $debit6340 + $kredit6340;
        }                
        // 6340

        // 6350
        $asetlancar6350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6350')->get();
        $debit6350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6350')->sum('nilai_debit');
        $kredit6350=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6350')->sum('nilai_kredit');
        $saldo6350=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6350')->get()->first();
        if($saldo6350==null){
            $fiskal6350=0;
        }else{
           $fiskal6350=$saldo6350->saldo - $debit6350 + $kredit6350;
        }                
        // 6350

        // 6360
        $asetlancar6360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6360')->get();
        $debit6360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6360')->sum('nilai_debit');
        $kredit6360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6360')->sum('nilai_kredit');
        $saldo6360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6360')->get()->first();
        if($saldo6360==null){
            $fiskal6360=0;
        }else{
           $fiskal6360=$saldo6360->saldo - $debit6360 + $kredit6360;
        }                
        // 6360

        // 6370
        $asetlancar6370=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6370')->get();
        $debit6370=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6370')->sum('nilai_debit');
        $kredit6370=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6370')->sum('nilai_kredit');
        $saldo6370=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6370')->get()->first();
        if($saldo6370==null){
            $fiskal6370=0;
        }else{
           $fiskal6370=$saldo6370->saldo - $debit6370 + $kredit6370;
        }                
        // 6370

        // 6380
        $asetlancar6380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6380')->get();
        $debit6380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6380')->sum('nilai_debit');
        $kredit6380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6380')->sum('nilai_kredit');
        $saldo6380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6380')->get()->first();
        if($saldo6380==null){
            $fiskal6380=0;
        }else{
           $fiskal6380=$saldo6380->saldo - $debit6380 + $kredit6380;
        }                
        // 6380

        // 6390
        $asetlancar6390=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6390')->get();
        $debit6390=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6390')->sum('nilai_debit');
        $kredit6390=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6390')->sum('nilai_kredit');
        $saldo6390=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6390')->get()->first();
        if($saldo6390==null){
            $fiskal6390=0;
        }else{
           $fiskal6390=$saldo6390->saldo - $debit6390 + $kredit6390;
        }                
        // 6390

        // 6400
        $asetlancar6400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6400')->get();
        $debit6400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6400')->sum('nilai_debit');
        $kredit6400=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6400')->sum('nilai_kredit');
        $saldo6400=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6400')->get()->first();
        if($saldo6400==null){
            $fiskal6400=0;
        }else{
           $fiskal6400=$saldo6400->saldo - $debit6400 + $kredit6400;
        }                
        // 6400

        // 6410
        $asetlancar6410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6410')->get();
        $debit6410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6410')->sum('nilai_debit');
        $kredit6410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6410')->sum('nilai_kredit');
        $saldo6410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6410')->get()->first();
        if($saldo6410==null){
            $fiskal6410=0;
        }else{
           $fiskal6410=$saldo6410->saldo - $debit6410 + $kredit6410;
        }                
        // 6410

        // 6420
        $asetlancar6420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6420')->get();
        $debit6420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6420')->sum('nilai_debit');
        $kredit6420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6420')->sum('nilai_kredit');
        $saldo6420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6420')->get()->first();
        if($saldo6420==null){
            $fiskal6420=0;
        }else{
           $fiskal6420=$saldo6420->saldo - $debit6420 + $kredit6420;
        }                
        // 6420

        // 6430
        $asetlancar6430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6430')->get();
        $debit6430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6430')->sum('nilai_debit');
        $kredit6430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6430')->sum('nilai_kredit');
        $saldo6430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6430')->get()->first();
        if($saldo6430==null){
            $fiskal6430=0;
        }else{
           $fiskal6430=$saldo6430->saldo - $debit6430 + $kredit6430;
        }                
        // 6430

        // 6440
        $asetlancar6440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6440')->get();
        $debit6440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6440')->sum('nilai_debit');
        $kredit6440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6440')->sum('nilai_kredit');
        $saldo6440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6440')->get()->first();
        if($saldo6440==null){
            $fiskal6440=0;
        }else{
           $fiskal6440=$saldo6440->saldo - $debit6440 + $kredit6440;
        }                
        // 6440

        // 6450
        $asetlancar6450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6450')->get();
        $debit6450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6450')->sum('nilai_debit');
        $kredit6450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6450')->sum('nilai_kredit');
        $saldo6450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6450')->get()->first();
        if($saldo6450==null){
            $fiskal6450=0;
        }else{
           $fiskal6450=$saldo6450->saldo - $debit6450 + $kredit6450;
        }                
        // 6450
        
        // 6460
        $asetlancar6460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6460')->get();
        $debit6460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6460')->sum('nilai_debit');
        $kredit6460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6460')->sum('nilai_kredit');
        $saldo6460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6460')->get()->first();
        if($saldo6460==null){
            $fiskal6460=0;
        }else{
           $fiskal6460=$saldo6460->saldo - $debit6460 + $kredit6460;
        }                
        // 6460
        // 6470
        $asetlancar6470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6470')->get();
        $debit6470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6470')->sum('nilai_debit');
        $kredit6470=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6470')->sum('nilai_kredit');
        $saldo6470=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6470')->get()->first();
        if($saldo6470==null){
            $fiskal6470=0;
        }else{
           $fiskal6470=$saldo6470->saldo - $debit6470 + $kredit6470;
        }                
        // 6470

        // 6480
        $asetlancar6480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6480')->get();
        $debit6480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6480')->sum('nilai_debit');
        $kredit6480=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6480')->sum('nilai_kredit');
        $saldo6480=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6480')->get()->first();
        if($saldo6480==null){
            $fiskal6480=0;
        }else{
           $fiskal6480=$saldo6480->saldo - $debit6480 + $kredit6480;
        }                
        // 6480

        // 6490
        $asetlancar6490=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6490')->get();
        $debit6490=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6490')->sum('nilai_debit');
        $kredit6490=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6490')->sum('nilai_kredit');
        $saldo6490=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6490')->get()->first();
        if($saldo6490==null){
            $fiskal6490=0;
        }else{
           $fiskal6490=$saldo6490->saldo - $debit6490 + $kredit6490;
        }                
        // 6490

        // 6500
        $asetlancar6500=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6500')->get();
        $debit6500=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6500')->sum('nilai_debit');
        $kredit6500=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6500')->sum('nilai_kredit');
        $saldo6500=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6500')->get()->first();
        if($saldo6500==null){
            $fiskal6500=0;
        }else{
           $fiskal6500=$saldo6500->saldo - $debit6500 + $kredit6500;
        }                
        // 6500

        // 6510
        $asetlancar6510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6510')->get();
        $debit6510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6510')->sum('nilai_debit');
        $kredit6510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6510')->sum('nilai_kredit');
        $saldo6510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6510')->get()->first();
        if($saldo6510==null){
            $fiskal6510=0;
        }else{
           $fiskal6510=$saldo6510->saldo - $debit6510 + $kredit6510;
        }                
        // 6510

        // 6520
        $asetlancar6520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6520')->get();
        $debit6520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6520')->sum('nilai_debit');
        $kredit6520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6520')->sum('nilai_kredit');
        $saldo6520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6520')->get()->first();
        if($saldo6520==null){
            $fiskal6520=0;
        }else{
           $fiskal6520=$saldo6520->saldo - $debit6520 + $kredit6520;
        }                
        // 6520

        // 6530
        $asetlancar6530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6530')->get();
        $debit6530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6530')->sum('nilai_debit');
        $kredit6530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6530')->sum('nilai_kredit');
        $saldo6530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6530')->get()->first();
        if($saldo6530==null){
            $fiskal6530=0;
        }else{
           $fiskal6530=$saldo6530->saldo - $debit6530 + $kredit6530;
        }                
        // 6530

        // 6540
        $asetlancar6540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6540')->get();
        $debit6540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6540')->sum('nilai_debit');
        $kredit6540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6540')->sum('nilai_kredit');
        $saldo6540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6540')->get()->first();
        if($saldo6540==null){
            $fiskal6540=0;
        }else{
           $fiskal6540=$saldo6540->saldo - $debit6540 + $kredit6540;
        }                
        // 6540

        // 6600
        $asetlancar6600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6600')->get();
        $debit6600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','6600')->sum('nilai_debit');
        $kredit6600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','6600')->sum('nilai_kredit');
        $saldo6600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','6600')->get()->first();
        if($saldo6600==null){
            $fiskal6600=0;
        }else{
           $fiskal6600=$saldo6600->saldo - $debit6600 + $kredit6600;
        }                
        // 6600

        // 7100
        $asetlancar7100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7100')->get();
        $debit7100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','7100')->sum('nilai_debit');
        $kredit7100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','7100')->sum('nilai_kredit');
        $saldo7100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7100')->get()->first();
        if($saldo7100==null){
            $fiskal7100=0;
        }else{
           $fiskal7100=$saldo7100->saldo + $debit7100 - $kredit7100;
        }                
        // 7100

        // 7110
        $asetlancar7110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7110')->get();
        $debit7110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','7110')->sum('nilai_debit');
        $kredit7110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','7110')->sum('nilai_kredit');
        $saldo7110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','7110')->get()->first();
        if($saldo7110==null){
            $fiskal7110=0;
        }else{
           $fiskal7110=$saldo7110->saldo + $debit7110 - $kredit7110;
        }                
        // 7110

        // 8100
        $asetlancar8100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8100')->get();
        $debit8100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8100')->sum('nilai_debit');
        $kredit8100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8100')->sum('nilai_kredit');
        $saldo8100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8100')->get()->first();
        if($saldo8100==null){
            $fiskal8100=0;
        }else{
           $fiskal8100=$saldo8100->saldo + $debit8100 - $kredit8100;
        }                
        // 8100

        // 8110
        $asetlancar8110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8110')->get();
        $debit8110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8110')->sum('nilai_debit');
        $kredit8110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8110')->sum('nilai_kredit');
        $saldo8110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8110')->get()->first();
        if($saldo8110==null){
            $fiskal8110=0;
        }else{
           $fiskal8110=$saldo8110->saldo + $debit8110 - $kredit8110;
        }                
        // 8110
        // 8120
        $asetlancar8120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8120')->get();
        $debit8120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','8120')->sum('nilai_debit');
        $kredit8120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','8120')->sum('nilai_kredit');
        $saldo8120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','8120')->get()->first();
        if($saldo8120==null){
            $fiskal8120=0;
        }else{
           $fiskal8120=$saldo8120->saldo + $debit8120 - $kredit8120;
        }                
        // 8120

        $totalpenjualan=LatihanKeuangan::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalpenjualanfiskal=$fiskal4100+$fiskal4101+$fiskal4102+$fiskal4103+$fiskal4104+$fiskal4200+$fiskal4201+$fiskal4202+$fiskal4203+$fiskal4300+$fiskal4310+$fiskal4320+$fiskal4330+$fiskal4340+$fiskal4350+$fiskal4105;
        $totalharpok=LatihanKeuangan::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalharpokfiskal= $fiskal5100+$fiskal5110+$fiskal5120+$fiskal5200+$fiskal5210+$fiskal5211+$fiskal5212+$fiskal5213+$fiskal5250+$fiskal5260+$fiskal5300+$fiskal5400+$fiskal5410+$fiskal5420+$fiskal5430+$fiskal5440+$fiskal5450+$fiskal5460+$fiskal5470+$fiskal5480+$fiskal5600;
        $totalbiayaoperasional=LatihanKeuangan::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $totalbiayaoperasionalfiskal=$fiskal6100+$fiskal6110+$fiskal6120+$fiskal6130+$fiskal6140+$fiskal6150+$fiskal6160+$fiskal6170+$fiskal6180+$fiskal6190+$fiskal6200+$fiskal6210+$fiskal6220+$fiskal6230+$fiskal6240+$fiskal6250+$fiskal6260+$fiskal6270+$fiskal6280+$fiskal6290+$fiskal6300+$fiskal6310+$fiskal6320+$fiskal6330+$fiskal6340+$fiskal6350+$fiskal6360+$fiskal6370+$fiskal6380+$fiskal6390+$fiskal6400+$fiskal6410+$fiskal6420+$fiskal6430+$fiskal6440+$fiskal6450+$fiskal6460+$fiskal6470+$fiskal6480+$fiskal6490+$fiskal6500+$fiskal6510+$fiskal6520+$fiskal6530+$fiskal6540+$fiskal6600;
        $jumlahpendapatanlain=LatihanKeuangan::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahpendapatanlainfiskal=$fiskal7100+$fiskal7110;
        $jumlahbebanlain=LatihanKeuangan::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        $jumlahbebanlainfiskal=$fiskal8100+$fiskal8110+$fiskal8120;
        
        $labakotor = $totalpenjualan-$totalharpok;
        $labakotorfiskal = $totalpenjualanfiskal-$totalharpokfiskal;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $labaoperasionalfiskal = $labakotorfiskal-$totalbiayaoperasionalfiskal;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $totalpendapatandanbebanlainfiskal = $jumlahpendapatanlainfiskal-$jumlahbebanlainfiskal;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','>','4000')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','>','4000')->sum('nilai_kredit');
        $totalkomersial = $ikhtisarlabarugi+$totaldebit-$totalkredit;
        
        $pajakpenghasiliktisarlabarugi = $ikhtisarlabarugi*22/100;
        $pajakpenghasiltotalkomersial = $totalkomersial*22/100;
        $data =[
            'title' =>'LAPORAN LABA RUGI FISKAL',
        ];

        $pdf = PDF::loadView('pdf.printpdflatihanlabarugifiskal',$data,compact(
            'totalpendapatandanbebanlainfiskal',
            'totalpenjualanfiskal','totalharpokfiskal','labakotorfiskal','totalbiayaoperasionalfiskal','labaoperasionalfiskal','jumlahpendapatanlainfiskal','jumlahbebanlainfiskal',
            'fiskal4300','fiskal4203','fiskal4202','fiskal4201','fiskal4200','fiskal4104','fiskal4103','fiskal4102','fiskal4101','fiskal4100','fiskal4340',
            'fiskal5211','fiskal5210','fiskal5200','fiskal5120','fiskal5110','fiskal5100','fiskal4105','fiskal4350','fiskal4330','fiskal4320','fiskal4310',
            'fiskal5450','fiskal5440','fiskal5430','fiskal5420','fiskal5410','fiskal5400','fiskal5300','fiskal5260','fiskal5250','fiskal5213','fiskal5212',
            'fiskal6160','fiskal6150','fiskal6140','fiskal6130','fiskal6120','fiskal6110','fiskal6100','fiskal5600','fiskal5480','fiskal5470','fiskal5460',
            'fiskal6270','fiskal6260','fiskal6250','fiskal6240','fiskal6230','fiskal6220','fiskal6210','fiskal6200','fiskal6190','fiskal6180','fiskal6170',
            'fiskal6380','fiskal6370','fiskal6360','fiskal6350','fiskal6340','fiskal6330','fiskal6320','fiskal6310','fiskal6300','fiskal6290','fiskal6280',
            'fiskal6600','fiskal6540','fiskal6530','fiskal6520','fiskal6510','fiskal6500','fiskal6490','fiskal6480','fiskal6470','fiskal6460','fiskal6450',
            'fiskal7100','fiskal7110','fiskal8100','fiskal8110','fiskal8120','fiskal6440','fiskal6430','fiskal6420','fiskal6410','fiskal6400','fiskal6390',
            'pajakpenghasiliktisarlabarugi','pajakpenghasiltotalkomersial',
            'totaldebit','totalkredit','totalkomersial',
            'totalpenjualan','totalharpok','totalbiayaoperasional','jumlahpendapatanlain',
            'jumlahbebanlain','labakotor','labaoperasional','totalpendapatandanbebanlain',
            'ikhtisarlabarugi',
            'asetlancar4100','debit4100','kredit4100',
            'asetlancar4101','debit4101','kredit4101',
            'asetlancar4102','debit4102','kredit4102',
            'asetlancar4103','debit4103','kredit4103',
            'asetlancar4104','debit4104','kredit4104',
            'asetlancar4200','debit4200','kredit4200',
            'asetlancar4201','debit4201','kredit4201',
            'asetlancar4202','debit4202','kredit4202',
            'asetlancar4203','debit4203','kredit4203',
            'asetlancar4300','debit4300','kredit4300',
            'asetlancar4310','debit4310','kredit4310',
            'asetlancar4320','debit4320','kredit4320',
            'asetlancar4330','debit4330','kredit4330',
            'asetlancar4340','debit4340','kredit4340',
            'asetlancar4350','debit4350','kredit4350',
            'asetlancar4105','debit4105','kredit4105',
            'asetlancar5100','debit5100','kredit5100',
            'asetlancar5110','debit5110','kredit5110',
            'asetlancar5120','debit5120','kredit5120',
            'asetlancar5200','debit5200','kredit5200',
            'asetlancar5210','debit5210','kredit5210',
            'asetlancar5211','debit5211','kredit5211',
            'asetlancar5212','debit5212','kredit5212',
            'asetlancar5213','debit5213','kredit5213',
            'asetlancar5250','debit5250','kredit5250',
            'asetlancar5260','debit5260','kredit5260',
            'asetlancar5300','debit5300','kredit5300',
            'asetlancar5400','debit5400','kredit5400',
            'asetlancar5410','debit5410','kredit5410',
            'asetlancar5420','debit5420','kredit5420',
            'asetlancar5430','debit5430','kredit5430',
            'asetlancar5440','debit5440','kredit5440',
            'asetlancar5450','debit5450','kredit5450',
            'asetlancar5460','debit5460','kredit5460',
            'asetlancar5470','debit5470','kredit5470',
            'asetlancar5480','debit5480','kredit5480',
            'asetlancar5600','debit5600','kredit5600',
            'asetlancar6100','debit6100','kredit6100',
            'asetlancar6110','debit6110','kredit6110',
            'asetlancar6120','debit6120','kredit6120',
            'asetlancar6130','debit6130','kredit6130',
            'asetlancar6140','debit6140','kredit6140',
            'asetlancar6150','debit6150','kredit6150',
            'asetlancar6160','debit6160','kredit6160',
            'asetlancar6170','debit6170','kredit6170',
            'asetlancar6180','debit6180','kredit6180',
            'asetlancar6190','debit6190','kredit6190',
            'asetlancar6200','debit6200','kredit6200',
            'asetlancar6210','debit6210','kredit6210',
            'asetlancar6220','debit6220','kredit6220',
            'asetlancar6230','debit6230','kredit6230',
            'asetlancar6240','debit6240','kredit6240',
            'asetlancar6250','debit6250','kredit6250',
            'asetlancar6260','debit6260','kredit6260',
            'asetlancar6270','debit6270','kredit6270',
            'asetlancar6280','debit6280','kredit6280',
            'asetlancar6290','debit6290','kredit6290',
            'asetlancar6300','debit6300','kredit6300',
            'asetlancar6310','debit6310','kredit6310',
            'asetlancar6320','debit6320','kredit6320',
            'asetlancar6330','debit6330','kredit6330',
            'asetlancar6340','debit6340','kredit6340',
            'asetlancar6350','debit6350','kredit6350',
            'asetlancar6360','debit6360','kredit6360',
            'asetlancar6370','debit6370','kredit6370',
            'asetlancar6380','debit6380','kredit6380',
            'asetlancar6390','debit6390','kredit6390',
            'asetlancar6400','debit6400','kredit6400',
            'asetlancar6410','debit6410','kredit6410',
            'asetlancar6420','debit6420','kredit6420',
            'asetlancar6430','debit6430','kredit6430',
            'asetlancar6440','debit6440','kredit6440',
            'asetlancar6450','debit6450','kredit6450',
            'asetlancar6460','debit6460','kredit6460',
            'asetlancar6470','debit6470','kredit6470',
            'asetlancar6480','debit6480','kredit6480',
            'asetlancar6490','debit6490','kredit6490',
            'asetlancar6500','debit6500','kredit6500',
            'asetlancar6510','debit6510','kredit6510',
            'asetlancar6520','debit6520','kredit6520',
            'asetlancar6530','debit6530','kredit6530',
            'asetlancar6540','debit6540','kredit6540',
            'asetlancar6600','debit6600','kredit6600',
            'asetlancar7100','debit7100','kredit7100',
            'asetlancar7110','debit7110','kredit7110',
            'asetlancar8100','debit8100','kredit8100',
            'asetlancar8110','debit8110','kredit8110',
            'asetlancar8120','debit8120','kredit8120',
        ));
        return $pdf->stream('dokumen.pdf'); 

    }
    public function latihanneracafiskalPDFshow(Request $request){
        $id=$request->user_id;

        // 1110
        $asetlancar1110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1110')->get();
        $debit1110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1110')->sum('nilai_debit');
        $kredit1110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1110')->sum('nilai_kredit');
        $saldo1110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1110')->get()->first();
        if($saldo1110==null){
            $fiskal1110=0;
        }else{
            $fiskal1110=$saldo1110->saldo+$debit1110-$kredit1110;
        }
        // 1110
        
        // 1111
        $asetlancar1111=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1111')->get();
        $debit1111=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1111')->sum('nilai_debit');
        $kredit1111=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1111')->sum('nilai_kredit');
        $saldo1111=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1111')->get()->first();
        if($saldo1111==null){
            $fiskal1111=0;
        }else{
            $fiskal1111=$saldo1111->saldo+$debit1111-$kredit1111;
        }
        // 1111
        
        // 1112
        $asetlancar1112=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1112')->get();
        $debit1112=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1112')->sum('nilai_debit');
        $kredit1112=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1112')->sum('nilai_kredit');
        $saldo1112=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1112')->get()->first();
        if($saldo1112==null){
            $fiskal1112=0;
        }else{
            $fiskal1112=$saldo1112->saldo+$debit1112-$kredit1112;
        }
        // 1112

        // 1113
        $asetlancar1113=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1113')->get();
        $debit1113=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1113')->sum('nilai_debit');
        $kredit1113=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1113')->sum('nilai_kredit');
        $saldo1113=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1113')->get()->first();
        if($saldo1113==null){
            $fiskal1113=0;
        }else{
            $fiskal1113=$saldo1113->saldo+$debit1113-$kredit1113;
        }
        // 1113

        // 1114
        $asetlancar1114=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1114')->get();
        $debit1114=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1114')->sum('nilai_debit');
        $kredit1114=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1114')->sum('nilai_kredit');
        $saldo1114=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1114')->get()->first();
        if($saldo1114==null){
            $fiskal1114=0;
        }else{
            $fiskal1114=$saldo1114->saldo+$debit1114-$kredit1114;
        }
        // 1114

        // 1120
        $asetlancar1120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1120')->get();
        $debit1120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1120')->sum('nilai_debit');
        $kredit1120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1120')->sum('nilai_kredit');
        $saldo1120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1120')->get()->first();
        if($saldo1120==null){
            $fiskal1120=0;
        }else{
            $fiskal1120=$saldo1120->saldo+$debit1120-$kredit1120;
        }
        // 1120

        // 1130
        $asetlancar1130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1130')->get();
        $debit1130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1130')->sum('nilai_debit');
        $kredit1130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1130')->sum('nilai_kredit');
        $saldo1130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1130')->get()->first();
        if($saldo1130==null){
            $fiskal1130=0;
        }else{
            $fiskal1130=$saldo1130->saldo+$debit1130-$kredit1130;
        }
        // 1130
        
        // 1210
        $asetlancar1210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1210')->get();
        $debit1210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1210')->sum('nilai_debit');
        $kredit1210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1210')->sum('nilai_kredit');
        $saldo1210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1210')->get()->first();
        if($saldo1210==null){
            $fiskal1210=0;
        }else{
            $fiskal1210=$saldo1210->saldo+$debit1210-$kredit1210;
        }
        // 1210

        // 1220
        $asetlancar1220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1220')->get();
        $debit1220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1220')->sum('nilai_debit');
        $kredit1220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1220')->sum('nilai_kredit');
        $saldo1220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1220')->get()->first();
        if($saldo1220==null){
            $fiskal1220=0;
        }else{
            $fiskal1220=$saldo1220->saldo+$debit1220-$kredit1220;
        }
        // 1220

        // 1230
        $asetlancar1230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1230')->get();
        $debit1230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1230')->sum('nilai_debit');
        $kredit1230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1230')->sum('nilai_kredit');
        $saldo1230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1230')->get()->first();
        if($saldo1230==null){
            $fiskal1230=0;
        }else{
            $fiskal1230=$saldo1230->saldo+$debit1230-$kredit1230;
        }
        // 1230

        // 1240
        $asetlancar1240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1240')->get();
        $debit1240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1240')->sum('nilai_debit');
        $kredit1240=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1240')->sum('nilai_kredit');
        $saldo1240=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1240')->get()->first();
        if($saldo1240==null){
            $fiskal1240=0;
        }else{
            $fiskal1240=$saldo1240->saldo+$debit1240-$kredit1240;
        }
        // 1240

        // 1250
        $asetlancar1250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1250')->get();
        $debit1250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1250')->sum('nilai_debit');
        $kredit1250=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1250')->sum('nilai_kredit');
        $saldo1250=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1250')->get()->first();
        if($saldo1250==null){
            $fiskal1250=0;
        }else{
            $fiskal1250=$saldo1250->saldo+$debit1250-$kredit1250;
        }
        // 1250

        // 1251
        $asetlancar1251=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1251')->get();
        $debit1251=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1251')->sum('nilai_debit');
        $kredit1251=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1251')->sum('nilai_kredit');
        $saldo1251=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1251')->get()->first();
        if($saldo1251==null){
            $fiskal1251=0;
        }else{
            $fiskal1251=$saldo1251->saldo+$debit1251-$kredit1251;
        }
        // 1251

        // 1260
        $asetlancar1260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1260')->get();
        $debit1260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1260')->sum('nilai_debit');
        $kredit1260=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1260')->sum('nilai_kredit');
        $saldo1260=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1260')->get()->first();
        if($saldo1260==null){
            $fiskal1260=0;
        }else{
            $fiskal1260=$saldo1260->saldo+$debit1260-$kredit1260;
        }
        // 1260
        // 1270
        $asetlancar1270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1270')->get();
        $debit1270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1270')->sum('nilai_debit');
        $kredit1270=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1270')->sum('nilai_kredit');
        $saldo1270=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1270')->get()->first();
        if($saldo1270==null){
            $fiskal1270=0;
        }else{
            $fiskal1270=$saldo1270->saldo+$debit1270-$kredit1270;
        }
        // 1270
        // 1271
        $asetlancar1271=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1271')->get();
        $debit1271=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1271')->sum('nilai_debit');
        $kredit1271=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1271')->sum('nilai_kredit');
        $saldo1271=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1271')->get()->first();
        if($saldo1271==null){
            $fiskal1271=0;
        }else{
            $fiskal1271=$saldo1271->saldo+$debit1271-$kredit1271;
        }
        // 1271
        // 1272
        $asetlancar1272=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1272')->get();
        $debit1272=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1272')->sum('nilai_debit');
        $kredit1272=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1272')->sum('nilai_kredit');
        $saldo1272=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1272')->get()->first();
        if($saldo1272==null){
            $fiskal1272=0;
        }else{
            $fiskal1272=$saldo1272->saldo+$debit1272-$kredit1272;
        }
        // 1272
        // 1273
        $asetlancar1273=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1273')->get();
        $debit1273=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1273')->sum('nilai_debit');
        $kredit1273=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1273')->sum('nilai_kredit');
        $saldo1273=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1273')->get()->first();
        if($saldo1273==null){
            $fiskal1273=0;
        }else{
            $fiskal1273=$saldo1273->saldo+$debit1273-$kredit1273;
        }
        // 1273
        // 1274
        $asetlancar1274=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1274')->get();
        $debit1274=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1274')->sum('nilai_debit');
        $kredit1274=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1274')->sum('nilai_kredit');
        $saldo1274=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1274')->get()->first();
        if($saldo1274==null){
            $fiskal1274=0;
        }else{
            $fiskal1274=$saldo1274->saldo+$debit1274-$kredit1274;
        }
        // 1274
        // 1275
        $asetlancar1275=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1275')->get();
        $debit1275=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1275')->sum('nilai_debit');
        $kredit1275=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1275')->sum('nilai_kredit');
        $saldo1275=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1275')->get()->first();
        if($saldo1275==null){
            $fiskal1275=0;
        }else{
            $fiskal1275=$saldo1275->saldo+$debit1275-$kredit1275;
        }
        // 1275
        // 1310
        $asetlancar1310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1310')->get();
        $debit1310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1310')->sum('nilai_debit');
        $kredit1310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1310')->sum('nilai_kredit');
        $saldo1310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1310')->get()->first();
        if($saldo1310==null){
            $fiskal1310=0;
        }else{
            $fiskal1310=$saldo1310->saldo+$debit1310-$kredit1310;
        }
        // 1310
        // 1312
        $asetlancar1312=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1312')->get();
        $debit1312=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1312')->sum('nilai_debit');
        $kredit1312=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1312')->sum('nilai_kredit');
        $saldo1312=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1312')->get()->first();
        if($saldo1312==null){
            $fiskal1312=0;
        }else{
            $fiskal1312=$saldo1312->saldo+$debit1312-$kredit1312;
        }
        // 1312
        
        // 1313
        $asetlancar1313=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1313')->get();
        $debit1313=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1313')->sum('nilai_debit');
        $kredit1313=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1313')->sum('nilai_kredit');
        $saldo1313=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1313')->get()->first();
        if($saldo1313==null){
            $fiskal1313=0;
        }else{
            $fiskal1313=$saldo1313->saldo+$debit1313-$kredit1313;
        }
        // 1313
        
        // 1314
        $asetlancar1314=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1314')->get();
        $debit1314=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1314')->sum('nilai_debit');
        $kredit1314=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1314')->sum('nilai_kredit');
        $saldo1314=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1314')->get()->first();
        if($saldo1314==null){
            $fiskal1314=0;
        }else{
            $fiskal1314=$saldo1314->saldo+$debit1314-$kredit1314;
        }
        // 1314

        // 1330
        $asetlancar1330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1330')->get();
        $debit1330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1330')->sum('nilai_debit');
        $kredit1330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1330')->sum('nilai_kredit');
        $saldo1330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1330')->get()->first();
        if($saldo1330==null){
            $fiskal1330=0;
        }else{
            $fiskal1330=$saldo1330->saldo+$debit1330-$kredit1330;
        }
        // 1330
        // 1340
        $asetlancar1340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1340')->get();
        $debit1340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1340')->sum('nilai_debit');
        $kredit1340=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1340')->sum('nilai_kredit');
        $saldo1340=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1340')->get()->first();
        if($saldo1340==null){
            $fiskal1340=0;
        }else{
            $fiskal1340=$saldo1340->saldo+$debit1340-$kredit1340;
        }
        // 1340
        // 1341
        $asetlancar1341=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1341')->get();
        $debit1341=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1341')->sum('nilai_debit');
        $kredit1341=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1341')->sum('nilai_kredit');
        $saldo1341=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1341')->get()->first();
        if($saldo1341==null){
            $fiskal1341=0;
        }else{
            $fiskal1341=$saldo1341->saldo+$debit1341-$kredit1341;
        }
        // 1341
        // 1342
        $asetlancar1342=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1342')->get();
        $debit1342=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1342')->sum('nilai_debit');
        $kredit1342=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1342')->sum('nilai_kredit');
        $saldo1342=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1342')->get()->first();
        if($saldo1342==null){
            $fiskal1342=0;
        }else{
            $fiskal1342=$saldo1342->saldo+$debit1342-$kredit1342;
        }
        // 1342
        // 1360
        $asetlancar1360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1360')->get();
        $debit1360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1360')->sum('nilai_debit');
        $kredit1360=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1360')->sum('nilai_kredit');
        $saldo1360=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1360')->get()->first();
        if($saldo1360==null){
            $fiskal1360=0;
        }else{
            $fiskal1360=$saldo1360->saldo+$debit1360-$kredit1360;
        }
        // 1360
        // 1361
        $asetlancar1361=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1361')->get();
        $debit1361=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1361')->sum('nilai_debit');
        $kredit1361=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1361')->sum('nilai_kredit');
        $saldo1361=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1361')->get()->first();
        if($saldo1361==null){
            $fiskal1361=0;
        }else{
            $fiskal1361=$saldo1361->saldo+$debit1361-$kredit1361;
        }
        // 1361
        // 1362
        $asetlancar1362=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1362')->get();
        $debit1362=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1362')->sum('nilai_debit');
        $kredit1362=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1362')->sum('nilai_kredit');
        $saldo1362=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1362')->get()->first();
        if($saldo1362==null){
            $fiskal1362=0;
        }else{
            $fiskal1362=$saldo1362->saldo+$debit1362-$kredit1362;
        }
        // 1362
        // 1380
        $asetlancar1380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1380')->get();
        $debit1380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1380')->sum('nilai_debit');
        $kredit1380=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1380')->sum('nilai_kredit');
        $saldo1380=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1380')->get()->first();
        if($saldo1380==null){
            $fiskal1380=0;
        }else{
            $fiskal1380=$saldo1380->saldo+$debit1380-$kredit1380;
        }
        // 1380
        // 1410
        $asetlancar1410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1410')->get();
        $debit1410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1410')->sum('nilai_debit');
        $kredit1410=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1410')->sum('nilai_kredit');
        $saldo1410=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1410')->get()->first();
        if($saldo1410==null){
            $fiskal1410=0;
        }else{
            $fiskal1410=$saldo1410->saldo+$debit1410-$kredit1410;
        }
        // 1410
        // 1420
        $asetlancar1420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1420')->get();
        $debit1420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1420')->sum('nilai_debit');
        $kredit1420=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1420')->sum('nilai_kredit');
        $saldo1420=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1420')->get()->first();
        if($saldo1420==null){
            $fiskal1420=0;
        }else{
            $fiskal1420=$saldo1420->saldo+$debit1420-$kredit1420;
        }
        // 1420
        // 1430
        $asetlancar1430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1430')->get();
        $debit1430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1430')->sum('nilai_debit');
        $kredit1430=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1430')->sum('nilai_kredit');
        $saldo1430=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1430')->get()->first();
        if($saldo1430==null){
            $fiskal1430=0;
        }else{
            $fiskal1430=$saldo1430->saldo+$debit1430-$kredit1430;
        }
        // 1430
        // 1440
        $asetlancar1440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1440')->get();
        $debit1440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1440')->sum('nilai_debit');
        $kredit1440=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1440')->sum('nilai_kredit');
        $saldo1440=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1440')->get()->first();
        if($saldo1440==null){
            $fiskal1440=0;
        }else{
            $fiskal1440=$saldo1440->saldo+$debit1440-$kredit1440;
        }
        // 1440
        // 1450
        $asetlancar1450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1450')->get();
        $debit1450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1450')->sum('nilai_debit');
        $kredit1450=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1450')->sum('nilai_kredit');
        $saldo1450=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1450')->get()->first();
        if($saldo1450==null){
            $fiskal1450=0;
        }else{
            $fiskal1450=$saldo1450->saldo+$debit1450-$kredit1450;
        }
        // 1450
        // 1460
        $asetlancar1460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1460')->get();
        $debit1460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1460')->sum('nilai_debit');
        $kredit1460=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1460')->sum('nilai_kredit');
        $saldo1460=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1460')->get()->first();
        if($saldo1460==null){
            $fiskal1460=0;
        }else{
            $fiskal1460=$saldo1460->saldo+$debit1460-$kredit1460;
        }
        // 1460

        // 1510
        $asetlancar1510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1510')->get();
        $debit1510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1510')->sum('nilai_debit');
        $kredit1510=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1510')->sum('nilai_kredit');
        $saldo1510=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1510')->get()->first();
        if($saldo1510==null){
            $fiskal1510=0;
        }else{
            $fiskal1510=$saldo1510->saldo+$debit1510-$kredit1510;
        }
        // 1510

        // 1520
        $asetlancar1520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1520')->get();
        $debit1520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1520')->sum('nilai_debit');
        $kredit1520=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1520')->sum('nilai_kredit');
        $saldo1520=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1520')->get()->first();
        if($saldo1520==null){
            $fiskal1520=0;
        }else{
            $fiskal1520=$saldo1520->saldo+$debit1520-$kredit1520;
        }
        // 1520

        // 1530
        $asetlancar1530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1530')->get();
        $debit1530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1530')->sum('nilai_debit');
        $kredit1530=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1530')->sum('nilai_kredit');
        $saldo1530=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1530')->get()->first();
        if($saldo1530==null){
            $fiskal1530=0;
        }else{
            $fiskal1530=$saldo1530->saldo+$debit1530-$kredit1530;
        }
        // 1530

        // 1540
        $asetlancar1540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1540')->get();
        $debit1540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1540')->sum('nilai_debit');
        $kredit1540=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1540')->sum('nilai_kredit');
        $saldo1540=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1540')->get()->first();
        if($saldo1540==null){
            $fiskal1540=0;
        }else{
            $fiskal1540=$saldo1540->saldo+$debit1540-$kredit1540;
        }
        // 1540
        
        // 1550
        $asetlancar1550=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1550')->get();
        $debit1550=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1550')->sum('nilai_debit');
        $kredit1550=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1550')->sum('nilai_kredit');
        $saldo1550=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1550')->get()->first();
        if($saldo1550==null){
            $fiskal1550=0;
        }else{
            $fiskal1550=$saldo1550->saldo+$debit1550-$kredit1550;
        }
        // 1550

        // 1600
        $asetlancar1600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1600')->get();
        $debit1600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1600')->sum('nilai_debit');
        $kredit1600=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1600')->sum('nilai_kredit');
        $saldo1600=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1600')->get()->first();
        if($saldo1600==null){
            $fiskal1600=0;
        }else{
            $fiskal1600=$saldo1600->saldo+$debit1600-$kredit1600;
        }
        // 1600
        // 1610
        $asetlancar1610=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1610')->get();
        $debit1610=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1610')->sum('nilai_debit');
        $kredit1610=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1610')->sum('nilai_kredit');
        $saldo1610=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1610')->get()->first();
        if($saldo1610==null){
            $fiskal1610=0;
        }else{
            $fiskal1610=$saldo1610->saldo+$debit1610-$kredit1610;
        }
        // 1610
        // 1620
        $asetlancar1620=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1620')->get();
        $debit1620=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1620')->sum('nilai_debit');
        $kredit1620=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1620')->sum('nilai_kredit');
        $saldo1620=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1620')->get()->first();
        if($saldo1620==null){
            $fiskal1620=0;
        }else{
            $fiskal1620=$saldo1620->saldo+$debit1620-$kredit1620;
        }
        // 1620
        // 1630
        $asetlancar1630=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1630')->get();
        $debit1630=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1630')->sum('nilai_debit');
        $kredit1630=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1630')->sum('nilai_kredit');
        $saldo1630=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1630')->get()->first();
        if($saldo1630==null){
            $fiskal1630=0;
        }else{
            $fiskal1630=$saldo1630->saldo+$debit1630-$kredit1630;
        }
        // 1630
        // 1640
        $asetlancar1640=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1640')->get();
        $debit1640=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','1640')->sum('nilai_debit');
        $kredit1640=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','1640')->sum('nilai_kredit');
        $saldo1640=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','1640')->get()->first();
        if($saldo1640==null){
            $fiskal1640=0;
        }else{
            $fiskal1640=$saldo1640->saldo+$debit1640-$kredit1640;
        }
        // 1640
        // 2110
        $asetlancar2110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2110')->get();
        $debit2110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2110')->sum('nilai_debit');
        $kredit2110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2110')->sum('nilai_kredit');
        $saldo2110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2110')->get()->first();
        if($saldo2110==null){
            $fiskal2110=0;
        }else{
            $fiskal2110=$saldo2110->saldo+$debit2110-$kredit2110;
        }
        // 2110
        // 2120
        $asetlancar2120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2120')->get();
        $debit2120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2120')->sum('nilai_debit');
        $kredit2120=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2120')->sum('nilai_kredit');
        $saldo2120=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2120')->get()->first();
        if($saldo2120==null){
            $fiskal2120=0;
        }else{
            $fiskal2120=$saldo2120->saldo+$debit2120-$kredit2120;
        }
        // 2120
        // 2130
        $asetlancar2130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2130')->get();
        $debit2130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2130')->sum('nilai_debit');
        $kredit2130=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2130')->sum('nilai_kredit');
        $saldo2130=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2130')->get()->first();
        if($saldo2130==null){
            $fiskal2130=0;
        }else{
            $fiskal2130=$saldo2130->saldo+$debit2130-$kredit2130;
        }
        // 2130
        // 2140
        $asetlancar2140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2140')->get();
        $debit2140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2140')->sum('nilai_debit');
        $kredit2140=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2140')->sum('nilai_kredit');
        $saldo2140=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2140')->get()->first();
        if($saldo2140==null){
            $fiskal2140=0;
        }else{
            $fiskal2140=$saldo2140->saldo+$debit2140-$kredit2140;
        }
        // 2140
        // 2150
        $asetlancar2150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2150')->get();
        $debit2150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2150')->sum('nilai_debit');
        $kredit2150=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2150')->sum('nilai_kredit');
        $saldo2150=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2150')->get()->first();
        if($saldo2150==null){
            $fiskal2150=0;
        }else{
            $fiskal2150=$saldo2150->saldo+$debit2150-$kredit2150;
        }
        // 2150
        // 2160
        $asetlancar2160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2160')->get();
        $debit2160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2160')->sum('nilai_debit');
        $kredit2160=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2160')->sum('nilai_kredit');
        $saldo2160=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2160')->get()->first();
        if($saldo2160==null){
            $fiskal2160=0;
        }else{
            $fiskal2160=$saldo2160->saldo+$debit2160-$kredit2160;
        }
        // 2160
        // 2310
        $asetlancar2310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2310')->get();
        $debit2310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2310')->sum('nilai_debit');
        $kredit2310=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2310')->sum('nilai_kredit');
        $saldo2310=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2310')->get()->first();
        if($saldo2310==null){
            $fiskal2310=0;
        }else{
            $fiskal2310=$saldo2310->saldo+$debit2310-$kredit2310;
        }
        // 2310
        // 2320
        $asetlancar2320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2320')->get();
        $debit2320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2320')->sum('nilai_debit');
        $kredit2320=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2320')->sum('nilai_kredit');
        $saldo2320=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2320')->get()->first();
        if($saldo2320==null){
            $fiskal2320=0;
        }else{
            $fiskal2320=$saldo2320->saldo+$debit2320-$kredit2320;
        }
        // 2320

        // 2330
        $asetlancar2330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2330')->get();
        $debit2330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2330')->sum('nilai_debit');
        $kredit2330=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2330')->sum('nilai_kredit');
        $saldo2330=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2330')->get()->first();
        if($saldo2330==null){
            $fiskal2330=0;
        }else{
            $fiskal2330=$saldo2330->saldo+$debit2330-$kredit2330;
        }
        // 2330

        // 2210
        $asetlancar2210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2210')->get();
        $debit2210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2210')->sum('nilai_debit');
        $kredit2210=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2210')->sum('nilai_kredit');
        $saldo2210=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2210')->get()->first();
        if($saldo2210==null){
            $fiskal2210=0;
        }else{
            $fiskal2210=$saldo2210->saldo+$debit2210-$kredit2210;
        }
        // 2210
        // 2220
        $asetlancar2220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2220')->get();
        $debit2220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2220')->sum('nilai_debit');
        $kredit2220=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2220')->sum('nilai_kredit');
        $saldo2220=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2220')->get()->first();
        if($saldo2220==null){
            $fiskal2220=0;
        }else{
            $fiskal2220=$saldo2220->saldo+$debit2220-$kredit2220;
        }
        // 2220
        // 2221
        $asetlancar2221=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2221')->get();
        $debit2221=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2221')->sum('nilai_debit');
        $kredit2221=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2221')->sum('nilai_kredit');
        $saldo2221=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2221')->get()->first();
        if($saldo2221==null){
            $fiskal2221=0;
        }else{
            $fiskal2221=$saldo2221->saldo+$debit2221-$kredit2221;
        }
        // 2221
        // 2222
        $asetlancar2222=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2222')->get();
        $debit2222=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2222')->sum('nilai_debit');
        $kredit2222=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2222')->sum('nilai_kredit');
        $saldo2222=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2222')->get()->first();
        if($saldo2222==null){
            $fiskal2222=0;
        }else{
            $fiskal2222=$saldo2222->saldo+$debit2222-$kredit2222;
        }
        // 2222
        // 2223
        $asetlancar2223=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2223')->get();
        $debit2223=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2223')->sum('nilai_debit');
        $kredit2223=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2223')->sum('nilai_kredit');
        $saldo2223=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2223')->get()->first();
        if($saldo2223==null){
            $fiskal2223=0;
        }else{
            $fiskal2223=$saldo2223->saldo+$debit2223-$kredit2223;
        }
        // 2223
        // 2224
        $asetlancar2224=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2224')->get();
        $debit2224=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2224')->sum('nilai_debit');
        $kredit2224=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2224')->sum('nilai_kredit');
        $saldo2224=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2224')->get()->first();
        if($saldo2224==null){
            $fiskal2224=0;
        }else{
            $fiskal2224=$saldo2224->saldo+$debit2224-$kredit2224;
        }
        // 2224
        // 2230
        $asetlancar2230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2230')->get();
        $debit2230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2230')->sum('nilai_debit');
        $kredit2230=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2230')->sum('nilai_kredit');
        $saldo2230=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2230')->get()->first();
        if($saldo2230==null){
            $fiskal2230=0;
        }else{
            $fiskal2230=$saldo2230->saldo+$debit2230-$kredit2230;
        }
        // 2230
        // 2710
        $asetlancar2710=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2710')->get();
        $debit2710=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2710')->sum('nilai_debit');
        $kredit2710=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2710')->sum('nilai_kredit');
        $saldo2710=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2710')->get()->first();
        if($saldo2710==null){
            $fiskal2710=0;
        }else{
            $fiskal2710=$saldo2710->saldo+$debit2710-$kredit2710;
        }
        // 2710
        // 2720
        $asetlancar2720=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2720')->get();
        $debit2720=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2720')->sum('nilai_debit');
        $kredit2720=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2720')->sum('nilai_kredit');
        $saldo2720=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2720')->get()->first();
        if($saldo2720==null){
            $fiskal2720=0;
        }else{
            $fiskal2720=$saldo2720->saldo+$debit2720-$kredit2720;
        }
        // 2720
        // 2730
        $asetlancar2730=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2730')->get();
        $debit2730=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2730')->sum('nilai_debit');
        $kredit2730=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2730')->sum('nilai_kredit');
        $saldo2730=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2730')->get()->first();
        if($saldo2730==null){
            $fiskal2730=0;
        }else{
            $fiskal2730=$saldo2730->saldo+$debit2730-$kredit2730;
        }
        // 2730
        // 2740
        $asetlancar2740=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2740')->get();
        $debit2740=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2740')->sum('nilai_debit');
        $kredit2740=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2740')->sum('nilai_kredit');
        $saldo2740=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2740')->get()->first();
        if($saldo2740==null){
            $fiskal2740=0;
        }else{
            $fiskal2740=$saldo2740->saldo+$debit2740-$kredit2740;
        }
        // 2740
        // 2750
        $asetlancar2750=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2750')->get();
        $debit2750=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2750')->sum('nilai_debit');
        $kredit2750=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2750')->sum('nilai_kredit');
        $saldo2750=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2750')->get()->first();
        if($saldo2750==null){
            $fiskal2750=0;
        }else{
            $fiskal2750=$saldo2750->saldo+$debit2750-$kredit2750;
        }
        // 2750
        // 2760
        $asetlancar2760=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2760')->get();
        $debit2760=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','2760')->sum('nilai_debit');
        $kredit2760=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','2760')->sum('nilai_kredit');
        $saldo2760=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','2760')->get()->first();
        if($saldo2760==null){
            $fiskal2760=0;
        }else{
            $fiskal2760=$saldo2760->saldo+$debit2760-$kredit2760;
        }
        // 2760
        // 3100
        $asetlancar3100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3100')->get();
        $debit3100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3100')->sum('nilai_debit');
        $kredit3100=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3100')->sum('nilai_kredit');
        $saldo3100=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3100')->get()->first();
        if($saldo3100==null){
            $fiskal3100=0;
        }else{
            $fiskal3100=$saldo3100->saldo+$debit3100-$kredit3100;
        }
        // 3100
        // 3110
        $asetlancar3110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3110')->get();
        $debit3110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3110')->sum('nilai_debit');
        $kredit3110=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3110')->sum('nilai_kredit');
        $saldo3110=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3110')->get()->first();
        if($saldo3110==null){
            $fiskal3110=0;
        }else{
            $fiskal3110=$saldo3110->saldo+$debit3110-$kredit3110;
        }
        // 3110
        // 3200
        $asetlancar3200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3200')->get();
        $debit3200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3200')->sum('nilai_debit');
        $kredit3200=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3200')->sum('nilai_kredit');
        $saldo3200=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3200')->get()->first();
        if($saldo3200==null){
            $fiskal3200=0;
        }else{
            $fiskal3200=$saldo3200->saldo+$debit3200-$kredit3200;
        }
        // 3200
        // 3300
        $asetlancar3300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3300')->get();
        $debit3300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','3300')->sum('nilai_debit');
        $kredit3300=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','3300')->sum('nilai_kredit');
        $saldo3300=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','3300')->get()->first();
        if($saldo3300==null){
            $fiskal3300=0;
        }else{
            $fiskal3300=$saldo3300->saldo+$debit3300-$kredit3300;
        }
        // 3300

        // $LatihanKeuanganaset=LatihanKeuangan::whereNot('saldo',0)->where('no_akun','<','1200')->get();
        // $lineaset=JurnalManual::where('attribute1',$id)->where('attribute3',1)->whereBetween('created_at',[$mulai,$selesai])->where('no_akun_debit','<','1200')->orWhere('no_akun_kredit','<','1200')->get();
        $totalaktivalancar=LatihanKeuangan::where('no_akun','<','1500')->whereNot('saldo',0)->sum('saldo');
        $totalaktivalancarfiskal=$fiskal1460+$fiskal1450+$fiskal1440+$fiskal1430+$fiskal1420+$fiskal1410+$fiskal1380+$fiskal1362+$fiskal1361+$fiskal1360+$fiskal1342
        +$fiskal1341+$fiskal1340+$fiskal1330+$fiskal1314+$fiskal1313+$fiskal1312+$fiskal1310+$fiskal1275+$fiskal1274+$fiskal1273+$fiskal1272
        +$fiskal1271+$fiskal1270+$fiskal1260+$fiskal1251+$fiskal1250+$fiskal1240+$fiskal1230+$fiskal1220+$fiskal1210+$fiskal1130+$fiskal1120
        +$fiskal1114+$fiskal1113+$fiskal1112+$fiskal1111+$fiskal1110;
        $nilaiaktivatetap=LatihanKeuangan::where('no_akun','>','1510')->whereNot('saldo',0)->where('no_akun','<','1550')->sum('saldo');
        $nilaiaktivatetapfiskal=$fiskal1550+$fiskal1540+$fiskal1530+$fiskal1520+$fiskal1510;
        $nilaipenyusutan=LatihanKeuangan::where('no_akun','>','1550')->whereNot('saldo',0)->where('no_akun','<','1650')->sum('saldo');
        $nilaipenyusutanfiskal=$fiskal1640+$fiskal1630+$fiskal1620+$fiskal1610+$fiskal1600;
        $totalaktivatetap = $nilaiaktivatetap+$nilaipenyusutan;
        $totalaktivatetapfiskal = $nilaiaktivatetapfiskal+$nilaipenyusutanfiskal;
        $totalaktiva = $totalaktivalancar+$totalaktivatetap;
        $totalaktivafiskal = $totalaktivalancarfiskal+$totalaktivatetapfiskal;

        $totalliabilitislancar=LatihanKeuangan::where('no_akun','>','2100')->where('no_akun','<','2710')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitislancarfiskal=$fiskal2160+$fiskal2150+$fiskal2140+$fiskal2130+$fiskal2120+$fiskal2110+$fiskal2310+$fiskal2330+$fiskal2210+$fiskal2220+$fiskal2221
        +$fiskal2222+$fiskal2223+$fiskal2224+$fiskal2230;
        $totalliabilitisjangkapanjang=LatihanKeuangan::where('no_akun','>','2700')->where('no_akun','<','2770')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitisjangkapanjangfiskal=$fiskal2710+$fiskal2720+$fiskal2730+$fiskal2740+$fiskal2750+$fiskal2760;
        $totalmodal=LatihanKeuangan::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->sum('saldo');
        $totalmodalfiskal=$fiskal3100+$fiskal3110+$fiskal3200+$fiskal3300;
        $totalliabilitasmodal = $totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        
        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_debit','<','3300')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',1)->where('no_akun_kredit','<','3300')->sum('nilai_kredit');
        $totalkomersial=$totalliabilitasmodal+$totaldebit-$totalkredit;
        $data =[
            'title' =>'LAPORAN NERACA FISKAL',
        ];
        $pdf = PDF::loadView('pdf.printpdflatihanneracafiskal',$data,compact( 
            'totalliabilitisjangkapanjang','totalliabilitisjangkapanjangfiskal','totalmodalfiskal',
            'totalaktivalancarfiskal','nilaiaktivatetapfiskal','nilaipenyusutanfiskal','totalaktivafiskal','totalliabilitislancarfiskal',
            'fiskal3300','fiskal3200','fiskal3110','fiskal3100','fiskal2760','fiskal2750','fiskal2740','fiskal2730','fiskal2720','fiskal2710','fiskal2230',
            'fiskal2224','fiskal2223','fiskal2222','fiskal2221','fiskal2220','fiskal2210','fiskal2330','fiskal2320','fiskal2310','fiskal2160','fiskal2150',
            'fiskal2140','fiskal2130','fiskal2120','fiskal2110','fiskal1640','fiskal1630','fiskal1620','fiskal1610','fiskal1600','fiskal1550','fiskal1540',
            'fiskal1530','fiskal1520','fiskal1510','fiskal1460','fiskal1450','fiskal1440','fiskal1430','fiskal1420','fiskal1410','fiskal1380','fiskal1362',
            'fiskal1361','fiskal1360','fiskal1342','fiskal1341','fiskal1340','fiskal1330','fiskal1314','fiskal1313','fiskal1312','fiskal1310','fiskal1275',
            'fiskal1274','fiskal1273','fiskal1272','fiskal1271','fiskal1270','fiskal1260','fiskal1251','fiskal1250','fiskal1240','fiskal1230','fiskal1220',
            'fiskal1210','fiskal1130','fiskal1120','fiskal1114','fiskal1113','fiskal1112','fiskal1111','fiskal1110',
            'totaldebit','totalkredit','totalkomersial',
            'kredit1110','debit1110','asetlancar1110',
            'asetlancar1111','debit1111','kredit1111',
            'asetlancar1112','debit1112','kredit1112',
            'asetlancar1113','debit1113','kredit1113',
            'asetlancar1114','debit1114','kredit1114',
            'asetlancar1120','debit1120','kredit1120',
            'asetlancar1130','debit1130','kredit1130',
            'asetlancar1210','debit1210','kredit1210',
            'asetlancar1220','debit1220','kredit1220',
            'asetlancar1230','debit1230','kredit1230',
            'asetlancar1240','debit1240','kredit1240',
            'asetlancar1250','debit1250','kredit1250',
            'asetlancar1251','debit1251','kredit1251',
            'asetlancar1260','debit1260','kredit1260',
            'asetlancar1270','debit1270','kredit1270',
            'asetlancar1271','debit1271','kredit1271',
            'asetlancar1272','debit1272','kredit1272',
            'asetlancar1273','debit1273','kredit1273',
            'asetlancar1274','debit1274','kredit1274',
            'asetlancar1275','debit1275','kredit1275',
            'asetlancar1310','debit1310','kredit1310',
            'asetlancar1312','debit1312','kredit1312','totalaktivalancar',
            'asetlancar1313','debit1313','kredit1313',
            'asetlancar1314','debit1314','kredit1314',
            'asetlancar1330','debit1330','kredit1330',
            'asetlancar1340','debit1340','kredit1340',
            'asetlancar1341','debit1341','kredit1341',
            'asetlancar1342','debit1342','kredit1342',
            'asetlancar1360','debit1360','kredit1360',
            'asetlancar1361','debit1361','kredit1361',
            'asetlancar1362','debit1362','kredit1362',
            'asetlancar1380','debit1380','kredit1380',
            'asetlancar1410','debit1410','kredit1410',
            'asetlancar1420','debit1420','kredit1420',
            'asetlancar1430','debit1430','kredit1430',
            'asetlancar1440','debit1440','kredit1440',
            'asetlancar1450','debit1450','kredit1450',
            'asetlancar1460','debit1460','kredit1460',
            'asetlancar1510','debit1510','kredit1510',
            'asetlancar1520','debit1520','kredit1520',
            'asetlancar1530','debit1530','kredit1530',
            'asetlancar1540','debit1540','kredit1540',
            'asetlancar1550','debit1550','kredit1550','nilaiaktivatetap',
            'asetlancar1600','debit1600','kredit1600',
            'asetlancar1610','debit1610','kredit1610',
            'asetlancar1620','debit1620','kredit1620',
            'asetlancar1630','debit1630','kredit1630',
            'asetlancar1640','debit1640','kredit1640',
            'asetlancar2110','debit2110','kredit2110','nilaipenyusutan','totalaktivatetap','totalaktiva',
            'asetlancar2120','debit2120','kredit2120',
            'asetlancar2130','debit2130','kredit2130',
            'asetlancar2140','debit2140','kredit2140',
            'asetlancar2150','debit2150','kredit2150',
            'asetlancar2160','debit2160','kredit2160',
            'asetlancar2310','debit2310','kredit2310',
            'asetlancar2320','debit2320','kredit2320',
            'asetlancar2330','debit2330','kredit2330',
            'asetlancar2210','debit2210','kredit2210',
            'asetlancar2220','debit2220','kredit2220',
            'asetlancar2221','debit2221','kredit2221',
            'asetlancar2222','debit2222','kredit2222',
            'asetlancar2223','debit2223','kredit2223',
            'asetlancar2224','debit2224','kredit2224',
            'asetlancar2230','debit2230','kredit2230',
            'asetlancar2710','debit2710','kredit2710','totalliabilitislancar',
            'asetlancar2720','debit2720','kredit2720',
            'asetlancar2730','debit2730','kredit2730',
            'asetlancar2740','debit2740','kredit2740',
            'asetlancar2750','debit2750','kredit2750',
            'asetlancar2760','debit2760','kredit2760',
            'asetlancar3100','debit3100','kredit3100',
            'asetlancar3110','debit3110','kredit3110',
            'asetlancar3200','debit3200','kredit3200',
            'asetlancar3300','debit3300','kredit3300','totalmodal','totalliabilitasmodal'
        ));
        return $pdf->stream('dokumen.pdf'); 

    }
    public function neracafiskalPDFshow(Request $request){
        $id=$request->user_id;

        // 1110
        $asetlancar1110=Neraca::whereNot('saldo',0)->where('no_akun','1110')->get();
        $debit1110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1110')->sum('nilai_debit');
        $kredit1110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1110')->sum('nilai_kredit');
        $saldo1110=Neraca::whereNot('saldo',0)->where('no_akun','1110')->get()->first();
        if($saldo1110==null){
            $fiskal1110=0;
        }else{
            $fiskal1110=$saldo1110->saldo+$debit1110-$kredit1110;
        }
        // 1110
        
        // 1111
        $asetlancar1111=Neraca::whereNot('saldo',0)->where('no_akun','1111')->get();
        $debit1111=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1111')->sum('nilai_debit');
        $kredit1111=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1111')->sum('nilai_kredit');
        $saldo1111=Neraca::whereNot('saldo',0)->where('no_akun','1111')->get()->first();
        if($saldo1111==null){
            $fiskal1111=0;
        }else{
            $fiskal1111=$saldo1111->saldo+$debit1111-$kredit1111;
        }
        // 1111
        
        // 1112
        $asetlancar1112=Neraca::whereNot('saldo',0)->where('no_akun','1112')->get();
        $debit1112=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1112')->sum('nilai_debit');
        $kredit1112=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1112')->sum('nilai_kredit');
        $saldo1112=Neraca::whereNot('saldo',0)->where('no_akun','1112')->get()->first();
        if($saldo1112==null){
            $fiskal1112=0;
        }else{
            $fiskal1112=$saldo1112->saldo+$debit1112-$kredit1112;
        }
        // 1112

        // 1113
        $asetlancar1113=Neraca::whereNot('saldo',0)->where('no_akun','1113')->get();
        $debit1113=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1113')->sum('nilai_debit');
        $kredit1113=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1113')->sum('nilai_kredit');
        $saldo1113=Neraca::whereNot('saldo',0)->where('no_akun','1113')->get()->first();
        if($saldo1113==null){
            $fiskal1113=0;
        }else{
            $fiskal1113=$saldo1113->saldo+$debit1113-$kredit1113;
        }
        // 1113

        // 1114
        $asetlancar1114=Neraca::whereNot('saldo',0)->where('no_akun','1114')->get();
        $debit1114=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1114')->sum('nilai_debit');
        $kredit1114=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1114')->sum('nilai_kredit');
        $saldo1114=Neraca::whereNot('saldo',0)->where('no_akun','1114')->get()->first();
        if($saldo1114==null){
            $fiskal1114=0;
        }else{
            $fiskal1114=$saldo1114->saldo+$debit1114-$kredit1114;
        }
        // 1114

        // 1120
        $asetlancar1120=Neraca::whereNot('saldo',0)->where('no_akun','1120')->get();
        $debit1120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1120')->sum('nilai_debit');
        $kredit1120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1120')->sum('nilai_kredit');
        $saldo1120=Neraca::whereNot('saldo',0)->where('no_akun','1120')->get()->first();
        if($saldo1120==null){
            $fiskal1120=0;
        }else{
            $fiskal1120=$saldo1120->saldo+$debit1120-$kredit1120;
        }
        // 1120

        // 1130
        $asetlancar1130=Neraca::whereNot('saldo',0)->where('no_akun','1130')->get();
        $debit1130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1130')->sum('nilai_debit');
        $kredit1130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1130')->sum('nilai_kredit');
        $saldo1130=Neraca::whereNot('saldo',0)->where('no_akun','1130')->get()->first();
        if($saldo1130==null){
            $fiskal1130=0;
        }else{
            $fiskal1130=$saldo1130->saldo+$debit1130-$kredit1130;
        }
        // 1130
        
        // 1210
        $asetlancar1210=Neraca::whereNot('saldo',0)->where('no_akun','1210')->get();
        $debit1210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1210')->sum('nilai_debit');
        $kredit1210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1210')->sum('nilai_kredit');
        $saldo1210=Neraca::whereNot('saldo',0)->where('no_akun','1210')->get()->first();
        if($saldo1210==null){
            $fiskal1210=0;
        }else{
            $fiskal1210=$saldo1210->saldo+$debit1210-$kredit1210;
        }
        // 1210

        // 1220
        $asetlancar1220=Neraca::whereNot('saldo',0)->where('no_akun','1220')->get();
        $debit1220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1220')->sum('nilai_debit');
        $kredit1220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1220')->sum('nilai_kredit');
        $saldo1220=Neraca::whereNot('saldo',0)->where('no_akun','1220')->get()->first();
        if($saldo1220==null){
            $fiskal1220=0;
        }else{
            $fiskal1220=$saldo1220->saldo+$debit1220-$kredit1220;
        }
        // 1220

        // 1230
        $asetlancar1230=Neraca::whereNot('saldo',0)->where('no_akun','1230')->get();
        $debit1230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1230')->sum('nilai_debit');
        $kredit1230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1230')->sum('nilai_kredit');
        $saldo1230=Neraca::whereNot('saldo',0)->where('no_akun','1230')->get()->first();
        if($saldo1230==null){
            $fiskal1230=0;
        }else{
            $fiskal1230=$saldo1230->saldo+$debit1230-$kredit1230;
        }
        // 1230

        // 1240
        $asetlancar1240=Neraca::whereNot('saldo',0)->where('no_akun','1240')->get();
        $debit1240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1240')->sum('nilai_debit');
        $kredit1240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1240')->sum('nilai_kredit');
        $saldo1240=Neraca::whereNot('saldo',0)->where('no_akun','1240')->get()->first();
        if($saldo1240==null){
            $fiskal1240=0;
        }else{
            $fiskal1240=$saldo1240->saldo+$debit1240-$kredit1240;
        }
        // 1240

        // 1250
        $asetlancar1250=Neraca::whereNot('saldo',0)->where('no_akun','1250')->get();
        $debit1250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1250')->sum('nilai_debit');
        $kredit1250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1250')->sum('nilai_kredit');
        $saldo1250=Neraca::whereNot('saldo',0)->where('no_akun','1250')->get()->first();
        if($saldo1250==null){
            $fiskal1250=0;
        }else{
            $fiskal1250=$saldo1250->saldo+$debit1250-$kredit1250;
        }
        // 1250

        // 1251
        $asetlancar1251=Neraca::whereNot('saldo',0)->where('no_akun','1251')->get();
        $debit1251=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1251')->sum('nilai_debit');
        $kredit1251=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1251')->sum('nilai_kredit');
        $saldo1251=Neraca::whereNot('saldo',0)->where('no_akun','1251')->get()->first();
        if($saldo1251==null){
            $fiskal1251=0;
        }else{
            $fiskal1251=$saldo1251->saldo+$debit1251-$kredit1251;
        }
        // 1251

        // 1260
        $asetlancar1260=Neraca::whereNot('saldo',0)->where('no_akun','1260')->get();
        $debit1260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1260')->sum('nilai_debit');
        $kredit1260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1260')->sum('nilai_kredit');
        $saldo1260=Neraca::whereNot('saldo',0)->where('no_akun','1260')->get()->first();
        if($saldo1260==null){
            $fiskal1260=0;
        }else{
            $fiskal1260=$saldo1260->saldo+$debit1260-$kredit1260;
        }
        // 1260
        // 1270
        $asetlancar1270=Neraca::whereNot('saldo',0)->where('no_akun','1270')->get();
        $debit1270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1270')->sum('nilai_debit');
        $kredit1270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1270')->sum('nilai_kredit');
        $saldo1270=Neraca::whereNot('saldo',0)->where('no_akun','1270')->get()->first();
        if($saldo1270==null){
            $fiskal1270=0;
        }else{
            $fiskal1270=$saldo1270->saldo+$debit1270-$kredit1270;
        }
        // 1270
        // 1271
        $asetlancar1271=Neraca::whereNot('saldo',0)->where('no_akun','1271')->get();
        $debit1271=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1271')->sum('nilai_debit');
        $kredit1271=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1271')->sum('nilai_kredit');
        $saldo1271=Neraca::whereNot('saldo',0)->where('no_akun','1271')->get()->first();
        if($saldo1271==null){
            $fiskal1271=0;
        }else{
            $fiskal1271=$saldo1271->saldo+$debit1271-$kredit1271;
        }
        // 1271
        // 1272
        $asetlancar1272=Neraca::whereNot('saldo',0)->where('no_akun','1272')->get();
        $debit1272=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1272')->sum('nilai_debit');
        $kredit1272=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1272')->sum('nilai_kredit');
        $saldo1272=Neraca::whereNot('saldo',0)->where('no_akun','1272')->get()->first();
        if($saldo1272==null){
            $fiskal1272=0;
        }else{
            $fiskal1272=$saldo1272->saldo+$debit1272-$kredit1272;
        }
        // 1272
        // 1273
        $asetlancar1273=Neraca::whereNot('saldo',0)->where('no_akun','1273')->get();
        $debit1273=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1273')->sum('nilai_debit');
        $kredit1273=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1273')->sum('nilai_kredit');
        $saldo1273=Neraca::whereNot('saldo',0)->where('no_akun','1273')->get()->first();
        if($saldo1273==null){
            $fiskal1273=0;
        }else{
            $fiskal1273=$saldo1273->saldo+$debit1273-$kredit1273;
        }
        // 1273
        // 1274
        $asetlancar1274=Neraca::whereNot('saldo',0)->where('no_akun','1274')->get();
        $debit1274=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1274')->sum('nilai_debit');
        $kredit1274=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1274')->sum('nilai_kredit');
        $saldo1274=Neraca::whereNot('saldo',0)->where('no_akun','1274')->get()->first();
        if($saldo1274==null){
            $fiskal1274=0;
        }else{
            $fiskal1274=$saldo1274->saldo+$debit1274-$kredit1274;
        }
        // 1274
        // 1275
        $asetlancar1275=Neraca::whereNot('saldo',0)->where('no_akun','1275')->get();
        $debit1275=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1275')->sum('nilai_debit');
        $kredit1275=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1275')->sum('nilai_kredit');
        $saldo1275=Neraca::whereNot('saldo',0)->where('no_akun','1275')->get()->first();
        if($saldo1275==null){
            $fiskal1275=0;
        }else{
            $fiskal1275=$saldo1275->saldo+$debit1275-$kredit1275;
        }
        // 1275
        // 1310
        $asetlancar1310=Neraca::whereNot('saldo',0)->where('no_akun','1310')->get();
        $debit1310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1310')->sum('nilai_debit');
        $kredit1310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1310')->sum('nilai_kredit');
        $saldo1310=Neraca::whereNot('saldo',0)->where('no_akun','1310')->get()->first();
        if($saldo1310==null){
            $fiskal1310=0;
        }else{
            $fiskal1310=$saldo1310->saldo+$debit1310-$kredit1310;
        }
        // 1310
        // 1312
        $asetlancar1312=Neraca::whereNot('saldo',0)->where('no_akun','1312')->get();
        $debit1312=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1312')->sum('nilai_debit');
        $kredit1312=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1312')->sum('nilai_kredit');
        $saldo1312=Neraca::whereNot('saldo',0)->where('no_akun','1312')->get()->first();
        if($saldo1312==null){
            $fiskal1312=0;
        }else{
            $fiskal1312=$saldo1312->saldo+$debit1312-$kredit1312;
        }
        // 1312
        
        // 1313
        $asetlancar1313=Neraca::whereNot('saldo',0)->where('no_akun','1313')->get();
        $debit1313=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1313')->sum('nilai_debit');
        $kredit1313=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1313')->sum('nilai_kredit');
        $saldo1313=Neraca::whereNot('saldo',0)->where('no_akun','1313')->get()->first();
        if($saldo1313==null){
            $fiskal1313=0;
        }else{
            $fiskal1313=$saldo1313->saldo+$debit1313-$kredit1313;
        }
        // 1313
        
        // 1314
        $asetlancar1314=Neraca::whereNot('saldo',0)->where('no_akun','1314')->get();
        $debit1314=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1314')->sum('nilai_debit');
        $kredit1314=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1314')->sum('nilai_kredit');
        $saldo1314=Neraca::whereNot('saldo',0)->where('no_akun','1314')->get()->first();
        if($saldo1314==null){
            $fiskal1314=0;
        }else{
            $fiskal1314=$saldo1314->saldo+$debit1314-$kredit1314;
        }
        // 1314

        // 1330
        $asetlancar1330=Neraca::whereNot('saldo',0)->where('no_akun','1330')->get();
        $debit1330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1330')->sum('nilai_debit');
        $kredit1330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1330')->sum('nilai_kredit');
        $saldo1330=Neraca::whereNot('saldo',0)->where('no_akun','1330')->get()->first();
        if($saldo1330==null){
            $fiskal1330=0;
        }else{
            $fiskal1330=$saldo1330->saldo+$debit1330-$kredit1330;
        }
        // 1330
        // 1340
        $asetlancar1340=Neraca::whereNot('saldo',0)->where('no_akun','1340')->get();
        $debit1340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1340')->sum('nilai_debit');
        $kredit1340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1340')->sum('nilai_kredit');
        $saldo1340=Neraca::whereNot('saldo',0)->where('no_akun','1340')->get()->first();
        if($saldo1340==null){
            $fiskal1340=0;
        }else{
            $fiskal1340=$saldo1340->saldo+$debit1340-$kredit1340;
        }
        // 1340
        // 1341
        $asetlancar1341=Neraca::whereNot('saldo',0)->where('no_akun','1341')->get();
        $debit1341=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1341')->sum('nilai_debit');
        $kredit1341=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1341')->sum('nilai_kredit');
        $saldo1341=Neraca::whereNot('saldo',0)->where('no_akun','1341')->get()->first();
        if($saldo1341==null){
            $fiskal1341=0;
        }else{
            $fiskal1341=$saldo1341->saldo+$debit1341-$kredit1341;
        }
        // 1341
        // 1342
        $asetlancar1342=Neraca::whereNot('saldo',0)->where('no_akun','1342')->get();
        $debit1342=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1342')->sum('nilai_debit');
        $kredit1342=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1342')->sum('nilai_kredit');
        $saldo1342=Neraca::whereNot('saldo',0)->where('no_akun','1342')->get()->first();
        if($saldo1342==null){
            $fiskal1342=0;
        }else{
            $fiskal1342=$saldo1342->saldo+$debit1342-$kredit1342;
        }
        // 1342
        // 1360
        $asetlancar1360=Neraca::whereNot('saldo',0)->where('no_akun','1360')->get();
        $debit1360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1360')->sum('nilai_debit');
        $kredit1360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1360')->sum('nilai_kredit');
        $saldo1360=Neraca::whereNot('saldo',0)->where('no_akun','1360')->get()->first();
        if($saldo1360==null){
            $fiskal1360=0;
        }else{
            $fiskal1360=$saldo1360->saldo+$debit1360-$kredit1360;
        }
        // 1360
        // 1361
        $asetlancar1361=Neraca::whereNot('saldo',0)->where('no_akun','1361')->get();
        $debit1361=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1361')->sum('nilai_debit');
        $kredit1361=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1361')->sum('nilai_kredit');
        $saldo1361=Neraca::whereNot('saldo',0)->where('no_akun','1361')->get()->first();
        if($saldo1361==null){
            $fiskal1361=0;
        }else{
            $fiskal1361=$saldo1361->saldo+$debit1361-$kredit1361;
        }
        // 1361
        // 1362
        $asetlancar1362=Neraca::whereNot('saldo',0)->where('no_akun','1362')->get();
        $debit1362=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1362')->sum('nilai_debit');
        $kredit1362=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1362')->sum('nilai_kredit');
        $saldo1362=Neraca::whereNot('saldo',0)->where('no_akun','1362')->get()->first();
        if($saldo1362==null){
            $fiskal1362=0;
        }else{
            $fiskal1362=$saldo1362->saldo+$debit1362-$kredit1362;
        }
        // 1362
        // 1380
        $asetlancar1380=Neraca::whereNot('saldo',0)->where('no_akun','1380')->get();
        $debit1380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1380')->sum('nilai_debit');
        $kredit1380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1380')->sum('nilai_kredit');
        $saldo1380=Neraca::whereNot('saldo',0)->where('no_akun','1380')->get()->first();
        if($saldo1380==null){
            $fiskal1380=0;
        }else{
            $fiskal1380=$saldo1380->saldo+$debit1380-$kredit1380;
        }
        // 1380
        // 1410
        $asetlancar1410=Neraca::whereNot('saldo',0)->where('no_akun','1410')->get();
        $debit1410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1410')->sum('nilai_debit');
        $kredit1410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1410')->sum('nilai_kredit');
        $saldo1410=Neraca::whereNot('saldo',0)->where('no_akun','1410')->get()->first();
        if($saldo1410==null){
            $fiskal1410=0;
        }else{
            $fiskal1410=$saldo1410->saldo+$debit1410-$kredit1410;
        }
        // 1410
        // 1420
        $asetlancar1420=Neraca::whereNot('saldo',0)->where('no_akun','1420')->get();
        $debit1420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1420')->sum('nilai_debit');
        $kredit1420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1420')->sum('nilai_kredit');
        $saldo1420=Neraca::whereNot('saldo',0)->where('no_akun','1420')->get()->first();
        if($saldo1420==null){
            $fiskal1420=0;
        }else{
            $fiskal1420=$saldo1420->saldo+$debit1420-$kredit1420;
        }
        // 1420
        // 1430
        $asetlancar1430=Neraca::whereNot('saldo',0)->where('no_akun','1430')->get();
        $debit1430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1430')->sum('nilai_debit');
        $kredit1430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1430')->sum('nilai_kredit');
        $saldo1430=Neraca::whereNot('saldo',0)->where('no_akun','1430')->get()->first();
        if($saldo1430==null){
            $fiskal1430=0;
        }else{
            $fiskal1430=$saldo1430->saldo+$debit1430-$kredit1430;
        }
        // 1430
        // 1440
        $asetlancar1440=Neraca::whereNot('saldo',0)->where('no_akun','1440')->get();
        $debit1440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1440')->sum('nilai_debit');
        $kredit1440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1440')->sum('nilai_kredit');
        $saldo1440=Neraca::whereNot('saldo',0)->where('no_akun','1440')->get()->first();
        if($saldo1440==null){
            $fiskal1440=0;
        }else{
            $fiskal1440=$saldo1440->saldo+$debit1440-$kredit1440;
        }
        // 1440
        // 1450
        $asetlancar1450=Neraca::whereNot('saldo',0)->where('no_akun','1450')->get();
        $debit1450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1450')->sum('nilai_debit');
        $kredit1450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1450')->sum('nilai_kredit');
        $saldo1450=Neraca::whereNot('saldo',0)->where('no_akun','1450')->get()->first();
        if($saldo1450==null){
            $fiskal1450=0;
        }else{
            $fiskal1450=$saldo1450->saldo+$debit1450-$kredit1450;
        }
        // 1450
        // 1460
        $asetlancar1460=Neraca::whereNot('saldo',0)->where('no_akun','1460')->get();
        $debit1460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1460')->sum('nilai_debit');
        $kredit1460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1460')->sum('nilai_kredit');
        $saldo1460=Neraca::whereNot('saldo',0)->where('no_akun','1460')->get()->first();
        if($saldo1460==null){
            $fiskal1460=0;
        }else{
            $fiskal1460=$saldo1460->saldo+$debit1460-$kredit1460;
        }
        // 1460

        // 1510
        $asetlancar1510=Neraca::whereNot('saldo',0)->where('no_akun','1510')->get();
        $debit1510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1510')->sum('nilai_debit');
        $kredit1510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1510')->sum('nilai_kredit');
        $saldo1510=Neraca::whereNot('saldo',0)->where('no_akun','1510')->get()->first();
        if($saldo1510==null){
            $fiskal1510=0;
        }else{
            $fiskal1510=$saldo1510->saldo+$debit1510-$kredit1510;
        }
        // 1510

        // 1520
        $asetlancar1520=Neraca::whereNot('saldo',0)->where('no_akun','1520')->get();
        $debit1520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1520')->sum('nilai_debit');
        $kredit1520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1520')->sum('nilai_kredit');
        $saldo1520=Neraca::whereNot('saldo',0)->where('no_akun','1520')->get()->first();
        if($saldo1520==null){
            $fiskal1520=0;
        }else{
            $fiskal1520=$saldo1520->saldo+$debit1520-$kredit1520;
        }
        // 1520

        // 1530
        $asetlancar1530=Neraca::whereNot('saldo',0)->where('no_akun','1530')->get();
        $debit1530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1530')->sum('nilai_debit');
        $kredit1530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1530')->sum('nilai_kredit');
        $saldo1530=Neraca::whereNot('saldo',0)->where('no_akun','1530')->get()->first();
        if($saldo1530==null){
            $fiskal1530=0;
        }else{
            $fiskal1530=$saldo1530->saldo+$debit1530-$kredit1530;
        }
        // 1530

        // 1540
        $asetlancar1540=Neraca::whereNot('saldo',0)->where('no_akun','1540')->get();
        $debit1540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1540')->sum('nilai_debit');
        $kredit1540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1540')->sum('nilai_kredit');
        $saldo1540=Neraca::whereNot('saldo',0)->where('no_akun','1540')->get()->first();
        if($saldo1540==null){
            $fiskal1540=0;
        }else{
            $fiskal1540=$saldo1540->saldo+$debit1540-$kredit1540;
        }
        // 1540
        
        // 1550
        $asetlancar1550=Neraca::whereNot('saldo',0)->where('no_akun','1550')->get();
        $debit1550=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1550')->sum('nilai_debit');
        $kredit1550=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1550')->sum('nilai_kredit');
        $saldo1550=Neraca::whereNot('saldo',0)->where('no_akun','1550')->get()->first();
        if($saldo1550==null){
            $fiskal1550=0;
        }else{
            $fiskal1550=$saldo1550->saldo+$debit1550-$kredit1550;
        }
        // 1550

        // 1600
        $asetlancar1600=Neraca::whereNot('saldo',0)->where('no_akun','1600')->get();
        $debit1600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1600')->sum('nilai_debit');
        $kredit1600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1600')->sum('nilai_kredit');
        $saldo1600=Neraca::whereNot('saldo',0)->where('no_akun','1600')->get()->first();
        if($saldo1600==null){
            $fiskal1600=0;
        }else{
            $fiskal1600=$saldo1600->saldo+$debit1600-$kredit1600;
        }
        // 1600
        // 1610
        $asetlancar1610=Neraca::whereNot('saldo',0)->where('no_akun','1610')->get();
        $debit1610=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1610')->sum('nilai_debit');
        $kredit1610=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1610')->sum('nilai_kredit');
        $saldo1610=Neraca::whereNot('saldo',0)->where('no_akun','1610')->get()->first();
        if($saldo1610==null){
            $fiskal1610=0;
        }else{
            $fiskal1610=$saldo1610->saldo+$debit1610-$kredit1610;
        }
        // 1610
        // 1620
        $asetlancar1620=Neraca::whereNot('saldo',0)->where('no_akun','1620')->get();
        $debit1620=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1620')->sum('nilai_debit');
        $kredit1620=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1620')->sum('nilai_kredit');
        $saldo1620=Neraca::whereNot('saldo',0)->where('no_akun','1620')->get()->first();
        if($saldo1620==null){
            $fiskal1620=0;
        }else{
            $fiskal1620=$saldo1620->saldo+$debit1620-$kredit1620;
        }
        // 1620
        // 1630
        $asetlancar1630=Neraca::whereNot('saldo',0)->where('no_akun','1630')->get();
        $debit1630=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1630')->sum('nilai_debit');
        $kredit1630=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1630')->sum('nilai_kredit');
        $saldo1630=Neraca::whereNot('saldo',0)->where('no_akun','1630')->get()->first();
        if($saldo1630==null){
            $fiskal1630=0;
        }else{
            $fiskal1630=$saldo1630->saldo+$debit1630-$kredit1630;
        }
        // 1630
        // 1640
        $asetlancar1640=Neraca::whereNot('saldo',0)->where('no_akun','1640')->get();
        $debit1640=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','1640')->sum('nilai_debit');
        $kredit1640=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','1640')->sum('nilai_kredit');
        $saldo1640=Neraca::whereNot('saldo',0)->where('no_akun','1640')->get()->first();
        if($saldo1640==null){
            $fiskal1640=0;
        }else{
            $fiskal1640=$saldo1640->saldo+$debit1640-$kredit1640;
        }
        // 1640
        // 2110
        $asetlancar2110=Neraca::whereNot('saldo',0)->where('no_akun','2110')->get();
        $debit2110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2110')->sum('nilai_debit');
        $kredit2110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2110')->sum('nilai_kredit');
        $saldo2110=Neraca::whereNot('saldo',0)->where('no_akun','2110')->get()->first();
        if($saldo2110==null){
            $fiskal2110=0;
        }else{
            $fiskal2110=$saldo2110->saldo+$debit2110-$kredit2110;
        }
        // 2110
        // 2120
        $asetlancar2120=Neraca::whereNot('saldo',0)->where('no_akun','2120')->get();
        $debit2120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2120')->sum('nilai_debit');
        $kredit2120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2120')->sum('nilai_kredit');
        $saldo2120=Neraca::whereNot('saldo',0)->where('no_akun','2120')->get()->first();
        if($saldo2120==null){
            $fiskal2120=0;
        }else{
            $fiskal2120=$saldo2120->saldo+$debit2120-$kredit2120;
        }
        // 2120
        // 2130
        $asetlancar2130=Neraca::whereNot('saldo',0)->where('no_akun','2130')->get();
        $debit2130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2130')->sum('nilai_debit');
        $kredit2130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2130')->sum('nilai_kredit');
        $saldo2130=Neraca::whereNot('saldo',0)->where('no_akun','2130')->get()->first();
        if($saldo2130==null){
            $fiskal2130=0;
        }else{
            $fiskal2130=$saldo2130->saldo+$debit2130-$kredit2130;
        }
        // 2130
        // 2140
        $asetlancar2140=Neraca::whereNot('saldo',0)->where('no_akun','2140')->get();
        $debit2140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2140')->sum('nilai_debit');
        $kredit2140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2140')->sum('nilai_kredit');
        $saldo2140=Neraca::whereNot('saldo',0)->where('no_akun','2140')->get()->first();
        if($saldo2140==null){
            $fiskal2140=0;
        }else{
            $fiskal2140=$saldo2140->saldo+$debit2140-$kredit2140;
        }
        // 2140
        // 2150
        $asetlancar2150=Neraca::whereNot('saldo',0)->where('no_akun','2150')->get();
        $debit2150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2150')->sum('nilai_debit');
        $kredit2150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2150')->sum('nilai_kredit');
        $saldo2150=Neraca::whereNot('saldo',0)->where('no_akun','2150')->get()->first();
        if($saldo2150==null){
            $fiskal2150=0;
        }else{
            $fiskal2150=$saldo2150->saldo+$debit2150-$kredit2150;
        }
        // 2150
        // 2160
        $asetlancar2160=Neraca::whereNot('saldo',0)->where('no_akun','2160')->get();
        $debit2160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2160')->sum('nilai_debit');
        $kredit2160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2160')->sum('nilai_kredit');
        $saldo2160=Neraca::whereNot('saldo',0)->where('no_akun','2160')->get()->first();
        if($saldo2160==null){
            $fiskal2160=0;
        }else{
            $fiskal2160=$saldo2160->saldo+$debit2160-$kredit2160;
        }
        // 2160
        // 2310
        $asetlancar2310=Neraca::whereNot('saldo',0)->where('no_akun','2310')->get();
        $debit2310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2310')->sum('nilai_debit');
        $kredit2310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2310')->sum('nilai_kredit');
        $saldo2310=Neraca::whereNot('saldo',0)->where('no_akun','2310')->get()->first();
        if($saldo2310==null){
            $fiskal2310=0;
        }else{
            $fiskal2310=$saldo2310->saldo+$debit2310-$kredit2310;
        }
        // 2310
        // 2320
        $asetlancar2320=Neraca::whereNot('saldo',0)->where('no_akun','2320')->get();
        $debit2320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2320')->sum('nilai_debit');
        $kredit2320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2320')->sum('nilai_kredit');
        $saldo2320=Neraca::whereNot('saldo',0)->where('no_akun','2320')->get()->first();
        if($saldo2320==null){
            $fiskal2320=0;
        }else{
            $fiskal2320=$saldo2320->saldo+$debit2320-$kredit2320;
        }
        // 2320

        // 2330
        $asetlancar2330=Neraca::whereNot('saldo',0)->where('no_akun','2330')->get();
        $debit2330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2330')->sum('nilai_debit');
        $kredit2330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2330')->sum('nilai_kredit');
        $saldo2330=Neraca::whereNot('saldo',0)->where('no_akun','2330')->get()->first();
        if($saldo2330==null){
            $fiskal2330=0;
        }else{
            $fiskal2330=$saldo2330->saldo+$debit2330-$kredit2330;
        }
        // 2330

        // 2210
        $asetlancar2210=Neraca::whereNot('saldo',0)->where('no_akun','2210')->get();
        $debit2210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2210')->sum('nilai_debit');
        $kredit2210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2210')->sum('nilai_kredit');
        $saldo2210=Neraca::whereNot('saldo',0)->where('no_akun','2210')->get()->first();
        if($saldo2210==null){
            $fiskal2210=0;
        }else{
            $fiskal2210=$saldo2210->saldo+$debit2210-$kredit2210;
        }
        // 2210
        // 2220
        $asetlancar2220=Neraca::whereNot('saldo',0)->where('no_akun','2220')->get();
        $debit2220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2220')->sum('nilai_debit');
        $kredit2220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2220')->sum('nilai_kredit');
        $saldo2220=Neraca::whereNot('saldo',0)->where('no_akun','2220')->get()->first();
        if($saldo2220==null){
            $fiskal2220=0;
        }else{
            $fiskal2220=$saldo2220->saldo+$debit2220-$kredit2220;
        }
        // 2220
        // 2221
        $asetlancar2221=Neraca::whereNot('saldo',0)->where('no_akun','2221')->get();
        $debit2221=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2221')->sum('nilai_debit');
        $kredit2221=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2221')->sum('nilai_kredit');
        $saldo2221=Neraca::whereNot('saldo',0)->where('no_akun','2221')->get()->first();
        if($saldo2221==null){
            $fiskal2221=0;
        }else{
            $fiskal2221=$saldo2221->saldo+$debit2221-$kredit2221;
        }
        // 2221
        // 2222
        $asetlancar2222=Neraca::whereNot('saldo',0)->where('no_akun','2222')->get();
        $debit2222=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2222')->sum('nilai_debit');
        $kredit2222=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2222')->sum('nilai_kredit');
        $saldo2222=Neraca::whereNot('saldo',0)->where('no_akun','2222')->get()->first();
        if($saldo2222==null){
            $fiskal2222=0;
        }else{
            $fiskal2222=$saldo2222->saldo+$debit2222-$kredit2222;
        }
        // 2222
        // 2223
        $asetlancar2223=Neraca::whereNot('saldo',0)->where('no_akun','2223')->get();
        $debit2223=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2223')->sum('nilai_debit');
        $kredit2223=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2223')->sum('nilai_kredit');
        $saldo2223=Neraca::whereNot('saldo',0)->where('no_akun','2223')->get()->first();
        if($saldo2223==null){
            $fiskal2223=0;
        }else{
            $fiskal2223=$saldo2223->saldo+$debit2223-$kredit2223;
        }
        // 2223
        // 2224
        $asetlancar2224=Neraca::whereNot('saldo',0)->where('no_akun','2224')->get();
        $debit2224=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2224')->sum('nilai_debit');
        $kredit2224=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2224')->sum('nilai_kredit');
        $saldo2224=Neraca::whereNot('saldo',0)->where('no_akun','2224')->get()->first();
        if($saldo2224==null){
            $fiskal2224=0;
        }else{
            $fiskal2224=$saldo2224->saldo+$debit2224-$kredit2224;
        }
        // 2224
        // 2230
        $asetlancar2230=Neraca::whereNot('saldo',0)->where('no_akun','2230')->get();
        $debit2230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2230')->sum('nilai_debit');
        $kredit2230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2230')->sum('nilai_kredit');
        $saldo2230=Neraca::whereNot('saldo',0)->where('no_akun','2230')->get()->first();
        if($saldo2230==null){
            $fiskal2230=0;
        }else{
            $fiskal2230=$saldo2230->saldo+$debit2230-$kredit2230;
        }
        // 2230
        // 2710
        $asetlancar2710=Neraca::whereNot('saldo',0)->where('no_akun','2710')->get();
        $debit2710=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2710')->sum('nilai_debit');
        $kredit2710=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2710')->sum('nilai_kredit');
        $saldo2710=Neraca::whereNot('saldo',0)->where('no_akun','2710')->get()->first();
        if($saldo2710==null){
            $fiskal2710=0;
        }else{
            $fiskal2710=$saldo2710->saldo+$debit2710-$kredit2710;
        }
        // 2710
        // 2720
        $asetlancar2720=Neraca::whereNot('saldo',0)->where('no_akun','2720')->get();
        $debit2720=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2720')->sum('nilai_debit');
        $kredit2720=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2720')->sum('nilai_kredit');
        $saldo2720=Neraca::whereNot('saldo',0)->where('no_akun','2720')->get()->first();
        if($saldo2720==null){
            $fiskal2720=0;
        }else{
            $fiskal2720=$saldo2720->saldo+$debit2720-$kredit2720;
        }
        // 2720
        // 2730
        $asetlancar2730=Neraca::whereNot('saldo',0)->where('no_akun','2730')->get();
        $debit2730=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2730')->sum('nilai_debit');
        $kredit2730=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2730')->sum('nilai_kredit');
        $saldo2730=Neraca::whereNot('saldo',0)->where('no_akun','2730')->get()->first();
        if($saldo2730==null){
            $fiskal2730=0;
        }else{
            $fiskal2730=$saldo2730->saldo+$debit2730-$kredit2730;
        }
        // 2730
        // 2740
        $asetlancar2740=Neraca::whereNot('saldo',0)->where('no_akun','2740')->get();
        $debit2740=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2740')->sum('nilai_debit');
        $kredit2740=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2740')->sum('nilai_kredit');
        $saldo2740=Neraca::whereNot('saldo',0)->where('no_akun','2740')->get()->first();
        if($saldo2740==null){
            $fiskal2740=0;
        }else{
            $fiskal2740=$saldo2740->saldo+$debit2740-$kredit2740;
        }
        // 2740
        // 2750
        $asetlancar2750=Neraca::whereNot('saldo',0)->where('no_akun','2750')->get();
        $debit2750=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2750')->sum('nilai_debit');
        $kredit2750=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2750')->sum('nilai_kredit');
        $saldo2750=Neraca::whereNot('saldo',0)->where('no_akun','2750')->get()->first();
        if($saldo2750==null){
            $fiskal2750=0;
        }else{
            $fiskal2750=$saldo2750->saldo+$debit2750-$kredit2750;
        }
        // 2750
        // 2760
        $asetlancar2760=Neraca::whereNot('saldo',0)->where('no_akun','2760')->get();
        $debit2760=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','2760')->sum('nilai_debit');
        $kredit2760=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','2760')->sum('nilai_kredit');
        $saldo2760=Neraca::whereNot('saldo',0)->where('no_akun','2760')->get()->first();
        if($saldo2760==null){
            $fiskal2760=0;
        }else{
            $fiskal2760=$saldo2760->saldo+$debit2760-$kredit2760;
        }
        // 2760
        // 3100
        $asetlancar3100=Neraca::whereNot('saldo',0)->where('no_akun','3100')->get();
        $debit3100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3100')->sum('nilai_debit');
        $kredit3100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3100')->sum('nilai_kredit');
        $saldo3100=Neraca::whereNot('saldo',0)->where('no_akun','3100')->get()->first();
        if($saldo3100==null){
            $fiskal3100=0;
        }else{
            $fiskal3100=$saldo3100->saldo+$debit3100-$kredit3100;
        }
        // 3100
        // 3110
        $asetlancar3110=Neraca::whereNot('saldo',0)->where('no_akun','3110')->get();
        $debit3110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3110')->sum('nilai_debit');
        $kredit3110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3110')->sum('nilai_kredit');
        $saldo3110=Neraca::whereNot('saldo',0)->where('no_akun','3110')->get()->first();
        if($saldo3110==null){
            $fiskal3110=0;
        }else{
            $fiskal3110=$saldo3110->saldo+$debit3110-$kredit3110;
        }
        // 3110
        // 3200
        $asetlancar3200=Neraca::whereNot('saldo',0)->where('no_akun','3200')->get();
        $debit3200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3200')->sum('nilai_debit');
        $kredit3200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3200')->sum('nilai_kredit');
        $saldo3200=Neraca::whereNot('saldo',0)->where('no_akun','3200')->get()->first();
        if($saldo3200==null){
            $fiskal3200=0;
        }else{
            $fiskal3200=$saldo3200->saldo+$debit3200-$kredit3200;
        }
        // 3200
        // 3300
        $asetlancar3300=Neraca::whereNot('saldo',0)->where('no_akun','3300')->get();
        $debit3300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','3300')->sum('nilai_debit');
        $kredit3300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','3300')->sum('nilai_kredit');
        $saldo3300=Neraca::whereNot('saldo',0)->where('no_akun','3300')->get()->first();
        if($saldo3300==null){
            $fiskal3300=0;
        }else{
            $fiskal3300=$saldo3300->saldo+$debit3300-$kredit3300;
        }
        // 3300

        // $Neracaaset=Neraca::whereNot('saldo',0)->where('no_akun','<','1200')->get();
        // $lineaset=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->whereBetween('created_at',[$mulai,$selesai])->where('no_akun_debit','<','1200')->orWhere('no_akun_kredit','<','1200')->get();
        $totalaktivalancar=Neraca::where('no_akun','<','1500')->whereNot('saldo',0)->sum('saldo');
        $totalaktivalancarfiskal=$fiskal1460+$fiskal1450+$fiskal1440+$fiskal1430+$fiskal1420+$fiskal1410+$fiskal1380+$fiskal1362+$fiskal1361+$fiskal1360+$fiskal1342
        +$fiskal1341+$fiskal1340+$fiskal1330+$fiskal1314+$fiskal1313+$fiskal1312+$fiskal1310+$fiskal1275+$fiskal1274+$fiskal1273+$fiskal1272
        +$fiskal1271+$fiskal1270+$fiskal1260+$fiskal1251+$fiskal1250+$fiskal1240+$fiskal1230+$fiskal1220+$fiskal1210+$fiskal1130+$fiskal1120
        +$fiskal1114+$fiskal1113+$fiskal1112+$fiskal1111+$fiskal1110;
        $nilaiaktivatetap=Neraca::where('no_akun','>','1510')->whereNot('saldo',0)->where('no_akun','<','1550')->sum('saldo');
        $nilaiaktivatetapfiskal=$fiskal1550+$fiskal1540+$fiskal1530+$fiskal1520+$fiskal1510;
        $nilaipenyusutan=Neraca::where('no_akun','>','1550')->whereNot('saldo',0)->where('no_akun','<','1650')->sum('saldo');
        $nilaipenyusutanfiskal=$fiskal1640+$fiskal1630+$fiskal1620+$fiskal1610+$fiskal1600;
        $totalaktivatetap = $nilaiaktivatetap+$nilaipenyusutan;
        $totalaktivatetapfiskal = $nilaiaktivatetapfiskal+$nilaipenyusutanfiskal;
        $totalaktiva = $totalaktivalancar+$totalaktivatetap;
        $totalaktivafiskal = $totalaktivalancarfiskal+$totalaktivatetapfiskal;

        $totalliabilitislancar=Neraca::where('no_akun','>','2100')->where('no_akun','<','2710')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitislancarfiskal=$fiskal2160+$fiskal2150+$fiskal2140+$fiskal2130+$fiskal2120+$fiskal2110+$fiskal2310+$fiskal2330+$fiskal2210+$fiskal2220+$fiskal2221
        +$fiskal2222+$fiskal2223+$fiskal2224+$fiskal2230;
        $totalliabilitisjangkapanjang=Neraca::where('no_akun','>','2700')->where('no_akun','<','2770')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitisjangkapanjangfiskal=$fiskal2710+$fiskal2720+$fiskal2730+$fiskal2740+$fiskal2750+$fiskal2760;
        $totalmodal=Neraca::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->sum('saldo');
        $totalmodalfiskal=$fiskal3100+$fiskal3110+$fiskal3200+$fiskal3300;
        $totalliabilitasmodal = $totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        
        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','<','3300')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','<','3300')->sum('nilai_kredit');
        $totalkomersial=$totalliabilitasmodal+$totaldebit-$totalkredit;
        $data =[
            'title' =>'LAPORAN NERACA FISKAL',
        ];

        $pdf = PDF::loadView('pdf.printpdfneracafiskal',$data,compact( 
            'totalliabilitisjangkapanjang','totalliabilitisjangkapanjangfiskal','totalmodalfiskal',
            'totalaktivalancarfiskal','nilaiaktivatetapfiskal','nilaipenyusutanfiskal','totalaktivafiskal','totalliabilitislancarfiskal',
            'fiskal3300','fiskal3200','fiskal3110','fiskal3100','fiskal2760','fiskal2750','fiskal2740','fiskal2730','fiskal2720','fiskal2710','fiskal2230',
            'fiskal2224','fiskal2223','fiskal2222','fiskal2221','fiskal2220','fiskal2210','fiskal2330','fiskal2320','fiskal2310','fiskal2160','fiskal2150',
            'fiskal2140','fiskal2130','fiskal2120','fiskal2110','fiskal1640','fiskal1630','fiskal1620','fiskal1610','fiskal1600','fiskal1550','fiskal1540',
            'fiskal1530','fiskal1520','fiskal1510','fiskal1460','fiskal1450','fiskal1440','fiskal1430','fiskal1420','fiskal1410','fiskal1380','fiskal1362',
            'fiskal1361','fiskal1360','fiskal1342','fiskal1341','fiskal1340','fiskal1330','fiskal1314','fiskal1313','fiskal1312','fiskal1310','fiskal1275',
            'fiskal1274','fiskal1273','fiskal1272','fiskal1271','fiskal1270','fiskal1260','fiskal1251','fiskal1250','fiskal1240','fiskal1230','fiskal1220',
            'fiskal1210','fiskal1130','fiskal1120','fiskal1114','fiskal1113','fiskal1112','fiskal1111','fiskal1110',
            'totaldebit','totalkredit','totalkomersial',
            'kredit1110','debit1110','asetlancar1110',
            'asetlancar1111','debit1111','kredit1111',
            'asetlancar1112','debit1112','kredit1112',
            'asetlancar1113','debit1113','kredit1113',
            'asetlancar1114','debit1114','kredit1114',
            'asetlancar1120','debit1120','kredit1120',
            'asetlancar1130','debit1130','kredit1130',
            'asetlancar1210','debit1210','kredit1210',
            'asetlancar1220','debit1220','kredit1220',
            'asetlancar1230','debit1230','kredit1230',
            'asetlancar1240','debit1240','kredit1240',
            'asetlancar1250','debit1250','kredit1250',
            'asetlancar1251','debit1251','kredit1251',
            'asetlancar1260','debit1260','kredit1260',
            'asetlancar1270','debit1270','kredit1270',
            'asetlancar1271','debit1271','kredit1271',
            'asetlancar1272','debit1272','kredit1272',
            'asetlancar1273','debit1273','kredit1273',
            'asetlancar1274','debit1274','kredit1274',
            'asetlancar1275','debit1275','kredit1275',
            'asetlancar1310','debit1310','kredit1310',
            'asetlancar1312','debit1312','kredit1312','totalaktivalancar',
            'asetlancar1313','debit1313','kredit1313',
            'asetlancar1314','debit1314','kredit1314',
            'asetlancar1330','debit1330','kredit1330',
            'asetlancar1340','debit1340','kredit1340',
            'asetlancar1341','debit1341','kredit1341',
            'asetlancar1342','debit1342','kredit1342',
            'asetlancar1360','debit1360','kredit1360',
            'asetlancar1361','debit1361','kredit1361',
            'asetlancar1362','debit1362','kredit1362',
            'asetlancar1380','debit1380','kredit1380',
            'asetlancar1410','debit1410','kredit1410',
            'asetlancar1420','debit1420','kredit1420',
            'asetlancar1430','debit1430','kredit1430',
            'asetlancar1440','debit1440','kredit1440',
            'asetlancar1450','debit1450','kredit1450',
            'asetlancar1460','debit1460','kredit1460',
            'asetlancar1510','debit1510','kredit1510',
            'asetlancar1520','debit1520','kredit1520',
            'asetlancar1530','debit1530','kredit1530',
            'asetlancar1540','debit1540','kredit1540',
            'asetlancar1550','debit1550','kredit1550','nilaiaktivatetap',
            'asetlancar1600','debit1600','kredit1600',
            'asetlancar1610','debit1610','kredit1610',
            'asetlancar1620','debit1620','kredit1620',
            'asetlancar1630','debit1630','kredit1630',
            'asetlancar1640','debit1640','kredit1640',
            'asetlancar2110','debit2110','kredit2110','nilaipenyusutan','totalaktivatetap','totalaktiva',
            'asetlancar2120','debit2120','kredit2120',
            'asetlancar2130','debit2130','kredit2130',
            'asetlancar2140','debit2140','kredit2140',
            'asetlancar2150','debit2150','kredit2150',
            'asetlancar2160','debit2160','kredit2160',
            'asetlancar2310','debit2310','kredit2310',
            'asetlancar2320','debit2320','kredit2320',
            'asetlancar2330','debit2330','kredit2330',
            'asetlancar2210','debit2210','kredit2210',
            'asetlancar2220','debit2220','kredit2220',
            'asetlancar2221','debit2221','kredit2221',
            'asetlancar2222','debit2222','kredit2222',
            'asetlancar2223','debit2223','kredit2223',
            'asetlancar2224','debit2224','kredit2224',
            'asetlancar2230','debit2230','kredit2230',
            'asetlancar2710','debit2710','kredit2710','totalliabilitislancar',
            'asetlancar2720','debit2720','kredit2720',
            'asetlancar2730','debit2730','kredit2730',
            'asetlancar2740','debit2740','kredit2740',
            'asetlancar2750','debit2750','kredit2750',
            'asetlancar2760','debit2760','kredit2760',
            'asetlancar3100','debit3100','kredit3100',
            'asetlancar3110','debit3110','kredit3110',
            'asetlancar3200','debit3200','kredit3200',
            'asetlancar3300','debit3300','kredit3300','totalmodal','totalliabilitasmodal'
        ));
        return $pdf->stream('dokumen.pdf'); 

    }
    public function labarugifiskalPDFshow(Request $request){
        $id=$request->user_id;

        // 4100
        $asetlancar4100=Neraca::whereNot('saldo',0)->where('no_akun','4100')->get();
        $debit4100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4100')->sum('nilai_debit');
        $kredit4100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4100')->sum('nilai_kredit');
        $saldo4100=Neraca::whereNot('saldo',0)->where('no_akun','4100')->get()->first();
        if($saldo4100==null){
            $fiskal4100=0;
        }else{
            $fiskal4100=$saldo4100->saldo+$debit4100-$kredit4100;
        }
        // 4100
         // 4101
         $asetlancar4101=Neraca::whereNot('saldo',0)->where('no_akun','4101')->get();
         $debit4101=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4101')->sum('nilai_debit');
         $kredit4101=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4101')->sum('nilai_kredit');
         $saldo4101=Neraca::whereNot('saldo',0)->where('no_akun','4101')->get()->first();
        if($saldo4101==null){
            $fiskal4101=0;
        }else{
            $fiskal4101=$saldo4101->saldo + $debit4101 - $kredit4101;
        }
         // 4101
        // 4102
        $asetlancar4102=Neraca::whereNot('saldo',0)->where('no_akun','4102')->get();
        $debit4102=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4102')->sum('nilai_debit');
        $kredit4102=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4102')->sum('nilai_kredit');
        $saldo4102=Neraca::whereNot('saldo',0)->where('no_akun','4102')->get()->first();
        if($saldo4102==null){
            $fiskal4102=0;
        }else{
           $fiskal4102=$saldo4102->saldo + $debit4102 - $kredit4102;
        }
        // 4102
        // 4103
        $asetlancar4103=Neraca::whereNot('saldo',0)->where('no_akun','4103')->get();
        $debit4103=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4103')->sum('nilai_debit');
        $kredit4103=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4103')->sum('nilai_kredit');
        $saldo4103=Neraca::whereNot('saldo',0)->where('no_akun','4103')->get()->first();
		if($saldo4103==null){
            $fiskal4103=0;
        }else{
           $fiskal4103=$saldo4103->saldo + $debit4103 - $kredit4103;
        }

        // 4103
        // 4104
        $asetlancar4104=Neraca::whereNot('saldo',0)->where('no_akun','4104')->get();
        $debit4104=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4104')->sum('nilai_debit');
        $kredit4104=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4104')->sum('nilai_kredit');
        $saldo4104=Neraca::whereNot('saldo',0)->where('no_akun','4104')->get()->first();
        if($saldo4104==null){
            $fiskal4104=0;
        }else{
           $fiskal4104=$saldo4104->saldo + $debit4104 - $kredit4104;
        }
        // 4104

        // 4200
        $asetlancar4200=Neraca::whereNot('saldo',0)->where('no_akun','4200')->get();
        $debit4200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4200')->sum('nilai_debit');
        $kredit4200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4200')->sum('nilai_kredit');
        $saldo4200=Neraca::whereNot('saldo',0)->where('no_akun','4200')->get()->first();
        if($saldo4200==null){
            $fiskal4200=0;
        }else{
           $fiskal4200=$saldo4200->saldo + $debit4200 - $kredit4200;
        } 
        // 4200
        // 4201
        $asetlancar4201=Neraca::whereNot('saldo',0)->where('no_akun','4201')->get();
        $debit4201=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4201')->sum('nilai_debit');
        $kredit4201=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4201')->sum('nilai_kredit');
        $saldo4201=Neraca::whereNot('saldo',0)->where('no_akun','4201')->get()->first();
        if($saldo4201==null){
            $fiskal4201=0;
        }else{
           $fiskal4201=$saldo4201->saldo + $debit4201 - $kredit4201;
        }
        // 4201

        // 4202
        $asetlancar4202=Neraca::whereNot('saldo',0)->where('no_akun','4202')->get();
        $debit4202=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4202')->sum('nilai_debit');
        $kredit4202=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4202')->sum('nilai_kredit');
        $saldo4202=Neraca::whereNot('saldo',0)->where('no_akun','4202')->get()->first();
        if($saldo4202==null){
            $fiskal4202=0;
        }else{
           $fiskal4202=$saldo4202->saldo + $debit4202 - $kredit4202;
        }        
        // 4202

        // 4203
        $asetlancar4203=Neraca::whereNot('saldo',0)->where('no_akun','4203')->get();
        $debit4203=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4203')->sum('nilai_debit');
        $kredit4203=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4203')->sum('nilai_kredit');
        $saldo4203=Neraca::whereNot('saldo',0)->where('no_akun','4203')->get()->first();
        if($saldo4203==null){
            $fiskal4203=0;
        }else{
           $fiskal4203=$saldo4203->saldo + $debit4203 - $kredit4203;
        }        
        // 4203

        // 4300
        $asetlancar4300=Neraca::whereNot('saldo',0)->where('no_akun','4300')->get();
        $debit4300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4300')->sum('nilai_debit');
        $kredit4300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4300')->sum('nilai_kredit');
        $saldo4300=Neraca::whereNot('saldo',0)->where('no_akun','4300')->get()->first();
        if($saldo4300==null){
            $fiskal4300=0;
        }else{
           $fiskal4300=$saldo4300->saldo + $debit4300 - $kredit4300;
        }        
        // 4300

        // 4310
        $asetlancar4310=Neraca::whereNot('saldo',0)->where('no_akun','4310')->get();
        $debit4310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4310')->sum('nilai_debit');
        $kredit4310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4310')->sum('nilai_kredit');
        $saldo4310=Neraca::whereNot('saldo',0)->where('no_akun','4310')->get()->first();
		if($saldo4310==null){
            $fiskal4310=0;
        }else{
           $fiskal4310=$saldo4310->saldo + $debit4310 - $kredit4310;
        }        
        // 4310

        // 4320
        $asetlancar4320=Neraca::whereNot('saldo',0)->where('no_akun','4320')->get();
        $debit4320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4320')->sum('nilai_debit');
        $kredit4320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4320')->sum('nilai_kredit');
        $saldo4320=Neraca::whereNot('saldo',0)->where('no_akun','4320')->get()->first();
        if($saldo4320==null){
            $fiskal4320=0;
        }else{
           $fiskal4320=$saldo4320->saldo + $debit4320 - $kredit4320;
        }                
        // 4320

        // 4330
        $asetlancar4330=Neraca::whereNot('saldo',0)->where('no_akun','4330')->get();
        $debit4330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4330')->sum('nilai_debit');
        $kredit4330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4330')->sum('nilai_kredit');
        $saldo4330=Neraca::whereNot('saldo',0)->where('no_akun','4330')->get()->first();
        if($saldo4330==null){
            $fiskal4330=0;
        }else{
           $fiskal4330=$saldo4330->saldo + $debit4330 - $kredit4330;
        }                
        // 4330

        // 4340
        $asetlancar4340=Neraca::whereNot('saldo',0)->where('no_akun','4340')->get();
        $debit4340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4340')->sum('nilai_debit');
        $kredit4340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4340')->sum('nilai_kredit');
        $saldo4340=Neraca::whereNot('saldo',0)->where('no_akun','4340')->get()->first();
        if($saldo4340==null){
            $fiskal4340=0;
        }else{
           $fiskal4340=$saldo4340->saldo + $debit4340 - $kredit4340;
        }                
        // 4340

        // 4350
        $asetlancar4350=Neraca::whereNot('saldo',0)->where('no_akun','4350')->get();
        $debit4350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4350')->sum('nilai_debit');
        $kredit4350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4350')->sum('nilai_kredit');
        $saldo4350=Neraca::whereNot('saldo',0)->where('no_akun','4350')->get()->first();
        if($saldo4350==null){
            $fiskal4350=0;
        }else{
           $fiskal4350=$saldo4350->saldo + $debit4350 - $kredit4350;
        }                
        // 4350

        // 4105
        $asetlancar4105=Neraca::whereNot('saldo',0)->where('no_akun','4105')->get();
        $debit4105=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','4105')->sum('nilai_debit');
        $kredit4105=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','4105')->sum('nilai_kredit');
        $saldo4105=Neraca::whereNot('saldo',0)->where('no_akun','4105')->get()->first();
        if($saldo4105==null){
            $fiskal4105=0;
        }else{
           $fiskal4105=$saldo4105->saldo + $debit4105 - $kredit4105;
        }                
        // 4105

        // 5100
        $asetlancar5100=Neraca::whereNot('saldo',0)->where('no_akun','5100')->get();
        $debit5100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5100')->sum('nilai_debit');
        $kredit5100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5100')->sum('nilai_kredit');
        $saldo5100=Neraca::whereNot('saldo',0)->where('no_akun','5100')->get()->first();
        if($saldo5100==null){
            $fiskal5100=0;
        }else{
           $fiskal5100=$saldo5100->saldo - $debit5100 + $kredit5100;
        }        
        // 5100

        // 5110
        $asetlancar5110=Neraca::whereNot('saldo',0)->where('no_akun','5110')->get();
        $debit5110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5110')->sum('nilai_debit');
        $kredit5110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5110')->sum('nilai_kredit');
        $saldo5110=Neraca::whereNot('saldo',0)->where('no_akun','5110')->get()->first();
        if($saldo5110==null){
            $fiskal5110=0;
        }else{
           $fiskal5110=$saldo5110->saldo - $debit5110 + $kredit5110;
        }                
        // 5110

        // 5120
        $asetlancar5120=Neraca::whereNot('saldo',0)->where('no_akun','5120')->get();
        $debit5120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5120')->sum('nilai_debit');
        $kredit5120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5120')->sum('nilai_kredit');
        $saldo5120=Neraca::whereNot('saldo',0)->where('no_akun','5120')->get()->first();
        if($saldo5120==null){
            $fiskal5120=0;
        }else{
           $fiskal5120=$saldo5120->saldo - $debit5120 + $kredit5120;
        }                
        // 5120

        // 5200
        $asetlancar5200=Neraca::whereNot('saldo',0)->where('no_akun','5200')->get();
        $debit5200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5200')->sum('nilai_debit');
        $kredit5200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5200')->sum('nilai_kredit');
        $saldo5200=Neraca::whereNot('saldo',0)->where('no_akun','5200')->get()->first();
        if($saldo5200==null){
            $fiskal5200=0;
        }else{
           $fiskal5200=$saldo5200->saldo - $debit5200 + $kredit5200;
        }                
        // 5200

        // 5210
        $asetlancar5210=Neraca::whereNot('saldo',0)->where('no_akun','5210')->get();
        $debit5210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5210')->sum('nilai_debit');
        $kredit5210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5210')->sum('nilai_kredit');
        $saldo5210=Neraca::whereNot('saldo',0)->where('no_akun','5210')->get()->first();
        if($saldo5210==null){
            $fiskal5210=0;
        }else{
           $fiskal5210=$saldo5210->saldo - $debit5210 + $kredit5210;
        }                
        // 5210

        // 5211
        $asetlancar5211=Neraca::whereNot('saldo',0)->where('no_akun','5211')->get();
        $debit5211=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5211')->sum('nilai_debit');
        $kredit5211=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5211')->sum('nilai_kredit');
        $saldo5211=Neraca::whereNot('saldo',0)->where('no_akun','5211')->get()->first();
        if($saldo5211==null){
            $fiskal5211=0;
        }else{
           $fiskal5211=$saldo5211->saldo - $debit5211 + $kredit5211;
        }        
        // 5211

        // 5212
        $asetlancar5212=Neraca::whereNot('saldo',0)->where('no_akun','5212')->get();
        $debit5212=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5212')->sum('nilai_debit');
        $kredit5212=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5212')->sum('nilai_kredit');
        $saldo5212=Neraca::whereNot('saldo',0)->where('no_akun','5212')->get()->first();
        if($saldo5212==null){
            $fiskal5212=0;
        }else{
           $fiskal5212=$saldo5212->saldo - $debit5212 + $kredit5212;
        }                
        // 5212

        // 5213
        $asetlancar5213=Neraca::whereNot('saldo',0)->where('no_akun','5213')->get();
        $debit5213=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5213')->sum('nilai_debit');
        $kredit5213=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5213')->sum('nilai_kredit');
        $saldo5213=Neraca::whereNot('saldo',0)->where('no_akun','5213')->get()->first();
        if($saldo5213==null){
            $fiskal5213=0;
        }else{
           $fiskal5213=$saldo5213->saldo - $debit5213 + $kredit5213;
        }                
        // 5213

        // 5250
        $asetlancar5250=Neraca::whereNot('saldo',0)->where('no_akun','5250')->get();
        $debit5250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5250')->sum('nilai_debit');
        $kredit5250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5250')->sum('nilai_kredit');
        $saldo5250=Neraca::whereNot('saldo',0)->where('no_akun','5250')->get()->first();
        if($saldo5250==null){
            $fiskal5250=0;
        }else{
           $fiskal5250=$saldo5250->saldo - $debit5250 + $kredit5250;
        }                
        // 5250

        // 5260
        $asetlancar5260=Neraca::whereNot('saldo',0)->where('no_akun','5260')->get();
        $debit5260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5260')->sum('nilai_debit');
        $kredit5260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5260')->sum('nilai_kredit');
        $saldo5260=Neraca::whereNot('saldo',0)->where('no_akun','5260')->get()->first();
        if($saldo5260==null){
            $fiskal5260=0;
        }else{
           $fiskal5260=$saldo5260->saldo - $debit5260 + $kredit5260;
        }                
        // 5260

        // 5300
        $asetlancar5300=Neraca::whereNot('saldo',0)->where('no_akun','5300')->get();
        $debit5300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5300')->sum('nilai_debit');
        $kredit5300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5300')->sum('nilai_kredit');
        $saldo5300=Neraca::whereNot('saldo',0)->where('no_akun','5300')->get()->first();
        if($saldo5300==null){
            $fiskal5300=0;
        }else{
           $fiskal5300=$saldo5300->saldo - $debit5300 + $kredit5300;
        }                
        // 5300

        // 5400
        $asetlancar5400=Neraca::whereNot('saldo',0)->where('no_akun','5400')->get();
        $debit5400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5400')->sum('nilai_debit');
        $kredit5400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5400')->sum('nilai_kredit');
        $saldo5400=Neraca::whereNot('saldo',0)->where('no_akun','5400')->get()->first();
        if($saldo5400==null){
            $fiskal5400=0;
        }else{
           $fiskal5400=$saldo5400->saldo - $debit5400 + $kredit5400;
        }                
        // 5400

        // 5410
        $asetlancar5410=Neraca::whereNot('saldo',0)->where('no_akun','5410')->get();
        $debit5410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5410')->sum('nilai_debit');
        $kredit5410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5410')->sum('nilai_kredit');
        $saldo5410=Neraca::whereNot('saldo',0)->where('no_akun','5410')->get()->first();
        if($saldo5410==null){
            $fiskal5410=0;
        }else{
           $fiskal5410=$saldo5410->saldo - $debit5410 + $kredit5410;
        }                
        // 5410

        // 5420
        $asetlancar5420=Neraca::whereNot('saldo',0)->where('no_akun','5420')->get();
        $debit5420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5420')->sum('nilai_debit');
        $kredit5420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5420')->sum('nilai_kredit');
        $saldo5420=Neraca::whereNot('saldo',0)->where('no_akun','5420')->get()->first();
        if($saldo5420==null){
            $fiskal5420=0;
        }else{
           $fiskal5420=$saldo5420->saldo - $debit5420 + $kredit5420;
        }                
        // 5420

        // 5430
        $asetlancar5430=Neraca::whereNot('saldo',0)->where('no_akun','5430')->get();
        $debit5430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5430')->sum('nilai_debit');
        $kredit5430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5430')->sum('nilai_kredit');
        $saldo5430=Neraca::whereNot('saldo',0)->where('no_akun','5430')->get()->first();
        if($saldo5430==null){
            $fiskal5430=0;
        }else{
           $fiskal5430=$saldo5430->saldo - $debit5430 + $kredit5430;
        }                
        // 5430

        // 5440
        $asetlancar5440=Neraca::whereNot('saldo',0)->where('no_akun','5440')->get();
        $debit5440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5440')->sum('nilai_debit');
        $kredit5440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5440')->sum('nilai_kredit');
        $saldo5440=Neraca::whereNot('saldo',0)->where('no_akun','5440')->get()->first();
        if($saldo5440==null){
            $fiskal5440=0;
        }else{
           $fiskal5440=$saldo5440->saldo - $debit5440 + $kredit5440;
        }                
        // 5440

        // 5450
        $asetlancar5450=Neraca::whereNot('saldo',0)->where('no_akun','5450')->get();
        $debit5450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5450')->sum('nilai_debit');
        $kredit5450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5450')->sum('nilai_kredit');
        $saldo5450=Neraca::whereNot('saldo',0)->where('no_akun','5450')->get()->first();
        if($saldo5450==null){
            $fiskal5450=0;
        }else{
           $fiskal5450=$saldo5450->saldo - $debit5450 + $kredit5450;
        }                
        // 5450

        // 5460
        $asetlancar5460=Neraca::whereNot('saldo',0)->where('no_akun','5460')->get();
        $debit5460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5460')->sum('nilai_debit');
        $kredit5460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5460')->sum('nilai_kredit');
        $saldo5460=Neraca::whereNot('saldo',0)->where('no_akun','5460')->get()->first();
        if($saldo5460==null){
            $fiskal5460=0;
        }else{
           $fiskal5460=$saldo5460->saldo - $debit5460 + $kredit5460;
        }                
        // 5460

        // 5470
        $asetlancar5470=Neraca::whereNot('saldo',0)->where('no_akun','5470')->get();
        $debit5470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5470')->sum('nilai_debit');
        $kredit5470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5470')->sum('nilai_kredit');
        $saldo5470=Neraca::whereNot('saldo',0)->where('no_akun','5470')->get()->first();
        if($saldo5470==null){
            $fiskal5470=0;
        }else{
           $fiskal5470=$saldo5470->saldo - $debit5470 + $kredit5470;
        }                
        // 5470

        // 5480
        $asetlancar5480=Neraca::whereNot('saldo',0)->where('no_akun','5480')->get();
        $debit5480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5480')->sum('nilai_debit');
        $kredit5480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5480')->sum('nilai_kredit');
        $saldo5480=Neraca::whereNot('saldo',0)->where('no_akun','5480')->get()->first();
        if($saldo5480==null){
            $fiskal5480=0;
        }else{
           $fiskal5480=$saldo5480->saldo - $debit5480 + $kredit5480;
        }                
        // 5480

        // 5600
        $asetlancar5600=Neraca::whereNot('saldo',0)->where('no_akun','5600')->get();
        $debit5600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','5600')->sum('nilai_debit');
        $kredit5600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','5600')->sum('nilai_kredit');
        $saldo5600=Neraca::whereNot('saldo',0)->where('no_akun','5600')->get()->first();
        if($saldo5600==null){
            $fiskal5600=0;
        }else{
           $fiskal5600=$saldo5600->saldo - $debit5600 + $kredit5600;
        }                
        // 5600

        // 6100
        $asetlancar6100=Neraca::whereNot('saldo',0)->where('no_akun','6100')->get();
        $debit6100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6100')->sum('nilai_debit');
        $kredit6100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6100')->sum('nilai_kredit');
        $saldo6100=Neraca::whereNot('saldo',0)->where('no_akun','6100')->get()->first();
        if($saldo6100==null){
            $fiskal6100=0;
        }else{
           $fiskal6100=$saldo6100->saldo - $debit6100 + $kredit6100;
        }                
        // 6100

        // 6110
        $asetlancar6110=Neraca::whereNot('saldo',0)->where('no_akun','6110')->get();
        $debit6110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6110')->sum('nilai_debit');
        $kredit6110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6110')->sum('nilai_kredit');
        $saldo6110=Neraca::whereNot('saldo',0)->where('no_akun','6110')->get()->first();
        if($saldo6110==null){
            $fiskal6110=0;
        }else{
           $fiskal6110=$saldo6110->saldo - $debit6110 + $kredit6110;
        }                
        // 6110

        // 6120
        $asetlancar6120=Neraca::whereNot('saldo',0)->where('no_akun','6120')->get();
        $debit6120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6120')->sum('nilai_debit');
        $kredit6120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6120')->sum('nilai_kredit');
        $saldo6120=Neraca::whereNot('saldo',0)->where('no_akun','6120')->get()->first();
        if($saldo6120==null){
            $fiskal6120=0;
        }else{
           $fiskal6120=$saldo6120->saldo - $debit6120 + $kredit6120;
        }                
        // 6120

        // 6130
        $asetlancar6130=Neraca::whereNot('saldo',0)->where('no_akun','6130')->get();
        $debit6130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6130')->sum('nilai_debit');
        $kredit6130=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6130')->sum('nilai_kredit');
        $saldo6130=Neraca::whereNot('saldo',0)->where('no_akun','6130')->get()->first();
        if($saldo6130==null){
            $fiskal6130=0;
        }else{
           $fiskal6130=$saldo6130->saldo - $debit6130 + $kredit6130;
        }                
        // 6130

        // 6140
        $asetlancar6140=Neraca::whereNot('saldo',0)->where('no_akun','6140')->get();
        $debit6140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6140')->sum('nilai_debit');
        $kredit6140=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6140')->sum('nilai_kredit');
        $saldo6140=Neraca::whereNot('saldo',0)->where('no_akun','6140')->get()->first();
        if($saldo6140==null){
            $fiskal6140=0;
        }else{
           $fiskal6140=$saldo6140->saldo - $debit6140 + $kredit6140;
        }                
        // 6140

        // 6150
        $asetlancar6150=Neraca::whereNot('saldo',0)->where('no_akun','6150')->get();
        $debit6150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6150')->sum('nilai_debit');
        $kredit6150=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6150')->sum('nilai_kredit');
        $saldo6150=Neraca::whereNot('saldo',0)->where('no_akun','6150')->get()->first();
        if($saldo6150==null){
            $fiskal6150=0;
        }else{
           $fiskal6150=$saldo6150->saldo - $debit6150 + $kredit6150;
        }                
        // 6150

        // 6160
        $asetlancar6160=Neraca::whereNot('saldo',0)->where('no_akun','6160')->get();
        $debit6160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6160')->sum('nilai_debit');
        $kredit6160=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6160')->sum('nilai_kredit');
        $saldo6160=Neraca::whereNot('saldo',0)->where('no_akun','6160')->get()->first();
        if($saldo6160==null){
            $fiskal6160=0;
        }else{
           $fiskal6160=$saldo6160->saldo - $debit6160 + $kredit6160;
        }                
        // 6160

        // 6170
        $asetlancar6170=Neraca::whereNot('saldo',0)->where('no_akun','6170')->get();
        $debit6170=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6170')->sum('nilai_debit');
        $kredit6170=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6170')->sum('nilai_kredit');
        $saldo6170=Neraca::whereNot('saldo',0)->where('no_akun','6170')->get()->first();
        if($saldo6170==null){
            $fiskal6170=0;
        }else{
           $fiskal6170=$saldo6170->saldo - $debit6170 + $kredit6170;
        }                
        // 6170

        // 6180
        $asetlancar6180=Neraca::whereNot('saldo',0)->where('no_akun','6180')->get();
        $debit6180=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6180')->sum('nilai_debit');
        $kredit6180=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6180')->sum('nilai_kredit');
        $saldo6180=Neraca::whereNot('saldo',0)->where('no_akun','6180')->get()->first();
        if($saldo6180==null){
            $fiskal6180=0;
        }else{
           $fiskal6180=$saldo6180->saldo - $debit6180 + $kredit6180;
        }                
        // 6180
        
        // 6190
        $asetlancar6190=Neraca::whereNot('saldo',0)->where('no_akun','6190')->get();
        $debit6190=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6190')->sum('nilai_debit');
        $kredit6190=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6190')->sum('nilai_kredit');
        $saldo6190=Neraca::whereNot('saldo',0)->where('no_akun','6190')->get()->first();
        if($saldo6190==null){
            $fiskal6190=0;
        }else{
           $fiskal6190=$saldo6190->saldo - $debit6190 + $kredit6190;
        }                
        // 6190
        
        // 6200
        $asetlancar6200=Neraca::whereNot('saldo',0)->where('no_akun','6200')->get();
        $debit6200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6200')->sum('nilai_debit');
        $kredit6200=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6200')->sum('nilai_kredit');
        $saldo6200=Neraca::whereNot('saldo',0)->where('no_akun','6200')->get()->first();
        if($saldo6200==null){
            $fiskal6200=0;
        }else{
           $fiskal6200=$saldo6200->saldo - $debit6200 + $kredit6200;
        }                
        // 6200

        // 6210
        $asetlancar6210=Neraca::whereNot('saldo',0)->where('no_akun','6210')->get();
        $debit6210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6210')->sum('nilai_debit');
        $kredit6210=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6210')->sum('nilai_kredit');
        $saldo6210=Neraca::whereNot('saldo',0)->where('no_akun','6210')->get()->first();
        if($saldo6210==null){
            $fiskal6210=0;
        }else{
           $fiskal6210=$saldo6210->saldo - $debit6210 + $kredit6210;
        }                
        // 6210

        // 6220
        $asetlancar6220=Neraca::whereNot('saldo',0)->where('no_akun','6220')->get();
        $debit6220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6220')->sum('nilai_debit');
        $kredit6220=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6220')->sum('nilai_kredit');
        $saldo6220=Neraca::whereNot('saldo',0)->where('no_akun','6220')->get()->first();
        if($saldo6220==null){
            $fiskal6220=0;
        }else{
           $fiskal6220=$saldo6220->saldo - $debit6220 + $kredit6220;
        }                
        // 6220

        // 6230
        $asetlancar6230=Neraca::whereNot('saldo',0)->where('no_akun','6230')->get();
        $debit6230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6230')->sum('nilai_debit');
        $kredit6230=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6230')->sum('nilai_kredit');
        $saldo6230=Neraca::whereNot('saldo',0)->where('no_akun','6230')->get()->first();
        if($saldo6230==null){
            $fiskal6230=0;
        }else{
           $fiskal6230=$saldo6230->saldo - $debit6230 + $kredit6230;
        }                
        // 6230

        // 6240
        $asetlancar6240=Neraca::whereNot('saldo',0)->where('no_akun','6240')->get();
        $debit6240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6240')->sum('nilai_debit');
        $kredit6240=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6240')->sum('nilai_kredit');
        $saldo6240=Neraca::whereNot('saldo',0)->where('no_akun','6240')->get()->first();
        if($saldo6240==null){
            $fiskal6240=0;
        }else{
           $fiskal6240=$saldo6240->saldo - $debit6240 + $kredit6240;
        }                
        // 6240

        // 6250
        $asetlancar6250=Neraca::whereNot('saldo',0)->where('no_akun','6250')->get();
        $debit6250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6250')->sum('nilai_debit');
        $kredit6250=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6250')->sum('nilai_kredit');
        $saldo6250=Neraca::whereNot('saldo',0)->where('no_akun','6250')->get()->first();
        if($saldo6250==null){
            $fiskal6250=0;
        }else{
           $fiskal6250=$saldo6250->saldo - $debit6250 + $kredit6250;
        }                
        // 6250

        // 6260
        $asetlancar6260=Neraca::whereNot('saldo',0)->where('no_akun','6260')->get();
        $debit6260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6260')->sum('nilai_debit');
        $kredit6260=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6260')->sum('nilai_kredit');
        $saldo6260=Neraca::whereNot('saldo',0)->where('no_akun','6260')->get()->first();
        if($saldo6260==null){
            $fiskal6260=0;
        }else{
           $fiskal6260=$saldo6260->saldo - $debit6260 + $kredit6260;
        }                
        // 6260

        // 6270
        $asetlancar6270=Neraca::whereNot('saldo',0)->where('no_akun','6270')->get();
        $debit6270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6270')->sum('nilai_debit');
        $kredit6270=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6270')->sum('nilai_kredit');
        $saldo6270=Neraca::whereNot('saldo',0)->where('no_akun','6270')->get()->first();
        if($saldo6270==null){
            $fiskal6270=0;
        }else{
           $fiskal6270=$saldo6270->saldo - $debit6270 + $kredit6270;
        }                
        // 6270

        // 6280
        $asetlancar6280=Neraca::whereNot('saldo',0)->where('no_akun','6280')->get();
        $debit6280=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6280')->sum('nilai_debit');
        $kredit6280=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6280')->sum('nilai_kredit');
        $saldo6280=Neraca::whereNot('saldo',0)->where('no_akun','6280')->get()->first();
        if($saldo6280==null){
            $fiskal6280=0;
        }else{
           $fiskal6280=$saldo6280->saldo - $debit6280 + $kredit6280;
        }                
        // 6280

        // 6290
        $asetlancar6290=Neraca::whereNot('saldo',0)->where('no_akun','6290')->get();
        $debit6290=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6290')->sum('nilai_debit');
        $kredit6290=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6290')->sum('nilai_kredit');
        $saldo6290=Neraca::whereNot('saldo',0)->where('no_akun','6290')->get()->first();
        if($saldo6290==null){
            $fiskal6290=0;
        }else{
           $fiskal6290=$saldo6290->saldo - $debit6290 + $kredit6290;
        }                
        // 6290

        // 6300
        $asetlancar6300=Neraca::whereNot('saldo',0)->where('no_akun','6300')->get();
        $debit6300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6300')->sum('nilai_debit');
        $kredit6300=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6300')->sum('nilai_kredit');
        $saldo6300=Neraca::whereNot('saldo',0)->where('no_akun','6300')->get()->first();
        if($saldo6300==null){
            $fiskal6300=0;
        }else{
           $fiskal6300=$saldo6300->saldo - $debit6300 + $kredit6300;
        }                
        // 6300

        // 6310
        $asetlancar6310=Neraca::whereNot('saldo',0)->where('no_akun','6310')->get();
        $debit6310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6310')->sum('nilai_debit');
        $kredit6310=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6310')->sum('nilai_kredit');
        $saldo6310=Neraca::whereNot('saldo',0)->where('no_akun','6310')->get()->first();
        if($saldo6310==null){
            $fiskal6310=0;
        }else{
           $fiskal6310=$saldo6310->saldo - $debit6310 + $kredit6310;
        }                
        // 6310

        // 6320
        $asetlancar6320=Neraca::whereNot('saldo',0)->where('no_akun','6320')->get();
        $debit6320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6320')->sum('nilai_debit');
        $kredit6320=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6320')->sum('nilai_kredit');
        $saldo6320=Neraca::whereNot('saldo',0)->where('no_akun','6320')->get()->first();
        if($saldo6320==null){
            $fiskal6320=0;
        }else{
           $fiskal6320=$saldo6320->saldo - $debit6320 + $kredit6320;
        }                
        // 6320

        // 6330
        $asetlancar6330=Neraca::whereNot('saldo',0)->where('no_akun','6330')->get();
        $debit6330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6330')->sum('nilai_debit');
        $kredit6330=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6330')->sum('nilai_kredit');
        $saldo6330=Neraca::whereNot('saldo',0)->where('no_akun','6330')->get()->first();
        if($saldo6330==null){
            $fiskal6330=0;
        }else{
           $fiskal6330=$saldo6330->saldo - $debit6330 + $kredit6330;
        }                
        // 6330

        // 6340
        $asetlancar6340=Neraca::whereNot('saldo',0)->where('no_akun','6340')->get();
        $debit6340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6340')->sum('nilai_debit');
        $kredit6340=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6340')->sum('nilai_kredit');
        $saldo6340=Neraca::whereNot('saldo',0)->where('no_akun','6340')->get()->first();
        if($saldo6340==null){
            $fiskal6340=0;
        }else{
           $fiskal6340=$saldo6340->saldo - $debit6340 + $kredit6340;
        }                
        // 6340

        // 6350
        $asetlancar6350=Neraca::whereNot('saldo',0)->where('no_akun','6350')->get();
        $debit6350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6350')->sum('nilai_debit');
        $kredit6350=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6350')->sum('nilai_kredit');
        $saldo6350=Neraca::whereNot('saldo',0)->where('no_akun','6350')->get()->first();
        if($saldo6350==null){
            $fiskal6350=0;
        }else{
           $fiskal6350=$saldo6350->saldo - $debit6350 + $kredit6350;
        }                
        // 6350

        // 6360
        $asetlancar6360=Neraca::whereNot('saldo',0)->where('no_akun','6360')->get();
        $debit6360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6360')->sum('nilai_debit');
        $kredit6360=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6360')->sum('nilai_kredit');
        $saldo6360=Neraca::whereNot('saldo',0)->where('no_akun','6360')->get()->first();
        if($saldo6360==null){
            $fiskal6360=0;
        }else{
           $fiskal6360=$saldo6360->saldo - $debit6360 + $kredit6360;
        }                
        // 6360

        // 6370
        $asetlancar6370=Neraca::whereNot('saldo',0)->where('no_akun','6370')->get();
        $debit6370=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6370')->sum('nilai_debit');
        $kredit6370=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6370')->sum('nilai_kredit');
        $saldo6370=Neraca::whereNot('saldo',0)->where('no_akun','6370')->get()->first();
        if($saldo6370==null){
            $fiskal6370=0;
        }else{
           $fiskal6370=$saldo6370->saldo - $debit6370 + $kredit6370;
        }                
        // 6370

        // 6380
        $asetlancar6380=Neraca::whereNot('saldo',0)->where('no_akun','6380')->get();
        $debit6380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6380')->sum('nilai_debit');
        $kredit6380=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6380')->sum('nilai_kredit');
        $saldo6380=Neraca::whereNot('saldo',0)->where('no_akun','6380')->get()->first();
        if($saldo6380==null){
            $fiskal6380=0;
        }else{
           $fiskal6380=$saldo6380->saldo - $debit6380 + $kredit6380;
        }                
        // 6380

        // 6390
        $asetlancar6390=Neraca::whereNot('saldo',0)->where('no_akun','6390')->get();
        $debit6390=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6390')->sum('nilai_debit');
        $kredit6390=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6390')->sum('nilai_kredit');
        $saldo6390=Neraca::whereNot('saldo',0)->where('no_akun','6390')->get()->first();
        if($saldo6390==null){
            $fiskal6390=0;
        }else{
           $fiskal6390=$saldo6390->saldo - $debit6390 + $kredit6390;
        }                
        // 6390

        // 6400
        $asetlancar6400=Neraca::whereNot('saldo',0)->where('no_akun','6400')->get();
        $debit6400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6400')->sum('nilai_debit');
        $kredit6400=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6400')->sum('nilai_kredit');
        $saldo6400=Neraca::whereNot('saldo',0)->where('no_akun','6400')->get()->first();
        if($saldo6400==null){
            $fiskal6400=0;
        }else{
           $fiskal6400=$saldo6400->saldo - $debit6400 + $kredit6400;
        }                
        // 6400

        // 6410
        $asetlancar6410=Neraca::whereNot('saldo',0)->where('no_akun','6410')->get();
        $debit6410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6410')->sum('nilai_debit');
        $kredit6410=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6410')->sum('nilai_kredit');
        $saldo6410=Neraca::whereNot('saldo',0)->where('no_akun','6410')->get()->first();
        if($saldo6410==null){
            $fiskal6410=0;
        }else{
           $fiskal6410=$saldo6410->saldo - $debit6410 + $kredit6410;
        }                
        // 6410

        // 6420
        $asetlancar6420=Neraca::whereNot('saldo',0)->where('no_akun','6420')->get();
        $debit6420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6420')->sum('nilai_debit');
        $kredit6420=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6420')->sum('nilai_kredit');
        $saldo6420=Neraca::whereNot('saldo',0)->where('no_akun','6420')->get()->first();
        if($saldo6420==null){
            $fiskal6420=0;
        }else{
           $fiskal6420=$saldo6420->saldo - $debit6420 + $kredit6420;
        }                
        // 6420

        // 6430
        $asetlancar6430=Neraca::whereNot('saldo',0)->where('no_akun','6430')->get();
        $debit6430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6430')->sum('nilai_debit');
        $kredit6430=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6430')->sum('nilai_kredit');
        $saldo6430=Neraca::whereNot('saldo',0)->where('no_akun','6430')->get()->first();
        if($saldo6430==null){
            $fiskal6430=0;
        }else{
           $fiskal6430=$saldo6430->saldo - $debit6430 + $kredit6430;
        }                
        // 6430

        // 6440
        $asetlancar6440=Neraca::whereNot('saldo',0)->where('no_akun','6440')->get();
        $debit6440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6440')->sum('nilai_debit');
        $kredit6440=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6440')->sum('nilai_kredit');
        $saldo6440=Neraca::whereNot('saldo',0)->where('no_akun','6440')->get()->first();
        if($saldo6440==null){
            $fiskal6440=0;
        }else{
           $fiskal6440=$saldo6440->saldo - $debit6440 + $kredit6440;
        }                
        // 6440

        // 6450
        $asetlancar6450=Neraca::whereNot('saldo',0)->where('no_akun','6450')->get();
        $debit6450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6450')->sum('nilai_debit');
        $kredit6450=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6450')->sum('nilai_kredit');
        $saldo6450=Neraca::whereNot('saldo',0)->where('no_akun','6450')->get()->first();
        if($saldo6450==null){
            $fiskal6450=0;
        }else{
           $fiskal6450=$saldo6450->saldo - $debit6450 + $kredit6450;
        }                
        // 6450
        
        // 6460
        $asetlancar6460=Neraca::whereNot('saldo',0)->where('no_akun','6460')->get();
        $debit6460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6460')->sum('nilai_debit');
        $kredit6460=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6460')->sum('nilai_kredit');
        $saldo6460=Neraca::whereNot('saldo',0)->where('no_akun','6460')->get()->first();
        if($saldo6460==null){
            $fiskal6460=0;
        }else{
           $fiskal6460=$saldo6460->saldo - $debit6460 + $kredit6460;
        }                
        // 6460
        // 6470
        $asetlancar6470=Neraca::whereNot('saldo',0)->where('no_akun','6470')->get();
        $debit6470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6470')->sum('nilai_debit');
        $kredit6470=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6470')->sum('nilai_kredit');
        $saldo6470=Neraca::whereNot('saldo',0)->where('no_akun','6470')->get()->first();
        if($saldo6470==null){
            $fiskal6470=0;
        }else{
           $fiskal6470=$saldo6470->saldo - $debit6470 + $kredit6470;
        }                
        // 6470

        // 6480
        $asetlancar6480=Neraca::whereNot('saldo',0)->where('no_akun','6480')->get();
        $debit6480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6480')->sum('nilai_debit');
        $kredit6480=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6480')->sum('nilai_kredit');
        $saldo6480=Neraca::whereNot('saldo',0)->where('no_akun','6480')->get()->first();
        if($saldo6480==null){
            $fiskal6480=0;
        }else{
           $fiskal6480=$saldo6480->saldo - $debit6480 + $kredit6480;
        }                
        // 6480

        // 6490
        $asetlancar6490=Neraca::whereNot('saldo',0)->where('no_akun','6490')->get();
        $debit6490=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6490')->sum('nilai_debit');
        $kredit6490=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6490')->sum('nilai_kredit');
        $saldo6490=Neraca::whereNot('saldo',0)->where('no_akun','6490')->get()->first();
        if($saldo6490==null){
            $fiskal6490=0;
        }else{
           $fiskal6490=$saldo6490->saldo - $debit6490 + $kredit6490;
        }                
        // 6490

        // 6500
        $asetlancar6500=Neraca::whereNot('saldo',0)->where('no_akun','6500')->get();
        $debit6500=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6500')->sum('nilai_debit');
        $kredit6500=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6500')->sum('nilai_kredit');
        $saldo6500=Neraca::whereNot('saldo',0)->where('no_akun','6500')->get()->first();
        if($saldo6500==null){
            $fiskal6500=0;
        }else{
           $fiskal6500=$saldo6500->saldo - $debit6500 + $kredit6500;
        }                
        // 6500

        // 6510
        $asetlancar6510=Neraca::whereNot('saldo',0)->where('no_akun','6510')->get();
        $debit6510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6510')->sum('nilai_debit');
        $kredit6510=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6510')->sum('nilai_kredit');
        $saldo6510=Neraca::whereNot('saldo',0)->where('no_akun','6510')->get()->first();
        if($saldo6510==null){
            $fiskal6510=0;
        }else{
           $fiskal6510=$saldo6510->saldo - $debit6510 + $kredit6510;
        }                
        // 6510

        // 6520
        $asetlancar6520=Neraca::whereNot('saldo',0)->where('no_akun','6520')->get();
        $debit6520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6520')->sum('nilai_debit');
        $kredit6520=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6520')->sum('nilai_kredit');
        $saldo6520=Neraca::whereNot('saldo',0)->where('no_akun','6520')->get()->first();
        if($saldo6520==null){
            $fiskal6520=0;
        }else{
           $fiskal6520=$saldo6520->saldo - $debit6520 + $kredit6520;
        }                
        // 6520

        // 6530
        $asetlancar6530=Neraca::whereNot('saldo',0)->where('no_akun','6530')->get();
        $debit6530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6530')->sum('nilai_debit');
        $kredit6530=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6530')->sum('nilai_kredit');
        $saldo6530=Neraca::whereNot('saldo',0)->where('no_akun','6530')->get()->first();
        if($saldo6530==null){
            $fiskal6530=0;
        }else{
           $fiskal6530=$saldo6530->saldo - $debit6530 + $kredit6530;
        }                
        // 6530

        // 6540
        $asetlancar6540=Neraca::whereNot('saldo',0)->where('no_akun','6540')->get();
        $debit6540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6540')->sum('nilai_debit');
        $kredit6540=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6540')->sum('nilai_kredit');
        $saldo6540=Neraca::whereNot('saldo',0)->where('no_akun','6540')->get()->first();
        if($saldo6540==null){
            $fiskal6540=0;
        }else{
           $fiskal6540=$saldo6540->saldo - $debit6540 + $kredit6540;
        }                
        // 6540

        // 6600
        $asetlancar6600=Neraca::whereNot('saldo',0)->where('no_akun','6600')->get();
        $debit6600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','6600')->sum('nilai_debit');
        $kredit6600=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','6600')->sum('nilai_kredit');
        $saldo6600=Neraca::whereNot('saldo',0)->where('no_akun','6600')->get()->first();
        if($saldo6600==null){
            $fiskal6600=0;
        }else{
           $fiskal6600=$saldo6600->saldo - $debit6600 + $kredit6600;
        }                
        // 6600

        // 7100
        $asetlancar7100=Neraca::whereNot('saldo',0)->where('no_akun','7100')->get();
        $debit7100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','7100')->sum('nilai_debit');
        $kredit7100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','7100')->sum('nilai_kredit');
        $saldo7100=Neraca::whereNot('saldo',0)->where('no_akun','7100')->get()->first();
        if($saldo7100==null){
            $fiskal7100=0;
        }else{
           $fiskal7100=$saldo7100->saldo + $debit7100 - $kredit7100;
        }                
        // 7100

        // 7110
        $asetlancar7110=Neraca::whereNot('saldo',0)->where('no_akun','7110')->get();
        $debit7110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','7110')->sum('nilai_debit');
        $kredit7110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','7110')->sum('nilai_kredit');
        $saldo7110=Neraca::whereNot('saldo',0)->where('no_akun','7110')->get()->first();
        if($saldo7110==null){
            $fiskal7110=0;
        }else{
           $fiskal7110=$saldo7110->saldo + $debit7110 - $kredit7110;
        }                
        // 7110

        // 8100
        $asetlancar8100=Neraca::whereNot('saldo',0)->where('no_akun','8100')->get();
        $debit8100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','8100')->sum('nilai_debit');
        $kredit8100=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','8100')->sum('nilai_kredit');
        $saldo8100=Neraca::whereNot('saldo',0)->where('no_akun','8100')->get()->first();
        if($saldo8100==null){
            $fiskal8100=0;
        }else{
           $fiskal8100=$saldo8100->saldo + $debit8100 - $kredit8100;
        }                
        // 8100

        // 8110
        $asetlancar8110=Neraca::whereNot('saldo',0)->where('no_akun','8110')->get();
        $debit8110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','8110')->sum('nilai_debit');
        $kredit8110=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','8110')->sum('nilai_kredit');
        $saldo8110=Neraca::whereNot('saldo',0)->where('no_akun','8110')->get()->first();
        if($saldo8110==null){
            $fiskal8110=0;
        }else{
           $fiskal8110=$saldo8110->saldo + $debit8110 - $kredit8110;
        }                
        // 8110
        // 8120
        $asetlancar8120=Neraca::whereNot('saldo',0)->where('no_akun','8120')->get();
        $debit8120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','8120')->sum('nilai_debit');
        $kredit8120=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','8120')->sum('nilai_kredit');
        $saldo8120=Neraca::whereNot('saldo',0)->where('no_akun','8120')->get()->first();
        if($saldo8120==null){
            $fiskal8120=0;
        }else{
           $fiskal8120=$saldo8120->saldo + $debit8120 - $kredit8120;
        }                
        // 8120

        $totalpenjualan=Neraca::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalpenjualanfiskal=$fiskal4100+$fiskal4101+$fiskal4102+$fiskal4103+$fiskal4104+$fiskal4200+$fiskal4201+$fiskal4202+$fiskal4203+$fiskal4300+$fiskal4310+$fiskal4320+$fiskal4330+$fiskal4340+$fiskal4350+$fiskal4105;
        $totalharpok=Neraca::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalharpokfiskal= $fiskal5100+$fiskal5110+$fiskal5120+$fiskal5200+$fiskal5210+$fiskal5211+$fiskal5212+$fiskal5213+$fiskal5250+$fiskal5260+$fiskal5300+$fiskal5400+$fiskal5410+$fiskal5420+$fiskal5430+$fiskal5440+$fiskal5450+$fiskal5460+$fiskal5470+$fiskal5480+$fiskal5600;
        $totalbiayaoperasional=Neraca::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $totalbiayaoperasionalfiskal=$fiskal6100+$fiskal6110+$fiskal6120+$fiskal6130+$fiskal6140+$fiskal6150+$fiskal6160+$fiskal6170+$fiskal6180+$fiskal6190+$fiskal6200+$fiskal6210+$fiskal6220+$fiskal6230+$fiskal6240+$fiskal6250+$fiskal6260+$fiskal6270+$fiskal6280+$fiskal6290+$fiskal6300+$fiskal6310+$fiskal6320+$fiskal6330+$fiskal6340+$fiskal6350+$fiskal6360+$fiskal6370+$fiskal6380+$fiskal6390+$fiskal6400+$fiskal6410+$fiskal6420+$fiskal6430+$fiskal6440+$fiskal6450+$fiskal6460+$fiskal6470+$fiskal6480+$fiskal6490+$fiskal6500+$fiskal6510+$fiskal6520+$fiskal6530+$fiskal6540+$fiskal6600;
        $jumlahpendapatanlain=Neraca::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahpendapatanlainfiskal=$fiskal7100+$fiskal7110;
        $jumlahbebanlain=Neraca::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        $jumlahbebanlainfiskal=$fiskal8100+$fiskal8110+$fiskal8120;
        
        $labakotor = $totalpenjualan-$totalharpok;
        $labakotorfiskal = $totalpenjualanfiskal-$totalharpokfiskal;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $labaoperasionalfiskal = $labakotorfiskal-$totalbiayaoperasionalfiskal;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $totalpendapatandanbebanlainfiskal = $jumlahpendapatanlainfiskal-$jumlahbebanlainfiskal;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        $totaldebit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_debit','>','4000')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute1',$id)->where('attribute3',NULL)->where('no_akun_kredit','>','4000')->sum('nilai_kredit');
        $totalkomersial = $ikhtisarlabarugi+$totaldebit-$totalkredit;
        
        $pajakpenghasiliktisarlabarugi = $ikhtisarlabarugi*22/100;
        $pajakpenghasiltotalkomersial = $totalkomersial*22/100;
        
        $data =[
            'title' =>'LAPORAN LABA RUGI FISKAL',
        ];

        $pdf =  PDF::loadView('pdf.printpdflabarugifiskal',$data,compact(
            'totalpendapatandanbebanlainfiskal',
            'totalpenjualanfiskal','totalharpokfiskal','labakotorfiskal','totalbiayaoperasionalfiskal','labaoperasionalfiskal','jumlahpendapatanlainfiskal','jumlahbebanlainfiskal',
            'fiskal4300','fiskal4203','fiskal4202','fiskal4201','fiskal4200','fiskal4104','fiskal4103','fiskal4102','fiskal4101','fiskal4100','fiskal4340',
            'fiskal5211','fiskal5210','fiskal5200','fiskal5120','fiskal5110','fiskal5100','fiskal4105','fiskal4350','fiskal4330','fiskal4320','fiskal4310',
            'fiskal5450','fiskal5440','fiskal5430','fiskal5420','fiskal5410','fiskal5400','fiskal5300','fiskal5260','fiskal5250','fiskal5213','fiskal5212',
            'fiskal6160','fiskal6150','fiskal6140','fiskal6130','fiskal6120','fiskal6110','fiskal6100','fiskal5600','fiskal5480','fiskal5470','fiskal5460',
            'fiskal6270','fiskal6260','fiskal6250','fiskal6240','fiskal6230','fiskal6220','fiskal6210','fiskal6200','fiskal6190','fiskal6180','fiskal6170',
            'fiskal6380','fiskal6370','fiskal6360','fiskal6350','fiskal6340','fiskal6330','fiskal6320','fiskal6310','fiskal6300','fiskal6290','fiskal6280',
            'fiskal6600','fiskal6540','fiskal6530','fiskal6520','fiskal6510','fiskal6500','fiskal6490','fiskal6480','fiskal6470','fiskal6460','fiskal6450',
            'fiskal7100','fiskal7110','fiskal8100','fiskal8110','fiskal8120','fiskal6440','fiskal6430','fiskal6420','fiskal6410','fiskal6400','fiskal6390',
            'pajakpenghasiliktisarlabarugi','pajakpenghasiltotalkomersial',
            'totaldebit','totalkredit','totalkomersial',
            'totalpenjualan','totalharpok','totalbiayaoperasional','jumlahpendapatanlain',
            'jumlahbebanlain','labakotor','labaoperasional','totalpendapatandanbebanlain',
            'ikhtisarlabarugi',
            'asetlancar4100','debit4100','kredit4100',
            'asetlancar4101','debit4101','kredit4101',
            'asetlancar4102','debit4102','kredit4102',
            'asetlancar4103','debit4103','kredit4103',
            'asetlancar4104','debit4104','kredit4104',
            'asetlancar4200','debit4200','kredit4200',
            'asetlancar4201','debit4201','kredit4201',
            'asetlancar4202','debit4202','kredit4202',
            'asetlancar4203','debit4203','kredit4203',
            'asetlancar4300','debit4300','kredit4300',
            'asetlancar4310','debit4310','kredit4310',
            'asetlancar4320','debit4320','kredit4320',
            'asetlancar4330','debit4330','kredit4330',
            'asetlancar4340','debit4340','kredit4340',
            'asetlancar4350','debit4350','kredit4350',
            'asetlancar4105','debit4105','kredit4105',
            'asetlancar5100','debit5100','kredit5100',
            'asetlancar5110','debit5110','kredit5110',
            'asetlancar5120','debit5120','kredit5120',
            'asetlancar5200','debit5200','kredit5200',
            'asetlancar5210','debit5210','kredit5210',
            'asetlancar5211','debit5211','kredit5211',
            'asetlancar5212','debit5212','kredit5212',
            'asetlancar5213','debit5213','kredit5213',
            'asetlancar5250','debit5250','kredit5250',
            'asetlancar5260','debit5260','kredit5260',
            'asetlancar5300','debit5300','kredit5300',
            'asetlancar5400','debit5400','kredit5400',
            'asetlancar5410','debit5410','kredit5410',
            'asetlancar5420','debit5420','kredit5420',
            'asetlancar5430','debit5430','kredit5430',
            'asetlancar5440','debit5440','kredit5440',
            'asetlancar5450','debit5450','kredit5450',
            'asetlancar5460','debit5460','kredit5460',
            'asetlancar5470','debit5470','kredit5470',
            'asetlancar5480','debit5480','kredit5480',
            'asetlancar5600','debit5600','kredit5600',
            'asetlancar6100','debit6100','kredit6100',
            'asetlancar6110','debit6110','kredit6110',
            'asetlancar6120','debit6120','kredit6120',
            'asetlancar6130','debit6130','kredit6130',
            'asetlancar6140','debit6140','kredit6140',
            'asetlancar6150','debit6150','kredit6150',
            'asetlancar6160','debit6160','kredit6160',
            'asetlancar6170','debit6170','kredit6170',
            'asetlancar6180','debit6180','kredit6180',
            'asetlancar6190','debit6190','kredit6190',
            'asetlancar6200','debit6200','kredit6200',
            'asetlancar6210','debit6210','kredit6210',
            'asetlancar6220','debit6220','kredit6220',
            'asetlancar6230','debit6230','kredit6230',
            'asetlancar6240','debit6240','kredit6240',
            'asetlancar6250','debit6250','kredit6250',
            'asetlancar6260','debit6260','kredit6260',
            'asetlancar6270','debit6270','kredit6270',
            'asetlancar6280','debit6280','kredit6280',
            'asetlancar6290','debit6290','kredit6290',
            'asetlancar6300','debit6300','kredit6300',
            'asetlancar6310','debit6310','kredit6310',
            'asetlancar6320','debit6320','kredit6320',
            'asetlancar6330','debit6330','kredit6330',
            'asetlancar6340','debit6340','kredit6340',
            'asetlancar6350','debit6350','kredit6350',
            'asetlancar6360','debit6360','kredit6360',
            'asetlancar6370','debit6370','kredit6370',
            'asetlancar6380','debit6380','kredit6380',
            'asetlancar6390','debit6390','kredit6390',
            'asetlancar6400','debit6400','kredit6400',
            'asetlancar6410','debit6410','kredit6410',
            'asetlancar6420','debit6420','kredit6420',
            'asetlancar6430','debit6430','kredit6430',
            'asetlancar6440','debit6440','kredit6440',
            'asetlancar6450','debit6450','kredit6450',
            'asetlancar6460','debit6460','kredit6460',
            'asetlancar6470','debit6470','kredit6470',
            'asetlancar6480','debit6480','kredit6480',
            'asetlancar6490','debit6490','kredit6490',
            'asetlancar6500','debit6500','kredit6500',
            'asetlancar6510','debit6510','kredit6510',
            'asetlancar6520','debit6520','kredit6520',
            'asetlancar6530','debit6530','kredit6530',
            'asetlancar6540','debit6540','kredit6540',
            'asetlancar6600','debit6600','kredit6600',
            'asetlancar7100','debit7100','kredit7100',
            'asetlancar7110','debit7110','kredit7110',
            'asetlancar8100','debit8100','kredit8100',
            'asetlancar8110','debit8110','kredit8110',
            'asetlancar8120','debit8120','kredit8120',
        ));
        return $pdf->stream('dokumen.pdf'); 
    }
}
