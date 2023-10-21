<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SptPpn;
use App\Models\SptPpnLinea1;
use App\Models\SptPpnLinea2;
use App\Models\SptPpnLineb1;
use App\Models\SptPpnLineb2;
use App\Models\SptPpnLineb3;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SptPpnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sptPPN.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sptPPN.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $header_id =SptPpn::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        $data = array(
            'formulir_id'=>$header_id,
            'nama_ptkp_1111'=>$request->nama_pkp_1111,
            'alamat_1111'=>$request->alamat_1111,
            'no_telp_1111'=>$request->no_telp_1111,
            'no_hp_1111'=>$request->no_hp_1111,
            'no_klu_1111'=>$request->klu_1111,
            'no_npwp_1111'=>$request->npwp_1111,
            'start_masa_1111'=>$request->start_masa_1111,
            'end_masa_1111'=>$request->end_masa_1111,
            'start_tahun_buku_1111'=>$request->start_thnbuku_1111,
            'end_tahun_buku_1111'=>$request->end_thnbuku_1111,
            'pembetulan_1111'=>$request->pembetulan_1111,
            'i_a_1_dpp_1111'=>$request->ekspor_1111,
            'i_a_2_dpp_1111'=>$request->a2_dpp_1111,
            'i_a_2_ppn_1111'=>$request->a2_ppn_1111,
            'i_a_3_dpp_1111'=>$request->a3_dpp_1111,
            'i_a_3_ppn_1111'=>$request->a3_ppn_1111,
            'i_a_4_dpp_1111'=>$request->a4_dpp_1111,
            'i_a_4_ppn_1111'=>$request->a4_ppn_1111,
            'i_a_5_dpp_1111'=>$request->a5_dpp_1111,
            'i_a_5_ppn_1111'=>$request->a5_ppn_1111,
            'i_a_jumlah_dpp_1111'=>$request->a_jumlah_dpp_1111,
            'i_a_jumlah_ppn_1111'=>$request->a_jumlah_ppn_1111,
            'i_b_dpp_1111'=>$request->b_tidak_terutang_dpp_1111,
            'i_c_dpp_1111'=>$request->c_jumlahpenyerahan_dpp_1111,
            'ii_a_ppn_1111'=>$request->dua_a_pajak_keluaran_ppn_1111,
            'ii_b_ppn_1111'=>$request->dua_b_pajak_keluaran_ppn_1111,
            'ii_c_ppn_1111'=>$request->dua_c_pajak_keluaran_ppn_1111,
            'ii_d_ppn_1111'=>$request->dua_d_pajak_keluaran_ppn_1111,
            'ii_e_ppn_1111'=>$request->dua_e_pajak_keluaran_ppn_1111,
            'ii_f_ppn_1111'=>$request->dua_f_pajak_keluaran_ppn_1111,
            'ii_g_start_1111'=>$request->dua_g_pajak_keluaran_ppn_1111,
            'ii_g_ntpp_1111'=>$request->dua_g_ntpp_pajak_keluaran_ppn_1111,
            'ii_h_ppn_lebih_1111'=>$request->dua_h_ppn_lebih_1111,
            'ii_h_oleh_1111'=>$request->dua_h_oleh_1111,
            'ii_h_diminta_untuk_1111'=>$request->dua_h_diminta_untuk_1111,
            'ii_h_diminta_untuk_date_1111'=>$request->dua_h_diminta_untuk_date_1111,
            'ii_h_restitusi_1111'=>$request->dua_h_khusus_1111,
            'ii_h_prosedur_1111'=>$request->dua_h_pasal_1111,
            'iii_a_ppn_1111'=>$request->tiga_a_ppn_terutang_1111,
            'iii_b_ppn_1111'=>$request->tiga_b_ppn_terutang_1111,
            'iii_c_date_1111'=>$request->tiga_c_date_ppn_terutang_1111,
            'iii_c_ntpp_1111'=>$request->tiga_c_ppn_terutang_1111,
            'iv_a_ppn_1111'=>$request->empat_a_ppn_terutang_1111,
            'iv_b_date_1111'=>$request->empat_b_date_ppn_terutang_1111,
            'iv_b_ntpn_1111'=>$request->empat_b_ntpp_ppn_terutang_1111,
            'v_a_ppn_1111'=>$request->lima_a_ppn_terutang_1111,
            'v_b_ppn_1111'=>$request->lima_b_ppn_terutang_1111,
            'v_c_ppn_1111'=>$request->lima_c_ppn_terutang_1111,
            'v_d_ppn_1111'=>$request->lima_d_ppn_terutang_1111,
            'v_e_ppn_1111'=>$request->lima_e_ppn_terutang_1111,
            'v_f_date_1111'=>$request->lima_f_date_1111,
            'v_f_ntpp_1111'=>$request->lima_f_ntpp_1111,
            'vi_formulir_1111'=>$request->formulir_1111,
            'vi_lembar_1111'=>$request->lima_formulir_1111,
            'vi_tempat_1111'=>$request->tempat_1111,
            'vi_penandatangan_1111'=>$request->ttd_1111,
            'vi_nama_jelas_1111'=>$request->namattd_1111,
            'vi_jabatan_1111'=>$request->jabatanttd_1111,
            'nama_pkp_1111_AB'=>$request->nama_pkp_1111_AB,
            'npwp_1111_AB'=>$request->npwp_1111_AB,
            'start_masa_1111_AB'=>$request->masa_start_1111_AB,
            'end_masa_1111_AB'=>$request->masa_end_1111_AB,
            'pembetulan_1111_AB'=>$request->pembetulan_1111_AB,
            'i_a_dpp_1111_AB'=>$request->ekspor_bkp_1111_AB,
            'i_b_1_dpp_1111_AB'=>$request->pdn_dpp_1111_AB,
            'i_b_1_ppn_1111_AB'=>$request->pdn_ppn_1111_AB,
            'i_b_1_ppnbm_1111_AB'=>$request->pdn_ppnbm_1111_AB,
            'i_b_2_dpp_1111_AB'=>$request->digunggung_dpp_1111_AB,
            'i_b_2_ppn_1111_AB'=>$request->digunggung_ppn_1111_AB,
            'i_b_2_ppnbm_1111_AB'=>$request->digunggung_ppnbm_1111_AB,
            'i_c_1_dpp_1111_AB'=>$request->dipungut_dpp_1111_AB,
            'i_c_1_ppn_1111_AB'=>$request->dipungut_ppn_1111_AB,
            'i_c_1_ppnbm_1111_AB'=>$request->dipungut_ppnbm_1111_AB,
            'i_c_2_dpp_1111_AB'=>$request->pemungut_dpp_1111_AB,
            'i_c_2_ppn_1111_AB'=>$request->pemungut_ppn_1111_AB,
            'i_c_2_ppnbm_1111_AB'=>$request->pemungut_ppnbm_1111_AB,
            'i_c_3_dpp_1111_AB'=>$request->tidakdipungut_dpp_1111_AB,
            'i_c_3_ppn_1111_AB'=>$request->tidakdipungut_ppn_1111_AB,
            'i_c_3_ppnbm_1111_AB'=>$request->tidakdipungut_ppnbm_1111_AB,
            'i_c_4_dpp_1111_AB'=>$request->bebaspajak_dpp_1111_AB,
            'i_c_4_ppn_1111_AB'=>$request->bebaspajak_ppn_1111_AB,
            'i_c_4_ppnbm_1111_AB'=>$request->bebaspajak_ppnbm_1111_AB,
            'ii_a_dpp_1111_AB'=>$request->impor_bkp_1111_AB,
            'ii_a_ppn_1111_AB'=>$request->impor_bkp_ppn_1111_AB,
            'ii_a_ppnbm_1111_AB'=>$request->impor_bkp_ppnbm_1111_AB,
            'ii_b_dpp_1111_AB'=>$request->perolehan_bkp_1111_AB,
            'ii_b_ppn_1111_AB'=>$request->perolehan_bkp_ppn_1111_AB,
            'ii_b_ppnbm_1111_AB'=>$request->perolehan_bkp_ppnbm_1111_AB,
            'ii_c_dpp_1111_AB'=>$request->impor_perolehan_bkp_1111_AB,
            'ii_c_ppn_1111_AB'=>$request->impor_perolehan_bkp_ppn_1111_AB,
            'ii_c_ppnbm_1111_AB'=>$request->impor_perolehan_bkp_ppnbm_1111_AB,
            'ii_d_dpp_1111_AB'=>$request->jumlah_perolehan_1111_AB,
            'ii_d_ppn_1111_AB'=>$request->jumlah_perolehan_ppn_1111_AB,
            'ii_d_ppnbm_1111_AB'=>$request->jumlah_perolehan_ppnbm_1111_AB,
            'iii_a_pajak_masuk_1111_AB'=>$request->jumlah_pajakmasukan_1111_AB,
            'iii_b_pajaksebelumnya_1111_AB'=>$request->ppn_masa_pajak_sebelumnya_1111_AB,
            'iii_b_spt_ppn_date_1111_AB'=>$request->spt_ppn_date_1111_AB,
            'iii_b_spt_ppn_1111_AB'=>$request->spt_ppn_1111_AB,
            'iii_b_pajak_masuk_1111_AB'=>$request->pajak_masukan_1111_AB,
            'iii_b_jumlah_1111_AB'=>$request->jumlah_pajak_masukan_1111_AB,
            'iii_b_jumlah_pajak_masuk_1111_AB'=>$request->totaljumlah_pajak_masukan_1111_AB,
            'nama_pkp_1111_A1'=>$request->nama_pkp_1111_A1,
            'npwp_1111_A1'=>$request->npwp_1111_A1,
            'start_masa_1111_A1'=>$request->masa_start_1111_A1,
            'end_masa_1111_A1'=>$request->masa_end_1111_A1,
            'pembetul_1111_A1'=>$request->pembetulan_1111_A1,
            'jumlah_dpp_1111_A1'=>$request->total_dpp_1111A1,
            'nama_pkp_1111_A2'=>$request->nama_pkp_1111_A2,
            'npwp_1111_A2'=>$request->npwp_1111_A2,
            'start_masa_1111_A2'=>$request->masa_start_1111_A2,
            'end_masa_1111_A2'=>$request->masa_end_1111_A2,
            'pembetul_1111_A2'=>$request->pembetulan_1111_A2,
            'jumlah_dpp_1111_A2'=>$request->total_dpp_1111A2,
            'jumlah_ppn_1111_A2'=>$request->total_ppn_1111A2,
            'jumlah_ppnbm_1111_A2'=>$request->total_ppnbm_1111A2,
            'nama_pkp_1111_B1'=>$request->nama_pkp_1111_b1,
            'npwp_1111_B1'=>$request->npwp_1111_b1,
            'start_masa_1111_B1'=>$request->masa_start_1111_b1,
            'end_masa_1111_B1'=>$request->masa_end_1111_b1,
            'pembetul_1111_B1'=>$request->pembetulan_1111_b1,
            'jumlah_dpp_1111_B1'=>$request->total_dpp_1111b1,
            'jumlah_ppn_1111_B1'=>$request->total_ppn_1111b1,
            'jumlah_ppnbm_1111_B1'=>$request->total_ppnbm_1111b1,
            'nama_pkp_1111_B2'=>$request->nama_pkp_1111_b2,
            'npwp_1111_B2'=>$request->npwp_1111_b2,
            'start_masa_1111_B2'=>$request->masa_start_1111_b2,
            'end_masa_1111_B2'=>$request->masa_end_1111_b2,
            'pembetul_1111_B2'=>$request->pembetulan_1111_b2,
            'jumlah_dpp_1111_B2'=>$request->total_dpp_1111B2,
            'jumlah_ppn_1111_B2'=>$request->total_ppn_1111B2,
            'jumlah_ppnbm_1111_B2'=>$request->total_ppnbm_1111B2,
            'nama_pkp_1111_B3'=>$request->nama_pkp_1111_b3,
            'npwp_1111_B3'=>$request->npwp_1111_b3,
            'start_masa_1111_B3'=>$request->masa_start_1111_b3,
            'end_masa_1111_B3'=>$request->masa_end_1111_b3,
            'pembetul_1111_B3'=>$request->pembetulan_1111_b3,
            'jumlah_dpp_1111_B3'=>$request->total_dpp_1111B3,
            'jumlah_ppn_1111_B3'=>$request->total_ppn_1111B3,
            'jumlah_ppnbm_1111_B3'=>$request->total_ppnbm_1111B3,
            'attribute_1'=>Auth::user()->id,
        );
        // dd($data);

        $bkp_1111A1 = $request->input('pajak_nama_pembeli_bkp_1111A1');
        foreach ($bkp_1111A1 as $key => $row) {
            $data1111linesA1 = array(
                'formulir_id' => $header_id,
                'nama_pembeli_bkp' => $request->pajak_nama_pembeli_bkp_1111A1[$key],
                'no_dok' => $request->pajak_no_doc_1111A1[$key],
                'tgl_dok' => $request->pajak_tanggal_1111A1[$key],
                'dpp' => $request->pajak_dpp_1111A1[$key],
                'keterangan' => $request->pajak_keterangan_1111A1[$key],
            );
        // dd($data1111linesA1);
        SptPpnLinea1::create($data1111linesA1);
        }

        $bkp_1111A2 = $request->input('pajak_nama_penjual_bkp_1111A2');
        foreach ($bkp_1111A2 as $key => $row) {
            $data1111linesA2 = array(
                'formulir_id' => $header_id,
                'nama_penjual_bkp' => $request->pajak_nama_penjual_bkp_1111A2[$key],
                'npwp' => $request->pajak_no_npwp_1111A2[$key],
                'kodeseri' => $request->pajak_kode_dan_no_seri_1111A2[$key],
                'tgl' => $request->pajak_tanggal_1111A2[$key],
                'dpp' => $request->pajak_dpp_1111A2[$key],
                'ppn' => $request->pajak_ppn_1111A2[$key],
                'ppnbm' => $request->pajak_ppnBM_1111A2[$key],
                'kodefaktur' => $request->pajak_no_seri_1111A2[$key],
            );
        // dd($data1111linesA2);
        SptPpnLinea2::create($data1111linesA2);
        }

        $bkp_1111B1 = $request->input('pajak_nama_penjual_bkp_1111b1');
        foreach ($bkp_1111B1 as $key => $row) {
            $data1111linesB1 = array(
                'formulir_id' => $header_id,
                'nama_penjual_bkp' => $request->pajak_nama_penjual_bkp_1111b1[$key],
                'no_dok' => $request->pajak_no_doc_1111b1[$key],
                'tgl_dok' => $request->pajak_tanggal_1111b1[$key],
                'dpp' => $request->pajak_dpp_1111b1[$key],
                'ppn' => $request->pajak_ppn_1111b1[$key],
                'ppnbm' => $request->pajak_ppnBM_1111b1[$key],
                'keterangan' => $request->keterangan_1111b1[$key],
            );
        // dd($data1111linesB1);
        SptPpnLineB1::create($data1111linesB1);
        }
        $bkp_1111B2 = $request->input('pajak_nama_penjual_bkp_1111B2');
        foreach ($bkp_1111B2 as $key => $row) {
            $data1111linesB2 = array(
                'formulir_id' => $header_id,
                'nama_penjual_bkp' => $request->pajak_nama_penjual_bkp_1111B2[$key],
                'npwp' => $request->pajak_no_npwp_1111B2[$key],
                'noseri' => $request->pajak_kode_dan_no_seri_1111B2[$key],
                'tgl' => $request->pajak_tanggal_1111B2[$key],
                'dpp' => $request->pajak_dpp_1111B2[$key],
                'ppn' => $request->pajak_ppn_1111B2[$key],
                'ppnbm' => $request->pajak_ppnBM_1111B2[$key],
                'kodeseri' => $request->pajak_no_seri_1111B2[$key],
            );
        // dd($data1111linesB2);
        SptPpnLineB2::create($data1111linesB2);
        }
        $bkp_1111B3 = $request->input('pajak_nama_penjual_bkp_1111B3');
        foreach ($bkp_1111B3 as $key => $row) {
            $data1111linesB3 = array(
                'formulir_id' => $header_id,
                'nama_penjual_bkp' => $request->pajak_nama_penjual_bkp_1111B3[$key],
                'npwp' => $request->pajak_no_npwp_1111B3[$key],
                'seri' => $request->pajak_kode_dan_no_seri_1111B3[$key],
                'tgl' => $request->pajak_tanggal_1111B3[$key],
                'dpp' => $request->pajak_dpp_1111B3[$key],
                'ppn' => $request->pajak_ppn_1111B3[$key],
                'ppnbm' => $request->pajak_ppnBM_1111B3[$key],
                'kodeseri' => $request->pajak_no_seri_1111B3[$key],
            );
        // dd($data1111linesB3);
        SptPpnLineB3::create($data1111linesB3);
        }
        SptPpn::create($data);
        $a= \DB::commit();
        return redirect()->route('sptPPN');
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
        if(Auth::user()->status==1){
            $spt=SptPpn::where('formulir_id',$id)->get()->first();
        }else{
            $spt=SptPpn::where('attribute_1',$iduser)->where('formulir_id',$id)->get()->first();
        }
        if($spt==null){
            return back();
        }
        return view('sptPPN.show',compact(
            'spt'
        ));
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
        $delete=SptPpn::find($id);
        $delete->delete();
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
