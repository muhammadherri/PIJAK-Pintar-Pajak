<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ebupot;
use App\Models\User;
use App\Models\Billing;
use App\Models\TransaksiPphDuapuluhSatu;
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
        $trx=TransaksiPphDuapuluhSatu::where('attribute1',$id)->get();
        $ebupot=Ebupot::where('attribute1',$id)->get();
        $billing=Billing::where('attribute1',$id)->get();
        $user = User::where('id',$id)->get()->first();

        $lastLogin = $user->updated_at;
        $lastLoginTime = Carbon::createFromFormat('Y-m-d H:i:s',$lastLogin);
        $now = Carbon::now();
        $timeDifferent = $now->diffForHumans($lastLoginTime);
        // dd($user);
        if(Auth::user()->status==1){
            return view('mahasiswa.show',compact('timeDifferent','user','trx','ebupot','billing'))->with('no',1);
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
