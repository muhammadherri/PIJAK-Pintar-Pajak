<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $category=Category::get();
        return view('categories.index',compact('category'))->with('no',1);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $subtotal = $request->gaji+$request->tunjangan+$request->bonus;
        $categoryadd = Category::updateOrCreate([
            'gaji'=>$request->gaji,
            'tunjangan'=>$request->tunjangan,
            'bonus'=>$request->bonus,
            'created_at'=>date('Y-m-d'),
            'attribute1'=>$subtotal,
            'attribute2'=>0,
            'attribute3'=>0,
           
        ]);
        $category=Category::get();
        $a= \DB::commit();

        return view('categories.index',compact('category'))->with('no',1);

    }
    public function destroy($id)
    {
        $deltcat=Category::find($id);
        $deltcat->delete();

        return back()->with('success','Your data has been deleted');

    }
    public function show($id)
    {
        $category=Category::where('id',$id)->first();
        return view('categories.show',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $subtotal = $request->gaji+$request->tunjangan+$request->bonus;
        $category=Category::where('id',$id)->update([
            'gaji'=>$request->gaji,
            'tunjangan'=>$request->tunjangan,
            'bonus'=>$request->bonus,
            'attribute1'=>$subtotal,

        ]);
        $a= \DB::commit();
        
        $category=Category::get();
        return view('categories.index',compact('category'))->with('no',1);

    }
}
