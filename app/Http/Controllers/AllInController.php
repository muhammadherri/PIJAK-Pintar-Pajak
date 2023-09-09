<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenReferensi;
use App\Models\Ptkp;
use App\Models\TransaksiPphDuapuluhSatu;

class AllInController extends Controller
{
    public function dokrefindex(){
        $data = DokumenReferensi::all();
        return response()->json($data);
    }
    public function resultPtkp(Request $request,$status=null,$tanggungan=null){
        $tanggungans = preg_replace('/[^0-9]/','',$status); 
        $statuses = preg_replace('/[^a-zA-Z]/','',$status); 
        // dd($statuses);
        
        $data=Ptkp::where('kode_ptkp',$statuses)->where('tanggungan',$tanggungans)->get();
        // dd($data);
        return response()->json($data);
    }
    public function indexpphduasatu(Request $request){
        $pph21 = TransaksiPphDuapuluhSatu::all();
        $data_arr = array();
        foreach ($pph21 as $pph21) {
            $data_arr[] = array(
                "id" => $record->id,
                
            );
        }
        $response = array(
            "aaData" => $data_arr,
        );
        return json_encode($response);
    }
}
