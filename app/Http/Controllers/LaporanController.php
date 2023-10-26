<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Neraca;
use App\Models\JurnalManual;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {}

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
        //
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
    public function laporankeuanganfiskal(Request $request)
    {
        // $date = Carbon::parse($request->end_date);
        // $periodbulan = $date->format('M');
        // $periodtanggal = $date->format('d Y');

        // $mulai = $request->start_date;
        // $selesai = $request->end_date;
        // ASET LANCAR 
        // 1110
        $asetlancar1110=Neraca::whereNot('saldo',0)->where('no_akun','1110')->get();
        $debit1110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1110')->sum('nilai_debit');
        $kredit1110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1110')->sum('nilai_kredit');
        // 1110
        
        // 1111
        $asetlancar1111=Neraca::whereNot('saldo',0)->where('no_akun','1111')->get();
        $debit1111=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1111')->sum('nilai_debit');
        $kredit1111=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1111')->sum('nilai_kredit');
        // 1111
        
        // 1112
        $asetlancar1112=Neraca::whereNot('saldo',0)->where('no_akun','1112')->get();
        $debit1112=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1112')->sum('nilai_debit');
        $kredit1112=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1112')->sum('nilai_kredit');
        // 1112

        // 1113
        $asetlancar1113=Neraca::whereNot('saldo',0)->where('no_akun','1113')->get();
        $debit1113=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1113')->sum('nilai_debit');
        $kredit1113=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1113')->sum('nilai_kredit');
        // 1113

        // 1114
        $asetlancar1114=Neraca::whereNot('saldo',0)->where('no_akun','1114')->get();
        $debit1114=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1114')->sum('nilai_debit');
        $kredit1114=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1114')->sum('nilai_kredit');
        // 1114

        // 1120
        $asetlancar1120=Neraca::whereNot('saldo',0)->where('no_akun','1120')->get();
        $debit1120=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1120')->sum('nilai_debit');
        $kredit1120=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1120')->sum('nilai_kredit');
        // 1120

        // 1130
        $asetlancar1130=Neraca::whereNot('saldo',0)->where('no_akun','1130')->get();
        $debit1130=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1130')->sum('nilai_debit');
        $kredit1130=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1130')->sum('nilai_kredit');
        // 1130
        
        // 1210
        $asetlancar1210=Neraca::whereNot('saldo',0)->where('no_akun','1210')->get();
        $debit1210=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1210')->sum('nilai_debit');
        $kredit1210=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1210')->sum('nilai_kredit');
        // 1210

        // 1220
        $asetlancar1220=Neraca::whereNot('saldo',0)->where('no_akun','1220')->get();
        $debit1220=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1220')->sum('nilai_debit');
        $kredit1220=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1220')->sum('nilai_kredit');
        // 1220

        // 1230
        $asetlancar1230=Neraca::whereNot('saldo',0)->where('no_akun','1230')->get();
        $debit1230=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1230')->sum('nilai_debit');
        $kredit1230=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1230')->sum('nilai_kredit');
        // 1230

        // 1240
        $asetlancar1240=Neraca::whereNot('saldo',0)->where('no_akun','1240')->get();
        $debit1240=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1240')->sum('nilai_debit');
        $kredit1240=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1240')->sum('nilai_kredit');
        // 1240

        // 1250
        $asetlancar1250=Neraca::whereNot('saldo',0)->where('no_akun','1250')->get();
        $debit1250=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1250')->sum('nilai_debit');
        $kredit1250=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1250')->sum('nilai_kredit');
        // 1250

        // 1251
        $asetlancar1251=Neraca::whereNot('saldo',0)->where('no_akun','1251')->get();
        $debit1251=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1251')->sum('nilai_debit');
        $kredit1251=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1251')->sum('nilai_kredit');
        // 1251

        // 1260
        $asetlancar1260=Neraca::whereNot('saldo',0)->where('no_akun','1260')->get();
        $debit1260=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1260')->sum('nilai_debit');
        $kredit1260=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1260')->sum('nilai_kredit');
        // 1260
        // 1270
        $asetlancar1270=Neraca::whereNot('saldo',0)->where('no_akun','1270')->get();
        $debit1270=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1270')->sum('nilai_debit');
        $kredit1270=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1270')->sum('nilai_kredit');
        // 1270
        // 1271
        $asetlancar1271=Neraca::whereNot('saldo',0)->where('no_akun','1271')->get();
        $debit1271=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1271')->sum('nilai_debit');
        $kredit1271=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1271')->sum('nilai_kredit');
        // 1271
        // 1272
        $asetlancar1272=Neraca::whereNot('saldo',0)->where('no_akun','1272')->get();
        $debit1272=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1272')->sum('nilai_debit');
        $kredit1272=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1272')->sum('nilai_kredit');
        // 1272
        // 1273
        $asetlancar1273=Neraca::whereNot('saldo',0)->where('no_akun','1273')->get();
        $debit1273=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1273')->sum('nilai_debit');
        $kredit1273=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1273')->sum('nilai_kredit');
        // 1273
        // 1274
        $asetlancar1274=Neraca::whereNot('saldo',0)->where('no_akun','1274')->get();
        $debit1274=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1274')->sum('nilai_debit');
        $kredit1274=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1274')->sum('nilai_kredit');
        // 1274
        // 1275
        $asetlancar1275=Neraca::whereNot('saldo',0)->where('no_akun','1275')->get();
        $debit1275=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1275')->sum('nilai_debit');
        $kredit1275=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1275')->sum('nilai_kredit');
        // 1275
        // 1310
        $asetlancar1310=Neraca::whereNot('saldo',0)->where('no_akun','1310')->get();
        $debit1310=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1310')->sum('nilai_debit');
        $kredit1310=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1310')->sum('nilai_kredit');
        // 1310
        // 1312
        $asetlancar1312=Neraca::whereNot('saldo',0)->where('no_akun','1312')->get();
        $debit1312=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1312')->sum('nilai_debit');
        $kredit1312=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1312')->sum('nilai_kredit');
        // 1312

        
        // 1313
        $asetlancar1313=Neraca::whereNot('saldo',0)->where('no_akun','1313')->get();
        $debit1313=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1313')->sum('nilai_debit');
        $kredit1313=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1313')->sum('nilai_kredit');
        // 1313
        
        // 1314
        $asetlancar1314=Neraca::whereNot('saldo',0)->where('no_akun','1314')->get();
        $debit1314=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1314')->sum('nilai_debit');
        $kredit1314=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1314')->sum('nilai_kredit');
        // 1314

        // 1330
        $asetlancar1330=Neraca::whereNot('saldo',0)->where('no_akun','1330')->get();
        $debit1330=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1330')->sum('nilai_debit');
        $kredit1330=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1330')->sum('nilai_kredit');
        // 1330
        // 1340
        $asetlancar1340=Neraca::whereNot('saldo',0)->where('no_akun','1340')->get();
        $debit1340=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1340')->sum('nilai_debit');
        $kredit1340=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1340')->sum('nilai_kredit');
        // 1340
        // 1341
        $asetlancar1341=Neraca::whereNot('saldo',0)->where('no_akun','1341')->get();
        $debit1341=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1341')->sum('nilai_debit');
        $kredit1341=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1341')->sum('nilai_kredit');
        // 1341
        // 1342
        $asetlancar1342=Neraca::whereNot('saldo',0)->where('no_akun','1342')->get();
        $debit1342=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1342')->sum('nilai_debit');
        $kredit1342=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1342')->sum('nilai_kredit');
        // 1342
        // 1360
        $asetlancar1360=Neraca::whereNot('saldo',0)->where('no_akun','1360')->get();
        $debit1360=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1360')->sum('nilai_debit');
        $kredit1360=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1360')->sum('nilai_kredit');
        // 1360
        // 1361
        $asetlancar1361=Neraca::whereNot('saldo',0)->where('no_akun','1361')->get();
        $debit1361=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1361')->sum('nilai_debit');
        $kredit1361=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1361')->sum('nilai_kredit');
        // 1361
        // 1362
        $asetlancar1362=Neraca::whereNot('saldo',0)->where('no_akun','1362')->get();
        $debit1362=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1362')->sum('nilai_debit');
        $kredit1362=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1362')->sum('nilai_kredit');
        // 1362
        // 1380
        $asetlancar1380=Neraca::whereNot('saldo',0)->where('no_akun','1380')->get();
        $debit1380=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1380')->sum('nilai_debit');
        $kredit1380=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1380')->sum('nilai_kredit');
        // 1380
        // 1410
        $asetlancar1410=Neraca::whereNot('saldo',0)->where('no_akun','1410')->get();
        $debit1410=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1410')->sum('nilai_debit');
        $kredit1410=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1410')->sum('nilai_kredit');
        // 1410
        // 1420
        $asetlancar1420=Neraca::whereNot('saldo',0)->where('no_akun','1420')->get();
        $debit1420=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1420')->sum('nilai_debit');
        $kredit1420=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1420')->sum('nilai_kredit');
        // 1420
        // 1430
        $asetlancar1430=Neraca::whereNot('saldo',0)->where('no_akun','1430')->get();
        $debit1430=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1430')->sum('nilai_debit');
        $kredit1430=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1430')->sum('nilai_kredit');
        // 1430
        // 1440
        $asetlancar1440=Neraca::whereNot('saldo',0)->where('no_akun','1440')->get();
        $debit1440=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1440')->sum('nilai_debit');
        $kredit1440=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1440')->sum('nilai_kredit');
        // 1440
        // 1450
        $asetlancar1450=Neraca::whereNot('saldo',0)->where('no_akun','1450')->get();
        $debit1450=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1450')->sum('nilai_debit');
        $kredit1450=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1450')->sum('nilai_kredit');
        // 1450
        // 1460
        $asetlancar1460=Neraca::whereNot('saldo',0)->where('no_akun','1460')->get();
        $debit1460=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1460')->sum('nilai_debit');
        $kredit1460=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1460')->sum('nilai_kredit');
        // 1460

        // 1510
        $asetlancar1510=Neraca::whereNot('saldo',0)->where('no_akun','1510')->get();
        $debit1510=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1510')->sum('nilai_debit');
        $kredit1510=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1510')->sum('nilai_kredit');
        // 1510

        // 1520
        $asetlancar1520=Neraca::whereNot('saldo',0)->where('no_akun','1520')->get();
        $debit1520=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1520')->sum('nilai_debit');
        $kredit1520=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1520')->sum('nilai_kredit');
        // 1520

        // 1530
        $asetlancar1530=Neraca::whereNot('saldo',0)->where('no_akun','1530')->get();
        $debit1530=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1530')->sum('nilai_debit');
        $kredit1530=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1530')->sum('nilai_kredit');
        // 1530

        // 1540
        $asetlancar1540=Neraca::whereNot('saldo',0)->where('no_akun','1540')->get();
        $debit1540=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1540')->sum('nilai_debit');
        $kredit1540=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1540')->sum('nilai_kredit');
        // 1540
        
        // 1550
        $asetlancar1550=Neraca::whereNot('saldo',0)->where('no_akun','1550')->get();
        $debit1550=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1550')->sum('nilai_debit');
        $kredit1550=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1550')->sum('nilai_kredit');
        // 1550
        // 1600
        $asetlancar1600=Neraca::whereNot('saldo',0)->where('no_akun','1600')->get();
        $debit1600=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1600')->sum('nilai_debit');
        $kredit1600=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1600')->sum('nilai_kredit');
        // 1600
        // 1610
        $asetlancar1610=Neraca::whereNot('saldo',0)->where('no_akun','1610')->get();
        $debit1610=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1610')->sum('nilai_debit');
        $kredit1610=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1610')->sum('nilai_kredit');
        // 1610
        // 1620
        $asetlancar1620=Neraca::whereNot('saldo',0)->where('no_akun','1620')->get();
        $debit1620=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1620')->sum('nilai_debit');
        $kredit1620=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1620')->sum('nilai_kredit');
        // 1620
        // 1630
        $asetlancar1630=Neraca::whereNot('saldo',0)->where('no_akun','1630')->get();
        $debit1630=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1630')->sum('nilai_debit');
        $kredit1630=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1630')->sum('nilai_kredit');
        // 1630
        // 1640
        $asetlancar1640=Neraca::whereNot('saldo',0)->where('no_akun','1640')->get();
        $debit1640=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','1640')->sum('nilai_debit');
        $kredit1640=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','1640')->sum('nilai_kredit');
        // 1640
        // 2110
        $asetlancar2110=Neraca::whereNot('saldo',0)->where('no_akun','2110')->get();
        $debit2110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2110')->sum('nilai_debit');
        $kredit2110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2110')->sum('nilai_kredit');
        // 2110
        // 2120
        $asetlancar2120=Neraca::whereNot('saldo',0)->where('no_akun','2120')->get();
        $debit2120=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2120')->sum('nilai_debit');
        $kredit2120=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2120')->sum('nilai_kredit');
        // 2120
        // 2130
        $asetlancar2130=Neraca::whereNot('saldo',0)->where('no_akun','2130')->get();
        $debit2130=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2130')->sum('nilai_debit');
        $kredit2130=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2130')->sum('nilai_kredit');
        // 2130
        // 2140
        $asetlancar2140=Neraca::whereNot('saldo',0)->where('no_akun','2140')->get();
        $debit2140=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2140')->sum('nilai_debit');
        $kredit2140=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2140')->sum('nilai_kredit');
        // 2140
        // 2150
        $asetlancar2150=Neraca::whereNot('saldo',0)->where('no_akun','2150')->get();
        $debit2150=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2150')->sum('nilai_debit');
        $kredit2150=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2150')->sum('nilai_kredit');
        // 2150
        // 2160
        $asetlancar2160=Neraca::whereNot('saldo',0)->where('no_akun','2160')->get();
        $debit2160=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2160')->sum('nilai_debit');
        $kredit2160=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2160')->sum('nilai_kredit');
        // 2160
        // 2310
        $asetlancar2310=Neraca::whereNot('saldo',0)->where('no_akun','2310')->get();
        $debit2310=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2310')->sum('nilai_debit');
        $kredit2310=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2310')->sum('nilai_kredit');
        // 2310
        // 2320
        $asetlancar2320=Neraca::whereNot('saldo',0)->where('no_akun','2320')->get();
        $debit2320=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2320')->sum('nilai_debit');
        $kredit2320=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2320')->sum('nilai_kredit');
        // 2320

        // 2330
        $asetlancar2330=Neraca::whereNot('saldo',0)->where('no_akun','2330')->get();
        $debit2330=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2330')->sum('nilai_debit');
        $kredit2330=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2330')->sum('nilai_kredit');
        // 2330

        // 2210
        $asetlancar2210=Neraca::whereNot('saldo',0)->where('no_akun','2210')->get();
        $debit2210=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2210')->sum('nilai_debit');
        $kredit2210=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2210')->sum('nilai_kredit');
        // 2210
        // 2220
        $asetlancar2220=Neraca::whereNot('saldo',0)->where('no_akun','2220')->get();
        $debit2220=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2220')->sum('nilai_debit');
        $kredit2220=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2220')->sum('nilai_kredit');
        // 2220
        // 2221
        $asetlancar2221=Neraca::whereNot('saldo',0)->where('no_akun','2221')->get();
        $debit2221=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2221')->sum('nilai_debit');
        $kredit2221=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2221')->sum('nilai_kredit');
        // 2221
        // 2222
        $asetlancar2222=Neraca::whereNot('saldo',0)->where('no_akun','2222')->get();
        $debit2222=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2222')->sum('nilai_debit');
        $kredit2222=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2222')->sum('nilai_kredit');
        // 2222
        // 2223
        $asetlancar2223=Neraca::whereNot('saldo',0)->where('no_akun','2223')->get();
        $debit2223=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2223')->sum('nilai_debit');
        $kredit2223=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2223')->sum('nilai_kredit');
        // 2223
        // 2224
        $asetlancar2224=Neraca::whereNot('saldo',0)->where('no_akun','2224')->get();
        $debit2224=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2224')->sum('nilai_debit');
        $kredit2224=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2224')->sum('nilai_kredit');
        // 2224
        // 2230
        $asetlancar2230=Neraca::whereNot('saldo',0)->where('no_akun','2230')->get();
        $debit2230=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2230')->sum('nilai_debit');
        $kredit2230=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2230')->sum('nilai_kredit');
        // 2230
        // 2710
        $asetlancar2710=Neraca::whereNot('saldo',0)->where('no_akun','2710')->get();
        $debit2710=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2710')->sum('nilai_debit');
        $kredit2710=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2710')->sum('nilai_kredit');
        // 2710
        // 2720
        $asetlancar2720=Neraca::whereNot('saldo',0)->where('no_akun','2720')->get();
        $debit2720=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2720')->sum('nilai_debit');
        $kredit2720=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2720')->sum('nilai_kredit');
        // 2720
        // 2730
        $asetlancar2730=Neraca::whereNot('saldo',0)->where('no_akun','2730')->get();
        $debit2730=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2730')->sum('nilai_debit');
        $kredit2730=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2730')->sum('nilai_kredit');
        // 2730
        // 2740
        $asetlancar2740=Neraca::whereNot('saldo',0)->where('no_akun','2740')->get();
        $debit2740=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2740')->sum('nilai_debit');
        $kredit2740=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2740')->sum('nilai_kredit');
        // 2740
        // 2750
        $asetlancar2750=Neraca::whereNot('saldo',0)->where('no_akun','2750')->get();
        $debit2750=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2750')->sum('nilai_debit');
        $kredit2750=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2750')->sum('nilai_kredit');
        // 2750
        // 2760
        $asetlancar2760=Neraca::whereNot('saldo',0)->where('no_akun','2760')->get();
        $debit2760=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','2760')->sum('nilai_debit');
        $kredit2760=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','2760')->sum('nilai_kredit');
        // 2760
        // 3100
        $asetlancar3100=Neraca::whereNot('saldo',0)->where('no_akun','3100')->get();
        $debit3100=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','3100')->sum('nilai_debit');
        $kredit3100=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','3100')->sum('nilai_kredit');
        // 3100
        // 3110
        $asetlancar3110=Neraca::whereNot('saldo',0)->where('no_akun','3110')->get();
        $debit3110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','3110')->sum('nilai_debit');
        $kredit3110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','3110')->sum('nilai_kredit');
        // 3110
        // 3200
        $asetlancar3200=Neraca::whereNot('saldo',0)->where('no_akun','3200')->get();
        $debit3200=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','3200')->sum('nilai_debit');
        $kredit3200=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','3200')->sum('nilai_kredit');
        // 3200
        // 3300
        $asetlancar3300=Neraca::whereNot('saldo',0)->where('no_akun','3300')->get();
        $debit3300=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','3300')->sum('nilai_debit');
        $kredit3300=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','3300')->sum('nilai_kredit');
        // 3300

        // $neracaaset=Neraca::whereNot('saldo',0)->where('no_akun','<','1200')->get();
        // $lineaset=JurnalManual::where('attribute3',NULL)->whereBetween('created_at',[$mulai,$selesai])->where('no_akun_debit','<','1200')->orWhere('no_akun_kredit','<','1200')->get();
        $totalaktivalancar=Neraca::where('no_akun','<','1500')->whereNot('saldo',0)->sum('saldo');
        $nilaiaktivatetap=Neraca::where('no_akun','>','1510')->whereNot('saldo',0)->where('no_akun','<','1550')->sum('saldo');
        $nilaipenyusutan=Neraca::where('no_akun','>','1550')->whereNot('saldo',0)->where('no_akun','<','1650')->sum('saldo');
        $totalaktivatetap = $nilaiaktivatetap+$nilaipenyusutan;
        $totalaktiva = $totalaktivalancar+$totalaktivatetap;

        $totalliabilitislancar=Neraca::where('no_akun','>','2100')->where('no_akun','<','2710')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitisjangkapanjang=Neraca::where('no_akun','>','2700')->where('no_akun','<','2770')->whereNot('saldo',0)->sum('saldo');
        $totalmodal=Neraca::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->sum('saldo');
        $totalliabilitasmodal = $totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        
        $totaldebit=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','<','3300')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','<','3300')->sum('nilai_kredit');

        // DD($totalliabilitislancar);
        // ASET LANCAR 
        return view('laporan.laporankeuanganfiskal',compact( 
            'totaldebit','totalkredit',
            'kredit1110','debit1110','asetlancar1110',
            'asetlancar1111','debit1111','kredit1111',
            'asetlancar1112','debit1112','kredit1112',
            'asetlancar1113','debit1113','kredit1113',
            'asetlancar1114','debit1114','kredit1114',
            'asetlancar1120','debit1120','kredit1120',
            'asetlancar1130','debit1130','kredit1130',
            'asetlancar1210','debit1210','kredit1210',
            'asetlancar1220','debit1220','kredit1220',
            'asetlancar1230','debit1230','kredit1230',
            'asetlancar1240','debit1240','kredit1240',
            'asetlancar1250','debit1250','kredit1250',
            'asetlancar1251','debit1251','kredit1251',
            'asetlancar1260','debit1260','kredit1260',
            'asetlancar1270','debit1270','kredit1270',
            'asetlancar1271','debit1271','kredit1271',
            'asetlancar1272','debit1272','kredit1272',
            'asetlancar1273','debit1273','kredit1273',
            'asetlancar1274','debit1274','kredit1274',
            'asetlancar1275','debit1275','kredit1275',
            'asetlancar1310','debit1310','kredit1310',
            'asetlancar1312','debit1312','kredit1312','totalaktivalancar',
            'asetlancar1313','debit1313','kredit1313',
            'asetlancar1314','debit1314','kredit1314',
            'asetlancar1330','debit1330','kredit1330',
            'asetlancar1340','debit1340','kredit1340',
            'asetlancar1341','debit1341','kredit1341',
            'asetlancar1342','debit1342','kredit1342',
            'asetlancar1360','debit1360','kredit1360',
            'asetlancar1361','debit1361','kredit1361',
            'asetlancar1362','debit1362','kredit1362',
            'asetlancar1380','debit1380','kredit1380',
            'asetlancar1410','debit1410','kredit1410',
            'asetlancar1420','debit1420','kredit1420',
            'asetlancar1430','debit1430','kredit1430',
            'asetlancar1440','debit1440','kredit1440',
            'asetlancar1450','debit1450','kredit1450',
            'asetlancar1460','debit1460','kredit1460',
            'asetlancar1510','debit1510','kredit1510',
            'asetlancar1520','debit1520','kredit1520',
            'asetlancar1530','debit1530','kredit1530',
            'asetlancar1540','debit1540','kredit1540',
            'asetlancar1550','debit1550','kredit1550','nilaiaktivatetap',
            'asetlancar1600','debit1600','kredit1600',
            'asetlancar1610','debit1610','kredit1610',
            'asetlancar1620','debit1620','kredit1620',
            'asetlancar1630','debit1630','kredit1630',
            'asetlancar1640','debit1640','kredit1640',
            'asetlancar2110','debit2110','kredit2110','nilaipenyusutan','totalaktivatetap','totalaktiva',
            'asetlancar2120','debit2120','kredit2120',
            'asetlancar2130','debit2130','kredit2130',
            'asetlancar2140','debit2140','kredit2140',
            'asetlancar2150','debit2150','kredit2150',
            'asetlancar2160','debit2160','kredit2160',
            'asetlancar2310','debit2310','kredit2310',
            'asetlancar2320','debit2320','kredit2320',
            'asetlancar2330','debit2330','kredit2330',
            'asetlancar2210','debit2210','kredit2210',
            'asetlancar2220','debit2220','kredit2220',
            'asetlancar2221','debit2221','kredit2221',
            'asetlancar2222','debit2222','kredit2222',
            'asetlancar2223','debit2223','kredit2223',
            'asetlancar2224','debit2224','kredit2224',
            'asetlancar2230','debit2230','kredit2230',
            'asetlancar2710','debit2710','kredit2710','totalliabilitislancar',
            'asetlancar2720','debit2720','kredit2720',
            'asetlancar2730','debit2730','kredit2730',
            'asetlancar2740','debit2740','kredit2740',
            'asetlancar2750','debit2750','kredit2750',
            'asetlancar2760','debit2760','kredit2760',
            'asetlancar3100','debit3100','kredit3100',
            'asetlancar3110','debit3110','kredit3110',
            'asetlancar3200','debit3200','kredit3200',
            'asetlancar3300','debit3300','kredit3300','totalmodal','totalliabilitasmodal'
        ));

    }
    public function laporankeuangankomersil(Request $request)
    {
        $asetlancar=Neraca::where('attribute3','KAS DAN SETARA KAS')->whereNot('saldo',0)->get();
        $piutang=Neraca::where('attribute3','PIUTANG USAHA PIHAK KETIGA')->whereNot('saldo',0)->get();
        $pajakaktiva=Neraca::where('attribute3','AKTIVA LANCAR LAINNYA')->whereNot('saldo',0)->get();
        $persediaan=Neraca::where('attribute3','PERSEDIAAN')->whereNot('saldo',0)->get();
        $pengeluarandibayar=Neraca::where('attribute3','BEBAN DIBAYAR DI MUKA')->whereNot('saldo',0)->get();
        $asettetap=Neraca::where('attribute3','AKTIVA TETAP LAINNYA')->whereNot('saldo',0)->get();
        $penyusutan=Neraca::where('attribute3','AKUMULASI PENYUSUTAN')->whereNot('saldo',0)->get();
        $liabilitaslancar=Neraca::where('attribute3','HUTANG USAHA PIHAK KETIGA')->whereNot('saldo',0)->get();
        $pengeluarandibayar=Neraca::where('attribute3','UANG MUKA PELANGGAN')->whereNot('saldo',0)->get();
        $pajak=Neraca::where('attribute3','HUTANG PAJAK')->whereNot('saldo',0)->get();
        $liabilitisjangkapanjang=Neraca::where('attribute3','HUTANG BANK JANGKA PANJANG')->whereNot('saldo',0)->get();
        // $modalpemilik=Neraca::where('attribute3','MODAL SAHAM')->whereNot('saldo',0)->get();
        $modalpemilik=Neraca::where('no_akun','>','3000')->where('no_akun','<','3400')->whereNot('saldo',0)->get();
        
        $totalaktivalancar=Neraca::where('no_akun','<','1510')->sum('saldo');
        $nilaiaktivatetap=Neraca::where('attribute3','AKTIVA TETAP LAINNYA')->sum('saldo');
        $nilaipenyusutan=Neraca::where('attribute3','AKUMULASI PENYUSUTAN')->sum('saldo');
        $totalliabilitislancar=Neraca::where('no_akun','>','2100')->where('no_akun','<','2710')->sum('saldo');
        $totalliabilitisjangkapanjang=Neraca::where('attribute3','HUTANG BANK JANGKA PANJANG')->sum('saldo');
        // $totalmodal=Neraca::where('attribute3','MODAL SAHAM')->sum('saldo');
        $totalmodal=Neraca::where('no_akun','>','3000')->where('no_akun','<','3400')->sum('saldo');
        
        // dd($totalaktivalancar);
        $totalaktivatetap=$nilaiaktivatetap+$nilaipenyusutan;
        $totalaktiva=$totalaktivatetap+$totalaktivalancar;
        $totalliabilitasmodal=$totalliabilitislancar+$totalliabilitisjangkapanjang+$totalmodal;
        // dd($penyusutan);
        return view('laporan.laporankeuangankomersil',compact('totalliabilitasmodal','totalmodal','modalpemilik','liabilitisjangkapanjang','totalliabilitisjangkapanjang','totalliabilitislancar','pajakaktiva','pajak','pengeluarandibayar','liabilitaslancar','totalaktiva','totalaktivatetap','nilaipenyusutan','penyusutan','nilaiaktivatetap','asettetap','totalaktivalancar','pengeluarandibayar','persediaan','pajak','asetlancar','piutang'));
    }
    public function laporankeuanganlabarugikomersil(Request $request){
        $pendapatan=Neraca::where('attribute3','PENJUALAN BERSIH')->whereNot('saldo',0)->get();
        $hargapokokpenjualan=Neraca::where('attribute3','HARGA POKOK PENJUALAN')->whereNot('saldo',0)->get();
        $pengeluaranoperasional=Neraca::where('no_akun','>','5600')->where('no_akun','<','7100')->whereNot('saldo',0)->get();
        $pendapatanlain=Neraca::where('attribute3','PENDAPATAN LAIN-LAIN')->whereNot('saldo',0)->get();
        $pengeluaranlain=Neraca::where('no_akun','>','7110')->where('no_akun','<','8130')->whereNot('saldo',0)->get();
        
        $totalpenjualan=Neraca::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalharpok=Neraca::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalbiayaoperasional=Neraca::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $jumlahpendapatanlain=Neraca::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahbebanlain=Neraca::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        // dd($totalbiayaoperasional);
        $labakotor = $totalpenjualan-$totalharpok;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        return view('laporan.laporankeuanganlabarugikomersil',compact(
            'pendapatan','hargapokokpenjualan','pengeluaranoperasional','pendapatanlain',
            'pengeluaranlain','totalpenjualan','totalharpok','totalbiayaoperasional',
            'jumlahpendapatanlain','jumlahbebanlain','labakotor','labaoperasional',
            'totalpendapatandanbebanlain','ikhtisarlabarugi'
        ));
    }
    public function laporankeuanganlabarugifiskal(Request $request){
        // 4100
        $asetlancar4100=Neraca::whereNot('saldo',0)->where('no_akun','4100')->get();
        $debit4100=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4100')->sum('nilai_debit');
        $kredit4100=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4100')->sum('nilai_kredit');
         // 4100
         // 4101
         $asetlancar4101=Neraca::whereNot('saldo',0)->where('no_akun','4101')->get();
         $debit4101=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4101')->sum('nilai_debit');
         $kredit4101=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4101')->sum('nilai_kredit');
        //  dd($asetlancar4101);
         // 4101
        // 4102
        $asetlancar4102=Neraca::whereNot('saldo',0)->where('no_akun','4102')->get();
        $debit4102=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4102')->sum('nilai_debit');
        $kredit4102=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4102')->sum('nilai_kredit');
         // 4102
        // 4103
        $asetlancar4103=Neraca::whereNot('saldo',0)->where('no_akun','4103')->get();
        $debit4103=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4103')->sum('nilai_debit');
        $kredit4103=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4103')->sum('nilai_kredit');
         // 4103
        // 4104
        $asetlancar4104=Neraca::whereNot('saldo',0)->where('no_akun','4104')->get();
        $debit4104=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4104')->sum('nilai_debit');
        $kredit4104=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4104')->sum('nilai_kredit');
         // 4104
        // 4200
        $asetlancar4200=Neraca::whereNot('saldo',0)->where('no_akun','4200')->get();
        $debit4200=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4200')->sum('nilai_debit');
        $kredit4200=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4200')->sum('nilai_kredit');
         // 4200
        // 4201
        $asetlancar4201=Neraca::whereNot('saldo',0)->where('no_akun','4201')->get();
        $debit4201=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4201')->sum('nilai_debit');
        $kredit4201=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4201')->sum('nilai_kredit');
         // 4201
        // 4202
        $asetlancar4202=Neraca::whereNot('saldo',0)->where('no_akun','4202')->get();
        $debit4202=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4202')->sum('nilai_debit');
        $kredit4202=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4202')->sum('nilai_kredit');
         // 4202
        // 4203
        $asetlancar4203=Neraca::whereNot('saldo',0)->where('no_akun','4203')->get();
        $debit4203=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4203')->sum('nilai_debit');
        $kredit4203=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4203')->sum('nilai_kredit');
         // 4203
        // 4300
        $asetlancar4300=Neraca::whereNot('saldo',0)->where('no_akun','4300')->get();
        $debit4300=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4300')->sum('nilai_debit');
        $kredit4300=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4300')->sum('nilai_kredit');
         // 4300
        // 4310
        $asetlancar4310=Neraca::whereNot('saldo',0)->where('no_akun','4310')->get();
        $debit4310=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4310')->sum('nilai_debit');
        $kredit4310=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4310')->sum('nilai_kredit');
         // 4310
        // 4320
        $asetlancar4320=Neraca::whereNot('saldo',0)->where('no_akun','4320')->get();
        $debit4320=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4320')->sum('nilai_debit');
        $kredit4320=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4320')->sum('nilai_kredit');
         // 4320
        // 4330
        $asetlancar4330=Neraca::whereNot('saldo',0)->where('no_akun','4330')->get();
        $debit4330=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4330')->sum('nilai_debit');
        $kredit4330=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4330')->sum('nilai_kredit');
         // 4330
        // 4340
        $asetlancar4340=Neraca::whereNot('saldo',0)->where('no_akun','4340')->get();
        $debit4340=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4340')->sum('nilai_debit');
        $kredit4340=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4340')->sum('nilai_kredit');
         // 4340
        // 4350
        $asetlancar4350=Neraca::whereNot('saldo',0)->where('no_akun','4350')->get();
        $debit4350=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4350')->sum('nilai_debit');
        $kredit4350=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4350')->sum('nilai_kredit');
         // 4350
        // 4105
        $asetlancar4105=Neraca::whereNot('saldo',0)->where('no_akun','4105')->get();
        $debit4105=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','4105')->sum('nilai_debit');
        $kredit4105=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','4105')->sum('nilai_kredit');
         // 4105
        // 5100
        $asetlancar5100=Neraca::whereNot('saldo',0)->where('no_akun','5100')->get();
        $debit5100=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5100')->sum('nilai_debit');
        $kredit5100=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5100')->sum('nilai_kredit');
         // 5100
        // 5110
        $asetlancar5110=Neraca::whereNot('saldo',0)->where('no_akun','5110')->get();
        $debit5110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5110')->sum('nilai_debit');
        $kredit5110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5110')->sum('nilai_kredit');
         // 5110
        // 5120
        $asetlancar5120=Neraca::whereNot('saldo',0)->where('no_akun','5120')->get();
        $debit5120=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5120')->sum('nilai_debit');
        $kredit5120=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5120')->sum('nilai_kredit');
         // 5120
        // 5200
        $asetlancar5200=Neraca::whereNot('saldo',0)->where('no_akun','5200')->get();
        $debit5200=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5200')->sum('nilai_debit');
        $kredit5200=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5200')->sum('nilai_kredit');
         // 5200
        // 5210
        $asetlancar5210=Neraca::whereNot('saldo',0)->where('no_akun','5210')->get();
        $debit5210=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5210')->sum('nilai_debit');
        $kredit5210=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5210')->sum('nilai_kredit');
         // 5210
        // 5211
        $asetlancar5211=Neraca::whereNot('saldo',0)->where('no_akun','5211')->get();
        $debit5211=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5211')->sum('nilai_debit');
        $kredit5211=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5211')->sum('nilai_kredit');
         // 5211
        // 5212
        $asetlancar5212=Neraca::whereNot('saldo',0)->where('no_akun','5212')->get();
        $debit5212=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5212')->sum('nilai_debit');
        $kredit5212=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5212')->sum('nilai_kredit');
         // 5212
        // 5213
        $asetlancar5213=Neraca::whereNot('saldo',0)->where('no_akun','5213')->get();
        $debit5213=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5213')->sum('nilai_debit');
        $kredit5213=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5213')->sum('nilai_kredit');
         // 5213
        // 5250
        $asetlancar5250=Neraca::whereNot('saldo',0)->where('no_akun','5250')->get();
        $debit5250=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5250')->sum('nilai_debit');
        $kredit5250=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5250')->sum('nilai_kredit');
         // 5250
        // 5260
        $asetlancar5260=Neraca::whereNot('saldo',0)->where('no_akun','5260')->get();
        $debit5260=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5260')->sum('nilai_debit');
        $kredit5260=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5260')->sum('nilai_kredit');
         // 5260
        // 5300
        $asetlancar5300=Neraca::whereNot('saldo',0)->where('no_akun','5300')->get();
        $debit5300=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5300')->sum('nilai_debit');
        $kredit5300=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5300')->sum('nilai_kredit');
         // 5300
        // 5400
        $asetlancar5400=Neraca::whereNot('saldo',0)->where('no_akun','5400')->get();
        $debit5400=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5400')->sum('nilai_debit');
        $kredit5400=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5400')->sum('nilai_kredit');
         // 5400
        // 5410
        $asetlancar5410=Neraca::whereNot('saldo',0)->where('no_akun','5410')->get();
        $debit5410=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5410')->sum('nilai_debit');
        $kredit5410=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5410')->sum('nilai_kredit');
         // 5410
        // 5420
        $asetlancar5420=Neraca::whereNot('saldo',0)->where('no_akun','5420')->get();
        $debit5420=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5420')->sum('nilai_debit');
        $kredit5420=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5420')->sum('nilai_kredit');
         // 5420
        // 5430
        $asetlancar5430=Neraca::whereNot('saldo',0)->where('no_akun','5430')->get();
        $debit5430=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5430')->sum('nilai_debit');
        $kredit5430=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5430')->sum('nilai_kredit');
         // 5430
        // 5440
        $asetlancar5440=Neraca::whereNot('saldo',0)->where('no_akun','5440')->get();
        $debit5440=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5440')->sum('nilai_debit');
        $kredit5440=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5440')->sum('nilai_kredit');
         // 5440
        // 5450
        $asetlancar5450=Neraca::whereNot('saldo',0)->where('no_akun','5450')->get();
        $debit5450=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5450')->sum('nilai_debit');
        $kredit5450=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5450')->sum('nilai_kredit');
         // 5450
        // 5460
        $asetlancar5460=Neraca::whereNot('saldo',0)->where('no_akun','5460')->get();
        $debit5460=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5460')->sum('nilai_debit');
        $kredit5460=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5460')->sum('nilai_kredit');
         // 5460
        // 5470
        $asetlancar5470=Neraca::whereNot('saldo',0)->where('no_akun','5470')->get();
        $debit5470=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5470')->sum('nilai_debit');
        $kredit5470=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5470')->sum('nilai_kredit');
         // 5470
        // 5480
        $asetlancar5480=Neraca::whereNot('saldo',0)->where('no_akun','5480')->get();
        $debit5480=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5480')->sum('nilai_debit');
        $kredit5480=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5480')->sum('nilai_kredit');
         // 5480
        // 5600
        $asetlancar5600=Neraca::whereNot('saldo',0)->where('no_akun','5600')->get();
        $debit5600=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','5600')->sum('nilai_debit');
        $kredit5600=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','5600')->sum('nilai_kredit');
         // 5600
        // 6100
        $asetlancar6100=Neraca::whereNot('saldo',0)->where('no_akun','6100')->get();
        $debit6100=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6100')->sum('nilai_debit');
        $kredit6100=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6100')->sum('nilai_kredit');
         // 6100
        // 6110
        $asetlancar6110=Neraca::whereNot('saldo',0)->where('no_akun','6110')->get();
        $debit6110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6110')->sum('nilai_debit');
        $kredit6110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6110')->sum('nilai_kredit');
         // 6110
        // 6120
        $asetlancar6120=Neraca::whereNot('saldo',0)->where('no_akun','6120')->get();
        $debit6120=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6120')->sum('nilai_debit');
        $kredit6120=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6120')->sum('nilai_kredit');
         // 6120
        // 6130
        $asetlancar6130=Neraca::whereNot('saldo',0)->where('no_akun','6130')->get();
        $debit6130=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6130')->sum('nilai_debit');
        $kredit6130=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6130')->sum('nilai_kredit');
         // 6130
        // 6140
        $asetlancar6140=Neraca::whereNot('saldo',0)->where('no_akun','6140')->get();
        $debit6140=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6140')->sum('nilai_debit');
        $kredit6140=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6140')->sum('nilai_kredit');
         // 6140
        // 6150
        $asetlancar6150=Neraca::whereNot('saldo',0)->where('no_akun','6150')->get();
        $debit6150=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6150')->sum('nilai_debit');
        $kredit6150=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6150')->sum('nilai_kredit');
         // 6150
        // 6160
        $asetlancar6160=Neraca::whereNot('saldo',0)->where('no_akun','6160')->get();
        $debit6160=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6160')->sum('nilai_debit');
        $kredit6160=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6160')->sum('nilai_kredit');
         // 6160
        // 6170
        $asetlancar6170=Neraca::whereNot('saldo',0)->where('no_akun','6170')->get();
        $debit6170=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6170')->sum('nilai_debit');
        $kredit6170=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6170')->sum('nilai_kredit');
         // 6170
        // 6180
        $asetlancar6180=Neraca::whereNot('saldo',0)->where('no_akun','6180')->get();
        $debit6180=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6180')->sum('nilai_debit');
        $kredit6180=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6180')->sum('nilai_kredit');
         // 6180
        // 6190
        $asetlancar6190=Neraca::whereNot('saldo',0)->where('no_akun','6190')->get();
        $debit6190=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6190')->sum('nilai_debit');
        $kredit6190=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6190')->sum('nilai_kredit');
         // 6190
        // 6200
        $asetlancar6200=Neraca::whereNot('saldo',0)->where('no_akun','6200')->get();
        $debit6200=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6200')->sum('nilai_debit');
        $kredit6200=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6200')->sum('nilai_kredit');
         // 6200
        // 6210
        $asetlancar6210=Neraca::whereNot('saldo',0)->where('no_akun','6210')->get();
        $debit6210=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6210')->sum('nilai_debit');
        $kredit6210=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6210')->sum('nilai_kredit');
         // 6210
        // 6220
        $asetlancar6220=Neraca::whereNot('saldo',0)->where('no_akun','6220')->get();
        $debit6220=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6220')->sum('nilai_debit');
        $kredit6220=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6220')->sum('nilai_kredit');
         // 6220
        // 6230
        $asetlancar6230=Neraca::whereNot('saldo',0)->where('no_akun','6230')->get();
        $debit6230=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6230')->sum('nilai_debit');
        $kredit6230=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6230')->sum('nilai_kredit');
         // 6230
        // 6240
        $asetlancar6240=Neraca::whereNot('saldo',0)->where('no_akun','6240')->get();
        $debit6240=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6240')->sum('nilai_debit');
        $kredit6240=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6240')->sum('nilai_kredit');
         // 6240
        // 6250
        $asetlancar6250=Neraca::whereNot('saldo',0)->where('no_akun','6250')->get();
        $debit6250=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6250')->sum('nilai_debit');
        $kredit6250=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6250')->sum('nilai_kredit');
         // 6250
        // 6260
        $asetlancar6260=Neraca::whereNot('saldo',0)->where('no_akun','6260')->get();
        $debit6260=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6260')->sum('nilai_debit');
        $kredit6260=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6260')->sum('nilai_kredit');
         // 6260
        // 6270
        $asetlancar6270=Neraca::whereNot('saldo',0)->where('no_akun','6270')->get();
        $debit6270=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6270')->sum('nilai_debit');
        $kredit6270=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6270')->sum('nilai_kredit');
         // 6270
        // 6280
        $asetlancar6280=Neraca::whereNot('saldo',0)->where('no_akun','6280')->get();
        $debit6280=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6280')->sum('nilai_debit');
        $kredit6280=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6280')->sum('nilai_kredit');
         // 6280
        // 6290
        $asetlancar6290=Neraca::whereNot('saldo',0)->where('no_akun','6290')->get();
        $debit6290=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6290')->sum('nilai_debit');
        $kredit6290=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6290')->sum('nilai_kredit');
         // 6290
        // 6300
        $asetlancar6300=Neraca::whereNot('saldo',0)->where('no_akun','6300')->get();
        $debit6300=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6300')->sum('nilai_debit');
        $kredit6300=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6300')->sum('nilai_kredit');
         // 6300
        // 6310
        $asetlancar6310=Neraca::whereNot('saldo',0)->where('no_akun','6310')->get();
        $debit6310=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6310')->sum('nilai_debit');
        $kredit6310=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6310')->sum('nilai_kredit');
         // 6310
        // 6320
        $asetlancar6320=Neraca::whereNot('saldo',0)->where('no_akun','6320')->get();
        $debit6320=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6320')->sum('nilai_debit');
        $kredit6320=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6320')->sum('nilai_kredit');
         // 6320
        // 6330
        $asetlancar6330=Neraca::whereNot('saldo',0)->where('no_akun','6330')->get();
        $debit6330=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6330')->sum('nilai_debit');
        $kredit6330=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6330')->sum('nilai_kredit');
         // 6330
        // 6340
        $asetlancar6340=Neraca::whereNot('saldo',0)->where('no_akun','6340')->get();
        $debit6340=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6340')->sum('nilai_debit');
        $kredit6340=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6340')->sum('nilai_kredit');
         // 6340
        // 6350
        $asetlancar6350=Neraca::whereNot('saldo',0)->where('no_akun','6350')->get();
        $debit6350=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6350')->sum('nilai_debit');
        $kredit6350=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6350')->sum('nilai_kredit');
         // 6350
        // 6360
        $asetlancar6360=Neraca::whereNot('saldo',0)->where('no_akun','6360')->get();
        $debit6360=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6360')->sum('nilai_debit');
        $kredit6360=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6360')->sum('nilai_kredit');
         // 6360
        // 6370
        $asetlancar6370=Neraca::whereNot('saldo',0)->where('no_akun','6370')->get();
        $debit6370=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6370')->sum('nilai_debit');
        $kredit6370=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6370')->sum('nilai_kredit');
         // 6370
        // 6380
        $asetlancar6380=Neraca::whereNot('saldo',0)->where('no_akun','6380')->get();
        $debit6380=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6380')->sum('nilai_debit');
        $kredit6380=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6380')->sum('nilai_kredit');
         // 6380
        // 6390
        $asetlancar6390=Neraca::whereNot('saldo',0)->where('no_akun','6390')->get();
        $debit6390=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6390')->sum('nilai_debit');
        $kredit6390=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6390')->sum('nilai_kredit');
         // 6390
        // 6400
        $asetlancar6400=Neraca::whereNot('saldo',0)->where('no_akun','6400')->get();
        $debit6400=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6400')->sum('nilai_debit');
        $kredit6400=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6400')->sum('nilai_kredit');
         // 6400
        // 6410
        $asetlancar6410=Neraca::whereNot('saldo',0)->where('no_akun','6410')->get();
        $debit6410=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6410')->sum('nilai_debit');
        $kredit6410=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6410')->sum('nilai_kredit');
         // 6410
        // 6420
        $asetlancar6420=Neraca::whereNot('saldo',0)->where('no_akun','6420')->get();
        $debit6420=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6420')->sum('nilai_debit');
        $kredit6420=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6420')->sum('nilai_kredit');
         // 6420
        // 6430
        $asetlancar6430=Neraca::whereNot('saldo',0)->where('no_akun','6430')->get();
        $debit6430=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6430')->sum('nilai_debit');
        $kredit6430=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6430')->sum('nilai_kredit');
         // 6430
        // 6440
        $asetlancar6440=Neraca::whereNot('saldo',0)->where('no_akun','6440')->get();
        $debit6440=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6440')->sum('nilai_debit');
        $kredit6440=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6440')->sum('nilai_kredit');
         // 6440
        // 6450
        $asetlancar6450=Neraca::whereNot('saldo',0)->where('no_akun','6450')->get();
        $debit6450=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6450')->sum('nilai_debit');
        $kredit6450=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6450')->sum('nilai_kredit');
         // 6450
        // 6460
        $asetlancar6460=Neraca::whereNot('saldo',0)->where('no_akun','6460')->get();
        $debit6460=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6460')->sum('nilai_debit');
        $kredit6460=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6460')->sum('nilai_kredit');
         // 6460
        // 6470
        $asetlancar6470=Neraca::whereNot('saldo',0)->where('no_akun','6470')->get();
        $debit6470=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6470')->sum('nilai_debit');
        $kredit6470=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6470')->sum('nilai_kredit');
         // 6470
        // 6480
        $asetlancar6480=Neraca::whereNot('saldo',0)->where('no_akun','6480')->get();
        $debit6480=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6480')->sum('nilai_debit');
        $kredit6480=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6480')->sum('nilai_kredit');
         // 6480
        // 6490
        $asetlancar6490=Neraca::whereNot('saldo',0)->where('no_akun','6490')->get();
        $debit6490=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6490')->sum('nilai_debit');
        $kredit6490=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6490')->sum('nilai_kredit');
         // 6490
        // 6500
        $asetlancar6500=Neraca::whereNot('saldo',0)->where('no_akun','6500')->get();
        $debit6500=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6500')->sum('nilai_debit');
        $kredit6500=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6500')->sum('nilai_kredit');
         // 6500
        // 6510
        $asetlancar6510=Neraca::whereNot('saldo',0)->where('no_akun','6510')->get();
        $debit6510=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6510')->sum('nilai_debit');
        $kredit6510=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6510')->sum('nilai_kredit');
         // 6510
        // 6520
        $asetlancar6520=Neraca::whereNot('saldo',0)->where('no_akun','6520')->get();
        $debit6520=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6520')->sum('nilai_debit');
        $kredit6520=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6520')->sum('nilai_kredit');
         // 6520
        // 6530
        $asetlancar6530=Neraca::whereNot('saldo',0)->where('no_akun','6530')->get();
        $debit6530=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6530')->sum('nilai_debit');
        $kredit6530=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6530')->sum('nilai_kredit');
         // 6530
        // 6540
        $asetlancar6540=Neraca::whereNot('saldo',0)->where('no_akun','6540')->get();
        $debit6540=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6540')->sum('nilai_debit');
        $kredit6540=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6540')->sum('nilai_kredit');
         // 6540
        // 6600
        $asetlancar6600=Neraca::whereNot('saldo',0)->where('no_akun','6600')->get();
        $debit6600=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','6600')->sum('nilai_debit');
        $kredit6600=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','6600')->sum('nilai_kredit');
         // 6600
        // 7100
        $asetlancar7100=Neraca::whereNot('saldo',0)->where('no_akun','7100')->get();
        $debit7100=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','7100')->sum('nilai_debit');
        $kredit7100=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','7100')->sum('nilai_kredit');
         // 7100
        // 7110
        $asetlancar7110=Neraca::whereNot('saldo',0)->where('no_akun','7110')->get();
        $debit7110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','7110')->sum('nilai_debit');
        $kredit7110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','7110')->sum('nilai_kredit');
         // 7110
        // 8100
        $asetlancar8100=Neraca::whereNot('saldo',0)->where('no_akun','8100')->get();
        $debit8100=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','8100')->sum('nilai_debit');
        $kredit8100=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','8100')->sum('nilai_kredit');
         // 8100
        // 8110
        $asetlancar8110=Neraca::whereNot('saldo',0)->where('no_akun','8110')->get();
        $debit8110=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','8110')->sum('nilai_debit');
        $kredit8110=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','8110')->sum('nilai_kredit');
         // 8110
        // 8120
        $asetlancar8120=Neraca::whereNot('saldo',0)->where('no_akun','8120')->get();
        $debit8120=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','8120')->sum('nilai_debit');
        $kredit8120=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','8120')->sum('nilai_kredit');
         // 8120

        $totalpenjualan=Neraca::where('attribute3','PENJUALAN BERSIH')->sum('saldo');
        $totalharpok=Neraca::where('attribute3','HARGA POKOK PENJUALAN')->sum('saldo');
        $totalbiayaoperasional=Neraca::where('no_akun','>','5600')->where('no_akun','<','7100')->sum('saldo');
        $jumlahpendapatanlain=Neraca::where('attribute3','PENDAPATAN LAIN-LAIN')->sum('saldo');
        $jumlahbebanlain=Neraca::where('no_akun','>','7110')->where('no_akun','<','8130')->sum('saldo');
        // dd($jumlahpendapatanlain);
        $labakotor = $totalpenjualan-$totalharpok;
        $labaoperasional = $labakotor-$totalbiayaoperasional;
        $totalpendapatandanbebanlain = $jumlahpendapatanlain-$jumlahbebanlain;
        $ikhtisarlabarugi = $labaoperasional+$totalpendapatandanbebanlain;

        $totaldebit=JurnalManual::where('attribute3',NULL)->where('no_akun_debit','>','4100')->sum('nilai_debit');
        $totalkredit=JurnalManual::where('attribute3',NULL)->where('no_akun_kredit','>','4100')->sum('nilai_kredit');

        return view('laporan.laporankeuanganlabarugifiskal',compact(
            'totaldebit','totalkredit',
            'totalpenjualan','totalharpok','totalbiayaoperasional','jumlahpendapatanlain',
            'jumlahbebanlain','labakotor','labaoperasional','totalpendapatandanbebanlain',
            'ikhtisarlabarugi',
            'asetlancar4100','debit4100','kredit4100',
            'asetlancar4101','debit4101','kredit4101',
            'asetlancar4102','debit4102','kredit4102',
            'asetlancar4103','debit4103','kredit4103',
            'asetlancar4104','debit4104','kredit4104',
            'asetlancar4200','debit4200','kredit4200',
            'asetlancar4201','debit4201','kredit4201',
            'asetlancar4202','debit4202','kredit4202',
            'asetlancar4203','debit4203','kredit4203',
            'asetlancar4300','debit4300','kredit4300',
            'asetlancar4310','debit4310','kredit4310',
            'asetlancar4320','debit4320','kredit4320',
            'asetlancar4330','debit4330','kredit4330',
            'asetlancar4340','debit4340','kredit4340',
            'asetlancar4350','debit4350','kredit4350',
            'asetlancar4105','debit4105','kredit4105',
            'asetlancar5100','debit5100','kredit5100',
            'asetlancar5110','debit5110','kredit5110',
            'asetlancar5120','debit5120','kredit5120',
            'asetlancar5200','debit5200','kredit5200',
            'asetlancar5210','debit5210','kredit5210',
            'asetlancar5211','debit5211','kredit5211',
            'asetlancar5212','debit5212','kredit5212',
            'asetlancar5213','debit5213','kredit5213',
            'asetlancar5250','debit5250','kredit5250',
            'asetlancar5260','debit5260','kredit5260',
            'asetlancar5300','debit5300','kredit5300',
            'asetlancar5400','debit5400','kredit5400',
            'asetlancar5410','debit5410','kredit5410',
            'asetlancar5420','debit5420','kredit5420',
            'asetlancar5430','debit5430','kredit5430',
            'asetlancar5440','debit5440','kredit5440',
            'asetlancar5450','debit5450','kredit5450',
            'asetlancar5460','debit5460','kredit5460',
            'asetlancar5470','debit5470','kredit5470',
            'asetlancar5480','debit5480','kredit5480',
            'asetlancar5600','debit5600','kredit5600',
            'asetlancar6100','debit6100','kredit6100',
            'asetlancar6110','debit6110','kredit6110',
            'asetlancar6120','debit6120','kredit6120',
            'asetlancar6130','debit6130','kredit6130',
            'asetlancar6140','debit6140','kredit6140',
            'asetlancar6150','debit6150','kredit6150',
            'asetlancar6160','debit6160','kredit6160',
            'asetlancar6170','debit6170','kredit6170',
            'asetlancar6180','debit6180','kredit6180',
            'asetlancar6190','debit6190','kredit6190',
            'asetlancar6200','debit6200','kredit6200',
            'asetlancar6210','debit6210','kredit6210',
            'asetlancar6220','debit6220','kredit6220',
            'asetlancar6230','debit6230','kredit6230',
            'asetlancar6240','debit6240','kredit6240',
            'asetlancar6250','debit6250','kredit6250',
            'asetlancar6260','debit6260','kredit6260',
            'asetlancar6270','debit6270','kredit6270',
            'asetlancar6280','debit6280','kredit6280',
            'asetlancar6290','debit6290','kredit6290',
            'asetlancar6300','debit6300','kredit6300',
            'asetlancar6310','debit6310','kredit6310',
            'asetlancar6320','debit6320','kredit6320',
            'asetlancar6330','debit6330','kredit6330',
            'asetlancar6340','debit6340','kredit6340',
            'asetlancar6350','debit6350','kredit6350',
            'asetlancar6360','debit6360','kredit6360',
            'asetlancar6370','debit6370','kredit6370',
            'asetlancar6380','debit6380','kredit6380',
            'asetlancar6390','debit6390','kredit6390',
            'asetlancar6400','debit6400','kredit6400',
            'asetlancar6410','debit6410','kredit6410',
            'asetlancar6420','debit6420','kredit6420',
            'asetlancar6430','debit6430','kredit6430',
            'asetlancar6440','debit6440','kredit6440',
            'asetlancar6450','debit6450','kredit6450',
            'asetlancar6460','debit6460','kredit6460',
            'asetlancar6470','debit6470','kredit6470',
            'asetlancar6480','debit6480','kredit6480',
            'asetlancar6490','debit6490','kredit6490',
            'asetlancar6500','debit6500','kredit6500',
            'asetlancar6510','debit6510','kredit6510',
            'asetlancar6520','debit6520','kredit6520',
            'asetlancar6530','debit6530','kredit6530',
            'asetlancar6540','debit6540','kredit6540',
            'asetlancar6600','debit6600','kredit6600',
            'asetlancar7100','debit7100','kredit7100',
            'asetlancar7110','debit7110','kredit7110',
            'asetlancar8100','debit8100','kredit8100',
            'asetlancar8110','debit8110','kredit8110',
            'asetlancar8120','debit8120','kredit8120',
        ));
    }
}
