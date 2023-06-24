<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Category;
use App\Models\CategoryPengeluaran;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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
        return view('home',compact('totalsaldo','subtotalpengeluaran','subtotalpemasukan'));
    }
}
