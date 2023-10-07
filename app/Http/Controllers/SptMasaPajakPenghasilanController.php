<?php

namespace App\Http\Controllers;
use App\Models\SptMasa;
use App\Models\SptMasaLineB;
use App\Models\SptMasaLineC;
use App\Models\SptMasaA;
use App\Models\SptMasaB;
use App\Models\SptMasaI;
use App\Models\SptMasaILine;
use App\Models\SptMasaII;
use App\Models\SptMasaIILine;
use App\Models\SptMasaIII;
use App\Models\SptMasaIIILine;
use App\Models\SptMasaIV;
use App\Models\SptMasaIVLine;
use App\Models\SptMasaV;
use App\Models\SptMasaVI;
use App\Models\SptMasaVILine;
use App\Models\SptMasaVII;
use App\Models\SptMasaVIILine;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SptMasaPajakPenghasilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sptmasapajak.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sptmasapajak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $header_id =SptMasa::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        // 1721
        $data1721 = array(
            'formulir_id'=>$header_id,
            'npwp'=>$request->id_npwp_1721,
            'nama'=>$request->id_nama_1721,
            'ptkp'=>$request->besaran_ptkp,
            'alamat'=>$request->id_alamat_1721,
            'no_telp'=>$request->id_no_telp_1721,
            'jumlah_penerima_penghasilan_b'=>$request->total_jumlah_penerima1721,
            'jumlah_penghasilan_bruto_b'=>$request->total_jumlah_bruto1721,
            'jumlah_pajak_dipotong_b'=>$request->total_jumlah_pajak1721,
            'pokok_pajak'=>$request->pokokpajak_1721,
            'masa_pajak_bulan'=>$request->masapajak,
            'masa_pajak_tahun'=>$request->tahun_pajak,
            'masa_pajak_pokok'=>$request->kelebihanpenyetor_1721,
            'jumlah_objekpajak'=>$request->jumlah_1721,
            'kurang_lebih_setor'=>$request->kuranglebihsetor_1721,
            'spt_dibetulkan'=>$request->sptdibetulkan_1721,
            'spt_pembetulan'=>$request->sptpembetulan_1721,
            'kompensasi'=>$request->kompensasi_1721,
            'npwp_pemotong'=>$request->npwppemotong_1721,
            'jumlah_penerima_penghasilan_c'=>$request->jumlahpenerimapenghasilan_c,
            'jumlah_penghasilan_bruto_c'=>$request->jumlahpenghasilanbruot_c,
            'jumlah_pajak_dipotong_c'=>$request->jumlahpajakdipotong_c,
            'lembar_formulir_1721I'=>$request->satumasapajak_1721,
            'lembar_formulir_1721IB'=>$request->satutahunpajak_1721,
            'lembar_formulir_1721II'=>$request->formulirII_1721,
            'lembar_formulir_1721III'=>$request->formulirIII_1721,
            'lembar_formulir_1721IV'=>$request->formulirIV_1721,
            'lembar_formulir_1721V'=>$request->formulirV_1721,
            'surat_setoran_pajak'=>$request->setoranpajak_1721,
            'surat_kuasa_khusus'=>$request->suratkuasakhusus_1721,
            'pernyataan_ttd'=>$request->masapajakttd_1721,
            'npwp_ttd'=>$request->npwpttd_1721,
            'nama_ttd'=>$request->namattd_1721,
            'tanggal_ttd'=>$request->tglttd_1721,
            'tempat_ttd'=>$request->tempatttd_1721,
            'attribute1'=>Auth::user()->id,
        );
        dd($data1721);
        $spt=SptMasa::create($data1721);

        // 1721
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
}
