<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\Ebupot;
use App\Models\Billing;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
        $user=Auth::user();
        $id=Auth::user()->id;
        User::where('id',$id)->update([
            'updated_at'=>now(),
        ]);
        $a= \DB::commit();        

        $pph21=TransaksiPphDuapuluhSatu::all()->count();
        $ebupot=Ebupot::all()->count();
        $billing=Billing::all()->count();
        // $billing=Billing::sum('jumlah');
        $users=User::where('status',null)->get();
        $jumlahmahasiswa=User::where('status',null)->get()->count();
        $invcount = Invoice::sum('total');

        // dd($jumlahmahasiswa);
        return view('home',compact('invcount','jumlahmahasiswa','user','users','pph21','ebupot','billing'))->with('no');
    }
}
