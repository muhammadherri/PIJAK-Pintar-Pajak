<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenReferensi;

class AllInController extends Controller
{
    public function dokrefindex(){
        $data = DokumenReferensi::all();
        return response()->json($data);
    }
}
