<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryPengeluaran;

class CategoriesPengeluaranController extends Controller
{
    public function index()
    {
        $CategoryPengeluaran=CategoryPengeluaran::get();
        return view('categorypengeluaran.index',compact('CategoryPengeluaran'))->with('no',1);
    }
    public function create()
    {
        return view('categorypengeluaran.create');
    }
    public function store(Request $request)
    {
        // dd('tes');
        $subtotal = $request->sewa_kos+$request->makan+$request->pakaian+$request->nonton;
        
        $categoryadd = CategoryPengeluaran::updateOrCreate([
            'sewa_kos'=>$request->sewa_kos,
            'makan'=>$request->makan,
            'pakaian'=>$request->pakaian,
            'nonton'=>$request->nonton,
            'created_at'=>date('Y-m-d'),
            'attribute1'=>$subtotal,
            'attribute2'=>0,
            'attribute3'=>0,
           
        ]);
        $CategoryPengeluaran=CategoryPengeluaran::get();

        $a= \DB::commit();

        return view('categorypengeluaran.index',compact('CategoryPengeluaran'))->with('no',1);

    }
    public function destroy($id)
    {
        $deltcat=CategoryPengeluaran::find($id);
        $deltcat->delete();

        return back()->with('success','Your data has been deleted');

    }
    public function show($id)
    {
        $category=CategoryPengeluaran::where('id',$id)->first();
        return view('categorypengeluaran.show',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $subtotal = $request->sewa_kos+$request->makan+$request->pakaian+$request->nonton;
        $category=CategoryPengeluaran::where('id',$id)->update([
            'sewa_kos'=>$request->sewa_kos,
            'makan'=>$request->makan,
            'pakaian'=>$request->pakaian,
            'nonton'=>$request->nonton,
            'attribute1'=>$subtotal,

        ]);
        $a= \DB::commit();
        
        $CategoryPengeluaran=CategoryPengeluaran::get();
        return view('categorypengeluaran.index',compact('CategoryPengeluaran'))->with('no',1);

    }
}
