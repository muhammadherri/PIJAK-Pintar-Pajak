<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Billing;
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
        if(Auth::user()->status==1){
            $billing = Billing::where('kode_billing',$idbilling)->get()->first();
            // dd($billing);
        }else{
            $billing = Billing::where('attribute1',$id)->where('kode_billing',$idbilling)->get()->first();
        }
        if($billing==null){
            // Session::flash('success','Data Yang Dicari Salah');
            return back();
        }
        // dd($billing);
       $pdf = PDF::loadView('pdf.pembayaranPdf',$data,compact('billing'));
       return $pdf->stream('dokumen.pdf'); 
    }
}
