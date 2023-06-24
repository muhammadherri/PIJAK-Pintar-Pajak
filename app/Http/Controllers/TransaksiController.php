<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Category;
use App\Models\CategoryPengeluaran;

class TransaksiController extends Controller
{
    public function index()
    {
        $catpemasukan=Category::selectRaw('SUM(attribute1) as total')->value('total');
        $catpengeluaran=CategoryPengeluaran::selectRaw('SUM(attribute1) as total')->value('total');
        $trxpemasukan=Transaksi::where('jenis_transaksi',0)->selectRaw('SUM(nominal) as total')->value('total');
        $trxpengeluaran=Transaksi::where('jenis_transaksi',1)->selectRaw('SUM(nominal) as total')->value('total');
        $subtotalpemasukan=$catpemasukan+$trxpemasukan;
        $subtotalpengeluaran=$catpengeluaran+$trxpengeluaran;
        $totalsaldo=$subtotalpemasukan-$subtotalpengeluaran;
        if($totalsaldo<0){
            $totalsaldo=0;
        }else{
            $totalsaldo;
        }
        $trx=Transaksi::whereMonth('created_at',(date('m')))->get();
        return view('transaksi.index',compact('trx','totalsaldo','subtotalpemasukan','subtotalpengeluaran'))->with('no',1);
    }
    public function create()
    {
        return view('transaksi.create');
    }
    public function store(Request $request)
    {
        // dd('tes');
        Transaksi::updateOrCreate([
            'jenis_transaksi'=>$request->jenis_transaksi,
            'kategori'=>$request->kategori,
            'nominal'=>$request->nominal,
            'deskripsi'=>$request->deskripsi,
            'created_at'=>date('Y-m-d'),
            'attribute1'=>0,
            'attribute2'=>0,
            'attribute3'=>0,
        ]);
        $trx=Transaksi::get();

        $a= \DB::commit();

        return view('transaksi.index',compact('trx'))->with('no',1);

    }
    public function destroy($id)
    {
        $deltrx=Transaksi::find($id);
        $deltrx->delete();

        return back()->with('success','Your data has been deleted');

    }
    public function show($id)
    {
        $trx=Transaksi::where('id',$id)->first();
        return view('transaksi.show',compact('trx'));
    }
    public function update(Request $request,$id)
    {
        $trx=Transaksi::where('id',$id)->update([
            'jenis_transaksi'=>$request->jenis_transaksi,
            'kategori'=>$request->kategori,
            'nominal'=>$request->nominal,
            'deskripsi'=>$request->deskripsi,
        ]);
        $a= \DB::commit();
        
        $trx=Transaksi::get();
        return view('transaksi.index',compact('trx'))->with('no',1);
    }
    public function filter(Request $request)
    {
        
        $trx=Transaksi::whereBetween('created_at',[$request->from, $request->to])->get();
        return view('transaksi.filter',compact('trx'))->with('no',1);
    }
}
