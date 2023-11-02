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
use App\Models\MasaBulan;
use App\Models\PenerimaHasil;
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
        $penerimahasilb=PenerimaHasil::where('id','<',16)->get();
        $penerimahasilc=PenerimaHasil::where('id','>',15)->get();
        // dd($penerimahasilc);
        return view('sptmasapajak.create',compact('penerimahasilb','penerimahasilc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $kredit = preg_replace('/[^0-9]/','',$request->input('akunkredit')); 

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
            'email'=>$request->id_email_1721,
            'alamat_objekpajak'=>NULL,
            'jumlah_penerima_penghasilan_b'=>preg_replace('/[^0-9]/','',$request->total_jumlah_penerima1721),
            'jumlah_penghasilan_bruto_b'=>preg_replace('/[^0-9]/','',$request->total_jumlah_bruto1721),
            'jumlah_pajak_dipotong_b'=>preg_replace('/[^0-9]/','',$request->total_jumlah_pajak1721),
            'pokok_pajak'=>preg_replace('/[^0-9]/','',$request->pokokpajak_1721),
            'masa_pajak_bulan'=>$request->masapajak,
            'masa_pajak_tahun'=>$request->tahun_pajak,
            'masa_pajak_pokok'=>preg_replace('/[^0-9]/','',$request->kelebihanpenyetor_1721),
            'jumlah_objekpajak'=>preg_replace('/[^0-9]/','',$request->jumlah_1721),
            'kurang_lebih_setor'=>preg_replace('/[^0-9]/','',$request->kuranglebihsetor_1721),
            'spt_dibetulkan'=>preg_replace('/[^0-9]/','',$request->sptdibetulkan_1721),
            'spt_pembetulan'=>preg_replace('/[^0-9]/','',$request->sptpembetulan_1721),
            'kompensasi'=>$request->kompensasi_1721,
            'npwp_pemotong'=>$request->npwppemotong_1721,
            'jumlah_penerima_penghasilan_c'=>preg_replace('/[^0-9]/','',$request->jumlahpenerimapenghasilan_c),
            'jumlah_penghasilan_bruto_c'=>preg_replace('/[^0-9]/','',$request->jumlahpenghasilanbruot_c),
            'jumlah_pajak_dipotong_c'=>preg_replace('/[^0-9]/','',$request->jumlahpajakdipotong_c),
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
        // dd($data1721);

        $objek_penerima_1721 = $request->input('objek_penerima');
        // dd(preg_replace('/[^0-9]/','',$objek_penerima_1721));
        $objek_penerimac_1721 = $request->input('objek_penerima_c');
        foreach ($objek_penerima_1721 as $key => $row) {
            $data1721lines = array(
                'formulir_id' => $header_id,
                'penerima_penghasilan' => $objek_penerima_1721[$key],
                'kode_objek' => preg_replace('/[^0-9]/','',$objek_penerima_1721[$key]),
                'jumlah_penerima_penghasilan' => preg_replace('/[^0-9]/','',$request->objek_jumlahpenerima[$key]),
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->objek_jumlahpenghasilan[$key]),
                'jumlah_pajak_dipotong' => preg_replace('/[^0-9]/','',$request->objek_jumlahpajak[$key]),
            );
        // dd($data1721lines);
        SptMasaLineB::create($data1721lines);
        }
        foreach ($objek_penerimac_1721 as $key => $row) {
            $data1721lines = array(
                'formulir_id' => $header_id,
                'penerima_penghasilan' => $objek_penerimac_1721[$key],
                'kode_objek' => preg_replace('/[^0-9]/','',$objek_penerimac_1721[$key]),
                'jumlah_penerima_penghasilan' => preg_replace('/[^0-9]/','',$request->objek_jumlahpenerima_c[$key]),
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->objek_jumlahpenghasilan_c[$key]),
                'jumlah_pajak_dipotong' => preg_replace('/[^0-9]/','',$request->objek_jumlahpajak_c[$key]),
            );
        // dd($data1721lines);
        SptMasaLineC::create($data1721lines);
        }
        $spt=SptMasa::create($data1721);
        // 1721

        // 1721I
        $data1721I = array(
            'formulir_id'=>$header_id,
            'masa_pajak'=>$request->masapajak_1721,
            'daftar_potongan'=>$request->daftarpotongan_1721,
            'npwp_pemotong'=>$request->npwppemotong_1721_formulirI,
            'jumlah_penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->jumlahbruto_1721_formulirI),
            'jumlah_pph_dipotong'=>preg_replace('/[^0-9]/','',$request->potonganpph),
            'jht_penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->tht_1721_formulirI),
            'jumlah_total'=>preg_replace('/[^0-9]/','',$request->totaljumlah_1721_formulirI),
            'attribute1'=>Auth::user()->id,
        );
        $pgt_npwp_1721 = $request->input('pgt_npwp_1721');
        foreach ($pgt_npwp_1721 as $key => $row) {
            $data1721Ilines = array(
                'formulir_id' => $header_id,
                'npwp_pegawai' => $pgt_npwp_1721[$key],
                'nama_pegawai' => $request->pgt_namapegawai_1721[$key],
                'no_bukti_pemotongan' => $request->pgt_nomor_1721[$key],
                'tgl_bukti_pemotongan' => $request->pgt_tglbukti_1721[$key],
                'kode_objek_pajak' => $request->pgt_kodeobjek_1721[$key],
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->pgt_jumlahpenghasilanbruto_1721[$key]),
                'pph_dipotong' => preg_replace('/[^0-9]/','',$request->pgt_pphdipotong_1721[$key]),
                'masa_perolehan_penghasilan' => preg_replace('/[^0-9]/','',$request->pgt_masaperolehan_1721[$key]),
                'kode_negara' => $request->pgt_kodenegara_1721[$key],
            );
        // dd($data1721Ilines);
        SptMasaILine::create($data1721Ilines);
        }
        // DD($data1721I);
        SptMasaI::create($data1721I);
        // 1721I

        // 1721II
        $data1721II = array(
            'formulir_id'=>$header_id,
            'masa_pajak'=>$request->masapajak_formulirII_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirII_1721,
            'jumlah_penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->jumlahbruto_1721II),
            'pph_yang_dipotong'=>preg_replace('/[^0-9]/','',$request->potonganpph_1721II),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721II);
        SptMasaII::create($data1721II);

        $pgt_npwp_1721_formulirII = $request->input('pgt_npwp_1721_formulirII');
        foreach ($pgt_npwp_1721_formulirII as $key => $row) {
            $data1721IIlines = array(
                'formulir_id' => $header_id,
                'npwp_pemotong' => $pgt_npwp_1721_formulirII[$key],
                'nama_pemotong' => $request->pgt_namapegawai_1721_formulirII[$key],
                'no_bukti_pemotong' => $request->pgt_nomor_1721_formulirII[$key],
                'tgl_bukti_pemotong' => $request->pgt_tglbukti_1721_formulirII[$key],
                'kode_objek_pajak' => $request->pgt_kodeobjek_1721_formulirII[$key],
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->pgt_jumlahpenghasilanbruto_1721_formulirII[$key]),
                'jumlah_pph_yang_dipotong' => preg_replace('/[^0-9]/','',$request->pgt_pphdipotong_1721_formulirII[$key]),
                'kode_negara' => $request->pgt_kodenegara_1721_formulirII[$key],
            );
        // dd($data1721IIlines);
        SptMasaIILine::create($data1721IIlines);
        }
        // 1721II
        // 1721III
        $data1721III = array(
            'formulir_id'=>$header_id,
            'masa_pajak'=>$request->masapajak_formulirIII_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirIII_1721,
            'jumlah_penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->jumlahbruto_1721III),
            'pph_yang_dipotong'=>preg_replace('/[^0-9]/','',$request->potonganpph_1721III),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721III);
        SptMasaIII::create($data1721III);

        $pgt_npwp_1721_formulirIII = $request->input('pgt_npwp_1721_formulirIII');
        foreach ($pgt_npwp_1721_formulirIII as $key => $row) {
            $data1721IIIlines = array(
                'formulir_id' => $header_id,
                'nomor_npwp_pemotong' => $pgt_npwp_1721_formulirIII[$key],
                'nama_npwp_pemotong' => $request->pgt_namapegawai_1721_formulirIII[$key],
                'nomor_bukti_pemotong' => $request->pgt_nomor_1721_formulirIII[$key],
                'tgl_bukti_pemotong' => $request->pgt_tglbukti_1721_formulirIII[$key],
                'kode_objek_pajak' => $request->pgt_kodeobjek_1721_formulirIII[$key],
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->pgt_jumlahpenghasilanbruto_1721_formulirIII[$key]),
                'pph_yang_dipotong' => preg_replace('/[^0-9]/','',$request->pgt_pphdipotong_1721_formulirIII[$key]),
            );
        // dd($data1721IIIlines);
        SptMasaIIILine::create($data1721IIIlines);
        }
        // 1721III
        // 1721IV
        $data1721IV = array(
            'formulir_id'=>$header_id,
            'masa_pajak'=>$request->masapajak_formulirIV_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirIV_1721,
            'jumlah_pph_disetor'=>preg_replace('/[^0-9]/','',$request->totalpph_1721_iv),
            'pph_yang_dipotong'=>NULL,
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721IV);
        SptMasaIV::create($data1721IV);
        $ssp_kapIV = $request->input('ssp_kapIV');
        foreach ($ssp_kapIV as $key => $row) {
            $data1721IVlines = array(
                'formulir_id' => $header_id,
                'kode_akun_pajak' => $ssp_kapIV[$key],
                'kode_jenis_setoran' => $request->ssp_kjsIV[$key],
                'tgl_bukti' => $request->ssp_tglIV[$key],
                'nomo_bukti' => $request->ssp_ntpnIV[$key],
                'jumlah_pph_setor' => preg_replace('/[^0-9]/','',$request->ssp_pphIV[$key]),
                'keterangan' => $request->ssp_ketIV[$key],
            );
        // dd($data1721IVlines);
        SptMasaIVLine::create($data1721IVlines);
        }
        // 1721IV
        
        // 1721V
        $data1721V = array(
            'formulir_id'=>$header_id,
            'masa_pajak'=>$request->masapajak_formulirV_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirV_1721,
            'gaji'=>preg_replace('/[^0-9]/','',$request->gaji_formulirV_1721),
            'biaya_transport'=>preg_replace('/[^0-9]/','',$request->biayatransportasi_formulirV_1721),
            'biaya_penyusutan'=>preg_replace('/[^0-9]/','',$request->biayaPenyusutan_formulirV_1721),
            'biaya_sewa'=>preg_replace('/[^0-9]/','',$request->biayaSewa_formulirV_1721),
            'biaya_bunga_pinjaman'=>preg_replace('/[^0-9]/','',$request->biayaBungaPinjam_formulirV_1721),
            'biaya_jasa'=>preg_replace('/[^0-9]/','',$request->biayaSehubunganDenganJasa_formulirV_1721),
            'biaya_piutang'=>preg_replace('/[^0-9]/','',$request->biayaPiutangTakTertagih_formulirV_1721),
            'biaya_royalti'=>preg_replace('/[^0-9]/','',$request->biayaRoyalti_formulirV_1721),
            'biaya_pemasaran'=>preg_replace('/[^0-9]/','',$request->biayaPemasaran_formulirV_1721),
            'biaya_lain'=>preg_replace('/[^0-9]/','',$request->biayaLain_formulirV_1721),
            'jumlah'=>preg_replace('/[^0-9]/','',$request->jumlah_formulirV_1721),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721V);
        SptMasaV::create($data1721V);
        // 1721V
        // 1721VI
        $data1721VI = array(
            'formulir_id'=>$header_id,
            'nomor'=>$request->nomor_formulirVI_1721,
            'npwp_identitas'=>$request->npwp_formulirVI_1721,
            'nik_identitas'=>$request->nik_formulirVI_1721,
            'nama_identitas'=>$request->nama_formulirVI_1721,
            'alamat_identitas'=>$request->alamat_formulirVI_1721,
            'wajib_pajak_identitas'=>$request->wajibpajak_formulirVI_1721,
            'kode_negara'=>$request->kodeNegara_formulirVI_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirVI_1721,
            'nama_pemotong'=>$request->namapemotong_formulirVI_1721,
            'tgl_pemotong'=>$request->ttdpemotong_formulirVI_1721,
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721VI);
        SptMasaVI::create($data1721VI);

        $pph_KOPVI = $request->input('pph_KOPVI');
        foreach ($pph_KOPVI as $key => $row) {
            $data1721VIlines = array(
                'formulir_id' => $header_id,
                'kode_objek_pajak' => $pph_KOPVI[$key],
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->pph_JPBVI[$key]),
                'dasar_pengenaan_pajak' => preg_replace('/[^0-9]/','',$request->pph_DPPVI[$key]),
                'tarif' => preg_replace('/[^0-9]/','',$request->pph_TLTVI[$key]),
                'potongan' => preg_replace('/[^0-9]/','',$request->pph_tarifVI[$key]),
                'potongan_pph' => preg_replace('/[^0-9]/','',$request->pph_potongVI[$key]),
            );
        // dd($data1721VIlines);
        SptMasaVILine::create($data1721VIlines);
        }
        // 1721VI
        // 1721VII
        $data1721VII = array(
            'formulir_id'=>$header_id,
            'nomor'=>$request->nomor_formulirVII_1721,
            'npwp_identitas'=>$request->npwp_formulirVII_1721,
            'nik_identitas'=>$request->nik_formulirVII_1721,
            'nama_identitas'=>$request->nama_formulirVII_1721,
            'alamat_identitas'=>$request->alamat_formulirVII_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirVII_1721,
            'nama_pemotong'=>$request->namapemotong_formulirVII_1721,
            'tgl_pemotong'=>$request->tglpemotong_formulirVII_1721,
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721VII);
        SptMasaVII::create($data1721VII);

        $pph_kop_formulir_Vii = $request->input('pph_kop_formulir_Vii');
        foreach ($pph_kop_formulir_Vii as $key => $row) {
            $data1721VIIlines = array(
                'formulir_id' => $header_id,
                'kode_objek_pajak' => $pph_kop_formulir_Vii[$key],
                'jumlah_penghasilan_bruto' => preg_replace('/[^0-9]/','',$request->pph_jpb_formulir_Vii[$key]),
                'tarif' => preg_replace('/[^0-9]/','',$request->pph_tp_formulir_Vii[$key]),
                'pph' => preg_replace('/[^0-9]/','',$request->pph_pph_formulir_Vii[$key]),
            );
        // dd($data1721VIIlines);
        SptMasaVIILine::create($data1721VIIlines);
        }
        // 1721VII

        // 1721a
        $data1721A = array(
            'formulir_id'=>$header_id,
            'nomor'=>$request->nomor_formulirA1_1721,
            'masa_perolehan'=>$request->masaperolehan_formulirA1_1721,
            'npwp_pemotong'=>$request->npwppemotong_formulirA1_1721,
            'nama_pemotong'=>$request->namapemotong_formulirA1_1721,
            'npwp_identitas'=>$request->npwppenerima_formulirA1_1721,
            'nik_identitas'=>$request->nikpenerima_formulirA1_1721,
            'nama_identitas'=>$request->namapenerima_formulirA1_1721,
            'alamat_identitas'=>$request->alamatpenerima_formulirA1_1721,
            'jenis_kelamin_identitas'=>$request->jenisKelaminPenerima_formulirA1_1721,
            'status_pernikahan'=>$request->statuspernikahanPenerima_formulirA1_1721,
            'status_tanggungan'=>$request->statuspenerima_formulirA1_1721,
            'nama_jabatan'=>$request->namaJabatan_formulirA1_1721,
            'karyawan'=>$request->karyawanAsing_formulirA1_1721,
            'kode_negara'=>$request->kodeNegara_formulirA1_1721,
            'gaji_rincian'=>preg_replace('/[^0-9]/','',$request->gaji_formulirA1_1721),
            'tunjungan_pph_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganPph_formulirA1_1721),
            'tunjungan_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganlain_formulirA1_1721),
            'honorarium_rincian'=>preg_replace('/[^0-9]/','',$request->honorarium_formulirA1_1721),
            'premi_asuransi_rincian'=>preg_replace('/[^0-9]/','',$request->premiAsuransi_formulirA1_1721),
            'natura_rincian'=>preg_replace('/[^0-9]/','',$request->natura_formulirA1_1721),
            'tantiem_rincian'=>preg_replace('/[^0-9]/','',$request->tantiem_formulirA1_1721),
            'jumlah_rincian'=>preg_replace('/[^0-9]/','',$request->jumlahbruto_formulirA1_1721),
            'biaya_jabatan_pengurangan'=>preg_replace('/[^0-9]/','',$request->biayajabatan_formulirA1_1721),
            'iuran_pensiun_pengurangan'=>preg_replace('/[^0-9]/','',$request->iuranPensiun_formulirA1_1721),
            'jumlah_pengurangan'=>preg_replace('/[^0-9]/','',$request->jumlahpengurangan_formulirA1_1721),
            'jumlah_neto_penghitungan'=>preg_replace('/[^0-9]/','',$request->jumlahPenghasilanNeto_formulirA1_1721),
            'penghasilan_neto_penghitungan'=>preg_replace('/[^0-9]/','',$request->penghasilanNetoMasa_formulirA1_1721),
            'jumlah_penghasilan_neto_penghitungan'=>preg_replace('/[^0-9]/','',$request->jumlahPenghasilanNetoSetaun_formulirA1_1721),
            'ptkp_penghitungan'=>preg_replace('/[^0-9]/','',$request->ptkp_formulirA1_1721),
            'pkp_penghitungan'=>preg_replace('/[^0-9]/','',$request->pkp_formulirA1_1721),
            'pkp_atas_penghitungan'=>preg_replace('/[^0-9]/','',$request->ataspkp_formulirA1_1721),
            'potongan_masa_penghitungan'=>preg_replace('/[^0-9]/','',$request->masayngDipotong_formulirA1_1721),
            'terutang_penghitungan'=>preg_replace('/[^0-9]/','',$request->terutang_formulirA1_1721),
            'terlunasi_penghitungan'=>preg_replace('/[^0-9]/','',$request->terlunasi_formulirA1_1721),
            'npwp_identitas_pemotong'=>$request->npwpIdPem_formulirA1_1721,
            'nama_identitas_pemotong'=>$request->namaIdPem_formulirA1_1721,
            'tgl_identitas_pemotong'=>$request->tglIdPem_formulirA1_1721,
            'attribute1'=>Auth::user()->id,
        );
        //  dd($data1721A);
         $data1721A2 = array(
            'formulir_id'=>$header_id,
            'nomor'=>$request->nomor_formulirA2_1721,
            'masa_perolehan'=>$request->masaperolehan_formulirA2_1721,
            'nama_instansi'=>$request->namaInstansi_formulirA2_1721,
            'nama_bendahara'=>$request->namaBendahara_formulirA2_1721,
            'npwp_bendahara'=>$request->npwpBendahara_formulirA2_1721,
            'npwp_identitas'=>$request->npwpPenerima_formulirA2_1721,
            'nip_identitas'=>$request->nip_formulirA2_1721,
            'nama_penerima_identitas'=>$request->namaPenerima_formulirA2_1721,
            'pangkat_identitas'=>$request->pangkat_formulirA2_1721,
            'alamat_identitas'=>$request->alamat_formulirA2_1721,
            'jenis_kelamin_identitas'=>$request->jeniskelamin_formulirA2_1721,
            'nik_identitas'=>$request->nik_formulirA2_1721,
            'status_pernikahan_identitas'=>$request->statusIdentitasPernikahan_formulirA2_1721,
            'status_jumlah_identitas'=>preg_replace('/[^0-9]/','',$request->statusJumlah_formulirA2_1721),
            'jabatan_identitas'=>$request->namaJabatan_formulirA2_1721,
            'kode_objek_rincian'=>$request->kode_objek_formulirA2_1721,
            'gaji_pokok_rincian'=>preg_replace('/[^0-9]/','',$request->gajiPokok_formulirA2_1721),
            'tunjangan_istri_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganIsteri_formulirA2_1721),
            'tunjangan_anak_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganAnak_formulirA2_1721),
            'tunjangan_keluarga_rincian'=>preg_replace('/[^0-9]/','',$request->keluarga_formulirA2_1721),
            'tunjangan_perbaikan_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganPerbaikan_formulirA2_1721),
            'tunjangan_struktural_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganStruktural_formulirA2_1721),
            'tunjangan_beras_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganBeras_formulirA2_1721),
            'tunjangan_khusus_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganKhusus_formulirA2_1721),
            'tunjangan_lain_rincian'=>preg_replace('/[^0-9]/','',$request->tunjanganLain_formulirA2_1721),
            'penghasilan_tetap_rincian'=>preg_replace('/[^0-9]/','',$request->penghasilanTetap_formulirA2_1721),
            'jumlah_bruto_rincian'=>preg_replace('/[^0-9]/','',$request->penghasilanBruto_formulirA2_1721),
            'biaya_jabatan_pengurangan'=>preg_replace('/[^0-9]/','',$request->biayaJabatan_formulirA2_1721),
            'iuran_pensiun_pengurangan'=>preg_replace('/[^0-9]/','',$request->iuranPensi_formulirA2_1721),
            'jumlah_pengurangan'=>preg_replace('/[^0-9]/','',$request->jumlahPengurangan_formulirA2_1721),
            'jumlah_penghasilan_neto_penghitung'=>preg_replace('/[^0-9]/','',$request->jumlahPenghasilan_formulirA2_1721),
            'jumlah_penghasilan_neto_masa_penghitung'=>preg_replace('/[^0-9]/','',$request->jumlahPenghasilanMasa_formulirA2_1721),
            'jumlah_penghasilan_penghitung'=>preg_replace('/[^0-9]/','',$request->jumlahPenghasilanPenghitungan_formulirA2_1721),
            'ptkp_penghitung'=>preg_replace('/[^0-9]/','',$request->ptkp_formulirA2_1721),
            'pkp_penghitung'=>preg_replace('/[^0-9]/','',$request->pkp_formulirA2_1721),
            'pkp_setahun_penghitung'=>preg_replace('/[^0-9]/','',$request->pkpSetahun_formulirA2_1721),
            'potongan_masa_penghitung'=>preg_replace('/[^0-9]/','',$request->potonganMasaSebelumnya_formulirA2_1721),
            'terutang_penghitung'=>preg_replace('/[^0-9]/','',$request->terutang_formulirA2_1721),
            'dilunasi_gaji_penghitung'=>preg_replace('/[^0-9]/','',$request->gaji_formulirA2_1721),
            'dilunasi_tetap_penghitung'=>preg_replace('/[^0-9]/','',$request->pengtetap_formulirA2_1721),
            'status_pegawai'=>$request->statusPernikahan_formulirA2_1721,
            'npwp_ttd'=>$request->npwpttdben_formulirA2_1721,
            'nama_ttd'=>$request->namattdben_formulirA2_1721,
            'nip_ttd'=>$request->nipnrppttdben_formulirA2_1721,
            'tgl_ttd'=>$request->tglrppttdben_formulirA2_1721,
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1721A2);
        SptMasaA::create($data1721A);
        SptMasaB::create($data1721A2);

        // 1721a
        return redirect()->route('sptmasapajak');
        // return redirect()->route('sptmasapajak/show',['id'=>$spt->formulir_id]);


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
            $spt=SptMasa::where('formulir_id',$id)->get()->first();
            // $sptI=SptMasaI::where('formulir_id',$id)->get()->first();
            // $sptII=SptMasaII::where('formulir_id',$id)->get()->first();
            // $sptIII=SptMasaIII::where('formulir_id',$id)->get()->first();
            // $sptIV=SptMasaIV::where('formulir_id',$id)->get()->first();
            // $sptV=SptMasaV::where('formulir_id',$id)->get()->first();
            // $sptVI=SptMasaVI::where('formulir_id',$id)->get()->first();
            // $sptVII=SptMasaVII::where('formulir_id',$id)->get()->first();
            // $sptA=SptMasaA::where('formulir_id',$id)->get()->first();
            // $sptA2=SptMasaB::where('formulir_id',$id)->get()->first();
            
            $sptLineB=SptMasaLineB::where('formulir_id',$id)->get();
            $sptLineC=SptMasaLineC::where('formulir_id',$id)->get();
            // $sptLineI=SptMasaILine::where('formulir_id',$id)->get();
            // $sptLineII=SptMasaIILine::where('formulir_id',$id)->get();
            // $sptLineIII=SptMasaIIILine::where('formulir_id',$id)->get();
            // $sptLineIV=SptMasaIVLine::where('formulir_id',$id)->get();
            // $sptLineVI=SptMasaVILine::where('formulir_id',$id)->get();
            // $sptLineVII=SptMasaVIILine::where('formulir_id',$id)->get();
            $masa=MasaBulan::all();

        }else{
            $spt=SptMasa::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptI=SptMasaI::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptII=SptMasaII::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIII=SptMasaIII::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIV=SptMasaIV::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptV=SptMasaV::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVI=SptMasaVI::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVII=SptMasaVII::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptA=SptMasaA::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptA2=SptMasaB::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            
            $sptLineB=SptMasaLineB::where('formulir_id',$id)->get();
            $sptLineC=SptMasaLineC::where('formulir_id',$id)->get();
            // $sptLineI=SptMasaILine::where('attribute1',$iduser)->where('formulir_id',$id)->get();
            // $sptLineII=SptMasaIILine::where('attribute1',$iduser)->where('formulir_id',$id)->get();
            // $sptLineIII=SptMasaIIILine::where('attribute1',$iduser)->where('formulir_id',$id)->get();
            // $sptLineIV=SptMasaIVLine::where('attribute1',$iduser)->where('formulir_id',$id)->get();
            // $sptLineVI=SptMasaVILine::where('attribute1',$iduser)->where('formulir_id',$id)->get();
            // $sptLineVII=SptMasaVIILine::where('attribute1',$iduser)->where('formulir_id',$id)->get();
            $masa=MasaBulan::all();
        }
        if($spt==null){
            return back();
        }
        return view('sptmasapajak.show',compact(
            'spt'
            ,'sptLineB','sptLineC'
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
        SptMasa::where('formulir_id',$id)->update([
            'attribute2'=>Auth::user()->id,
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaLineB::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaLineC::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaA::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaB::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaI::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaILine::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaII::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaIILine::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaIII::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaIIILine::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaIV::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaIVLine::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaV::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaVI::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaVILine::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaVII::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptMasaVIILine::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
}
