<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\NamaKelas;

class AdminRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminregister.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas=NamaKelas::get();
        $dosen=User::whereNotNull('nama_lengkap')->where('status',1)->get();
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            return view('adminregister.create',compact('kelas','dosen'));
        }else{
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::where('email',$request->nim)->get()->first();
        // dd($users);
        if($users==null){
            // dd('masuk');
            $data = array(
                'nama_lengkap'=>$request->nama_lengkap,
                'dosen_pembimbing'=>$request->dosen_pembimbing,
                'kelas'=>$request->kelas,
                'gender'=>$request->gender,
                'name'=>$request->name,
                'email'=>$request->nim,
                'status'=>$request->status,
                'password'=>Hash::make($request->password),
            );
            // dd($data);
            User::create($data);
            $a= \DB::commit();
            return redirect()->route('adminregister');

        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
