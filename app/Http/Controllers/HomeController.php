<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\Ebupot;
use App\Models\Billing;
use App\Models\Faktur;
use App\Models\SptTahunan;
use App\Models\SptMasa;
use App\Models\SptPpn;
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
        // dd($user->dosen_pembimbing);
        $namadosen=User::where('id',$user->dosen_pembimbing)->get()->first();
        
        $id=Auth::user()->id;
        User::where('id',$id)->update([
            'updated_at'=>now(),
        ]);
        $a= \DB::commit();        

        $pph21=TransaksiPphDuapuluhSatu::all()->count();
        $ebupot=Ebupot::all()->count();
        $billing=Billing::where('attribute1',$id)->count();
        $stp1771=SptTahunan::where('attribute1',$id)->count();
        $stp1721=SptMasa::where('attribute1',$id)->count();
        $stp1111=SptPpn::where('attribute_1',$id)->count();
        // $billing=Billing::sum('jumlah');
        $users=User::where('status',null)->get();
        $jumlahmahasiswa=User::where('status',null)->get()->count();
        $fktr10 = Faktur::where('attribute1',$id)->where('no_seri','010')->sum('ppn_fktr');
        $fktr40 = Faktur::where('attribute1',$id)->where('no_seri','040')->sum('ppn_fktr');
        $fktr60 = Faktur::where('attribute1',$id)->where('no_seri','060')->sum('ppn_fktr');
        $fktr90 = Faktur::where('attribute1',$id)->where('no_seri','090')->sum('ppn_fktr');
        $fktrgg = Faktur::where('attribute1',$id)->where('no_seri','Digunggung')->sum('ppn_fktr');
        $fktrcount= $fktr10+$fktr40+$fktr60+$fktr90+$fktrgg;

        // dd($jumlahmahasiswa);
        return view('home',compact('namadosen','stp1111','stp1721','stp1771','fktrcount','jumlahmahasiswa','user','users','pph21','ebupot','billing'))->with('no');
    }
}
