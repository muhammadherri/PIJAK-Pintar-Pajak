<?php

namespace App\Http\Controllers;
use App\Models\LatihanKeuangan;
use App\Models\JurnalManual;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JurnalManualLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('latihan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $neraca=LatihanKeuangan::whereNot('saldo',0)->get();
        return view('latihan.create',compact('neraca'));
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
        if($request->check==0){
            $data = array(
                'no_akun_debit'=>$request->no_akun_debet,
                'nama_akun_debit'=>$request->nama_akun_debet,
                'nilai_debit'=>preg_replace('/[^0-9]/','',$request->nilai_debet),
                'keterangan'=>$request->keterangan,
                'attribute1'=>Auth::user()->id,
                'attribute3'=>1,
                'attribute4'=>$request->check,
            );
        }else{
            $data = array(
                'no_akun_kredit'=>$request->no_akun_debet,
                'nama_akun_kredit'=>$request->nama_akun_debet,
                'nilai_kredit'=>preg_replace('/[^0-9]/','',$request->nilai_debet),
                'keterangan'=>$request->keterangan,
                'attribute1'=>Auth::user()->id,
                'attribute3'=>1,
                'attribute4'=>$request->check,
            );
        }
        
        // $data = array(
        //     'no_akun_debit'=>$request->no_akun_debet,
        //     'no_akun_kredit'=>$kredit,
        //     'nama_akun_debit'=>$request->nama_akun_debet,
        //     'nama_akun_kredit'=>$request->nama_akun_kredit,
        //     'nilai_debit'=>preg_replace('/[^0-9]/','',$request->nilai_debet),
        //     'nilai_kredit'=>preg_replace('/[^0-9]/','',$request->nilai_kredit),
        //     'keterangan'=>$request->keterangan,
        //     'attribute1'=>Auth::user()->id,
        //     'attribute3'=>1,
        // );
        // dd($data);
        JurnalManual::create($data);
        $a= \DB::commit();
        return redirect()->route('latihan');
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
        $jurnalmanual = JurnalManual::where('attribute3',1)->where('attribute1',$iduser)->where('id',$id)->get()->first();
        if(Auth::user()->status==1){
            $jurnalmanual = JurnalManual::where('attribute3',1)->where('id',$id)->get()->first();
            return view('latihan.show',compact('jurnalmanual'));
        }
        if($jurnalmanual==null){
            return back();
        }else{
            return view('latihan.show',compact('jurnalmanual'));
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
        $iduser=Auth::user()->id;
        $neraca=LatihanKeuangan::whereNot('saldo',0)->get();
        $jurnalmanual = JurnalManual::where('attribute1',$iduser)->where('attribute3',1)->where('id',$id)->get()->first();
        return view('latihan.edit',compact('jurnalmanual','neraca'));
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
       
        if($request->check==0){
            JurnalManual::where('id',$id)->update([
                'no_akun_debit'=>$request->no_akun,
                'nama_akun_debit'=>$request->nama_akun,
                'no_akun_kredit'=>NULL,
                'nama_akun_kredit'=>NULL,
                'nilai_debit'=>preg_replace('/[^0-9]/','',$request->nilai),
                'nilai_kredit'=>null,
                'keterangan'=>$request->keterangan,
                'attribute2'=>Auth::user()->id,
                'updated_at'=>date('Y-m-d H:i:s'),
                'attribute4'=>$request->check,
            ]);
        }else{
            JurnalManual::where('id',$id)->update([
                'no_akun_debit'=>NULL,
                'nama_akun_debit'=>NULL,
                'no_akun_kredit'=>$request->no_akun,
                'nama_akun_kredit'=>$request->nama_akun,
                'nilai_debit'=>null,
                'nilai_kredit'=>preg_replace('/[^0-9]/','',$request->nilai),
                'keterangan'=>$request->keterangan,
                'attribute2'=>Auth::user()->id,
                'updated_at'=>date('Y-m-d H:i:s'),
                'attribute4'=>$request->check,
            ]);
        }
        
        $a= \DB::commit();    
        return redirect()->route('latihan');
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
