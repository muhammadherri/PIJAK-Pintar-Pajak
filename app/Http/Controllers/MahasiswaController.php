<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebupot;
use App\Models\User;
use App\Models\Pphfinal;
use App\Models\Billing;
use App\Models\PphTidakFinal;
use App\Models\TransaksiPphDuapuluhSatu;
use App\Models\Invoice;
use App\Models\Faktur;
use App\Models\HutangPpn;
use App\Models\Prepopulate;
use App\Models\PphBadanTahunan;
use App\Models\SptTahunan;
use App\Models\SptMasa;
use App\Models\SptPpn;
use App\Models\Spt1770S;
use App\Models\Spt1770SS;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $hutangppn=HutangPpn::where('attribute1',$id)->get();
        $prepopulate=Prepopulate::where('attribute1',$id)->get();
        $trx=TransaksiPphDuapuluhSatu::where('attribute1',$id)->get();
        $pphfinal=Pphfinal::where('attribute1',$id)->get();
        $pphtidakfinal=PphTidakFinal::where('attribute1',$id)->get();
        $pphtahunan=PphBadanTahunan::where('attribute1',$id)->get();
        $ebupot=Ebupot::where('attribute1',$id)->get();
        $invoice=Invoice::where('attribute1',$id)->get();
        $faktur=Faktur::where('attribute1',$id)->get();
        $billing=Billing::where('attribute1',$id)->get();
        $spt1771=SptTahunan::where('attribute1',$id)->get();
        $spt1721=SptMasa::where('attribute1',$id)->get();
        $spt1111=SptPpn::where('attribute_1',$id)->get();
        $spt1770s=Spt1770S::where('attribute1',$id)->get();
        $spt1770ss=Spt1770SS::where('attribute1',$id)->get();
        $user = User::where('id',$id)->where('dosen_pembimbing',$iduser)->get()->first();
        if($user==null){
            return back();
        }
        $lastLogin = $user->updated_at;
        $lastLoginTime = Carbon::createFromFormat('Y-m-d H:i:s',$lastLogin);
        $now = Carbon::now();
        $timeDifferent = $now->diffForHumans($lastLoginTime);
        // dd($user);
       
        if(Auth::user()->status==1){
            return view('mahasiswa.show',compact('spt1770ss','spt1770s','spt1111','spt1721','spt1771','pphtahunan','hutangppn','prepopulate','faktur','invoice','pphtidakfinal','pphfinal','timeDifferent','user','trx','ebupot','billing'))->with('no',1);
        }else{
            return back();
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
