<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Faktur;
use App\Models\InvoiceLine;
use App\Models\FakturLine;
use App\Models\Prepopulate;
use App\Models\HutangPpn;
use Illuminate\Support\Facades\Auth;

class HutangPpnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
      
        return view('hutangppn.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=Auth::user()->id;
        // if(Auth::user()->status==1){
        //     $ppnmasuk = Prepopulate::sum('jumlah_ppn');
        //     $ppnkeluar = Invoice::sum('ppn');
        // }else{

        $ppnmasuk = Prepopulate::where('attribute1',$id)->sum('jumlah_ppn');

        $fktr10 = Faktur::where('attribute1',$id)->where('no_seri','010')->sum('ppn_fktr');
        $fktr40 = Faktur::where('attribute1',$id)->where('no_seri','040')->sum('ppn_fktr');
        $fktr60 = Faktur::where('attribute1',$id)->where('no_seri','060')->sum('ppn_fktr');
        $fktr90 = Faktur::where('attribute1',$id)->where('no_seri','090')->sum('ppn_fktr');
        $fktrgg = Faktur::where('attribute1',$id)->where('no_seri','Digunggung')->sum('ppn_fktr');
        $ppnkeluar = $fktr10+$fktr40+$fktr60+$fktr90+$fktrgg;
        // }
        return view('hutangppn.create',compact('ppnmasuk','ppnkeluar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =HutangPpn::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $date = date('Ymd');
        $trx = 'TRX'.'0'.$header_id.$date.'HTG';

        $data = array(
            'trx'=>$trx,
            'jumlah_ppn_masuk'=>preg_replace('/[^0-9]/','',$request->ppn_masuk),
            'jumlah_ppn_keluar'=>preg_replace('/[^0-9]/','',$request->ppn_keluar),
            'hutang_ppn'=>preg_replace('/[^0-9]/','',$request->jumlah),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data);
       
        Invoice::where('attribute1',Auth::user()->id)->where('no_seri','010')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Invoice::where('attribute1',Auth::user()->id)->where('no_seri','040')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Invoice::where('attribute1',Auth::user()->id)->where('no_seri','060')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Invoice::where('attribute1',Auth::user()->id)->where('no_seri','090')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Invoice::where('attribute1',Auth::user()->id)->where('no_seri','Digunggung')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);

        Faktur::where('attribute1',Auth::user()->id)->where('no_seri','010')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Faktur::where('attribute1',Auth::user()->id)->where('no_seri','040')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Faktur::where('attribute1',Auth::user()->id)->where('no_seri','060')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Faktur::where('attribute1',Auth::user()->id)->where('no_seri','090')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        Faktur::where('attribute1',Auth::user()->id)->where('no_seri','Digunggung')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);

        InvoiceLine::where('attribute1',Auth::user()->id)->where('no_seri','010')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        InvoiceLine::where('attribute1',Auth::user()->id)->where('no_seri','040')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        InvoiceLine::where('attribute1',Auth::user()->id)->where('no_seri','060')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        InvoiceLine::where('attribute1',Auth::user()->id)->where('no_seri','090')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        InvoiceLine::where('attribute1',Auth::user()->id)->where('no_seri','Digunggung')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
       
        FakturLine::where('attribute1',Auth::user()->id)->where('no_seri','010')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        FakturLine::where('attribute1',Auth::user()->id)->where('no_seri','040')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        FakturLine::where('attribute1',Auth::user()->id)->where('no_seri','060')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        FakturLine::where('attribute1',Auth::user()->id)->where('no_seri','090')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        FakturLine::where('attribute1',Auth::user()->id)->where('no_seri','Digunggung')->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        
        Prepopulate::where('attribute1',Auth::user()->id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        HutangPpn::create($data);
        $a= \DB::commit();
        return redirect()->route('hutangppn');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
