<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Neraca;
use App\Models\JurnalManual;
use Illuminate\Support\Facades\Auth;

class JurnalManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jurnalmanual.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $neraca=Neraca::whereNot('saldo',0)->get();
        return view('jurnalmanual.create',compact('neraca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kredit = preg_replace('/[^0-9]/','',$request->input('no_akun_kredit')); 
        $data = array(
            'no_akun_debit'=>$request->no_akun_debet,
            'no_akun_kredit'=>$kredit,
            'nama_akun_debit'=>$request->nama_akun_debet,
            'nama_akun_kredit'=>$request->nama_akun_kredit,
            'nilai_debit'=>preg_replace('/[^0-9]/','',$request->nilai_debet),
            'nilai_kredit'=>preg_replace('/[^0-9]/','',$request->nilai_kredit),
            'keterangan'=>$request->keterangan,
            'attribute1'=>Auth::user()->id,
        );
        // dd($data);
        JurnalManual::create($data);
        $a= \DB::commit();
        return redirect()->route('jurnalmanual');
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
        $jurnalmanual = JurnalManual::where('attribute3',NULL)->where('attribute1',$iduser)->where('id',$id)->get()->first();
        if(Auth::user()->status==1){
            $jurnalmanual = JurnalManual::where('attribute3',NULL)->where('id',$id)->get()->first();
            return view('jurnalmanual.show',compact('jurnalmanual'));
        }
        if($jurnalmanual==null){
            return back();
        }else{
            return view('jurnalmanual.show',compact('jurnalmanual'));
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
        $neraca=Neraca::whereNot('saldo',0)->get();
        $jurnalmanual = JurnalManual::where('attribute3',NULL)->where('id',$id)->get()->first();
        return view('jurnalmanual.edit',compact('jurnalmanual','neraca'));
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
        // dd($id);
        JurnalManual::where('id',$id)->update([
            // 'no_akun_debit'=>$request->no_akun_debet,
            // 'no_akun_kredit'=>$request->no_akun_kredit,
            // 'nama_akun_debit'=>$request->nama_akun_debet,
            // 'nama_akun_kredit'=>$request->nama_akun_kredit,
            'nilai_debit'=>preg_replace('/[^0-9]/','',$request->nilai_debet),
            'nilai_kredit'=>preg_replace('/[^0-9]/','',$request->nilai_kredit),
            'keterangan'=>$request->keterangan,
            'attribute2'=>Auth::user()->id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        
        $a= \DB::commit();    
        return redirect()->route('jurnalmanual');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=JurnalManual::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
