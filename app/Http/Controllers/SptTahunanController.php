<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SptTahunan;
use App\Models\SptTahunanI;
use App\Models\SptTahunanIIHead;
use App\Models\SptTahunanIIIHead;
use App\Models\SptTahunanIIILines;
use App\Models\SptTahunanIILines;
use App\Models\SptTahunanIVHead;
use App\Models\SptTahunanIVLinesA;
use App\Models\SptTahunanIVLinesB;
use App\Models\SptTahunanVHead;
use App\Models\SptTahunanVIHead;
use App\Models\SptTahunanVILinesA;
use App\Models\SptTahunanVILinesB;
use App\Models\SptTahunanVILinesC;
use App\Models\SptTahunanVLinesA;
use App\Models\SptTahunanVLinesB;
use Illuminate\Support\Facades\Auth;
use PDF;

class SptTahunanController extends Controller
{
    public function index()
    {
        return view('spttahunan.index');
    }

    public function create()
    {
        return view('spttahunan.create');

    }

    public function store(Request $request)
    {
        $header_id =SptTahunan::get()->count();
        $header_id = $header_id ?? 0;
        $header_id = $header_id+1;
        // dd($header_id);
        // dd($request);

        // 1771 II
        $rincian = $request->input('angkapembelianbarang');
        $harpok = preg_replace('/[^0-9]/','',$request->input('angkaharpok1'));
        $biayausaha = preg_replace('/[^0-9]/','',$request->input('angkabiaya_usaha1'));
        $biayaluar = preg_replace('/[^0-9]/','',$request->input('angkabiaya_luar1'));
        $subjumlah = preg_replace('/[^0-9]/','',$request->input('subjum1'));
        // 1771 II

        // 1771 III
        $nama_npwp = $request->input('kreditnama');
        $no_npwp = $request->input('kreditnpwp');
        $trx = $request->input('kredittrx');
        $rp = preg_replace('/[^0-9]/','',$request->input('kreditrp'));
        $potonganpajak = preg_replace('/[^0-9]/','',$request->input('kreditpajak'));
        $nopotong = $request->input('kreditnomor');
        $kredittgl = $request->input('kredittgl');
        // 1771 III

        // 1771IV a
        $jenispenghasilan = $request->input('jenispenghasilan');
        $pengenaanpajak = preg_replace('/[^0-9]/','',$request->input('angka_pengenaan_pajak'));
        $tarifpotong = preg_replace('/[^0-9]/','',$request->input('angka_tarif_potongan'));
        $pphterutang = preg_replace('/[^0-9]/','',$request->input('angka_pph_terutang'));
        // 1771IV a

        // 1771IV b
        $jenispenghasilanb = $request->input('jenis_penghasilanb');
        $penghasilanbruto = preg_replace('/[^0-9]/','',$request->input('angka_penghasilan_brutob'));
        // 1771IV b
        
        // 1771V a
        $pemegang_saham = $request->input('pemegangsh_nama_1771V');
        $alamat_pemegang_sh = $request->input('pemegangsh_alamat_nama_1771V');
        $npwp_pemegang_sh = $request->input('pemegangsh_npwp_1771V');
        $modal_setor = preg_replace('/[^0-9]/','',$request->input('pemegangsh_modalsetor_1771V'));
        $pemegangsh_persen = preg_replace('/[^0-9]/','',$request->input('pemegangsh_persen_1771V'));
        $pemegangsh_dividen = preg_replace('/[^0-9]/','',$request->input('pemegangsh_dividen_1771V'));
        // 1771V a

        // 1771V b
        $pemegangsh_namab = $request->input('pemegangshb_nama_1771V');
        $pemegangsh_alamatb = $request->input('pemegangshb_alamat_nama_1771V');
        $pemegangsh_npwpb = $request->input('pemegangshb_npwp_1771V');
        $pemegangsh_jabatanb = $request->input('pemegangshb_jabatan_1771V');
        // 1771V b
        
        // 1771Vi a 
        $penyertaan_nama = $request->input('penyertaan_nama');
        $penyertaan_alamat = $request->input('penyertaan_alamat');
        $penyertaan_npwp = $request->input('penyertaan_npwp');
        $penyertaan_modal = preg_replace('/[^0-9]/','',$request->input('penyertaan_modal'));
        $penyertaan_persen = preg_replace('/[^0-9]/','',$request->input('penyertaan_persen'));
        // 1771Vi a 
        $npwpvib = $request->input('penyertaan_npwpb');
        $npwpvic = $request->input('penyertaan_npwpc');
        $data1771 = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_spt,
            'tahun_pajak'=>$request->tahun_pajak,
            'npwp'=>$request->npwp,
            'nama_npwp'=>$request->nama_npwp,
            'jenis_usaha'=>$request->jenis_usaha,
            'klu'=>$request->klu,
            'no_telp'=>$request->no_telp,
            'no_fak'=>$request->no_fak,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan,
            'negara_domisili'=>$request->negara_domisili,
            'laporan_keuangan'=>$request->laporan_keuangan,
            'kantor_akuntan'=>$request->kantor_akuntan,
            'npwp_kantor_akuntan'=>$request->npwp_kantor_akuntan,
            'akuntan_publik'=>$request->akuntan_publik,
            'nama_akuntan_publik'=>$request->nama_akuntan_publik,
            'nama_kantor_konsultan_pajak'=>$request->nama_kantor_konsultan_pajak,
            'npwp_kantor_konsultan_pajak'=>$request->npwp_kantor_konsultan_pajak,
            'nama_konsultan_pajak'=>$request->nama_konsultan_pajak,
            'npwp_konsultan_pajak'=>$request->npwp_konsultan_pajak,
            'a1_kena_pajak'=>preg_replace('/[^0-9]/','',$request->a1_kena_pajak),
            'a2_kena_pajak'=>preg_replace('/[^0-9]/','',$request->a2_kena_pajak),
            'a3_kena_pajak'=>preg_replace('/[^0-9]/','',$request->a3_kena_pajak),
            'b4_pph_terutang'=>preg_replace('/[^0-9]/','',$request->b4_pph_terutang),
            'b5_pph_terutang'=>preg_replace('/[^0-9]/','',$request->b5_pph_terutang),
            'b6_pph_terutang'=>preg_replace('/[^0-9]/','',$request->b6_pph_terutang),
            'c7_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c7_kredit_pajak),
            'c8a_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c8a_kredit_pajak),
            'c8b_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c8b_kredit_pajak),
            'c8c_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c8c_kredit_pajak),
            'c9a_kredit_pajak'=>$request->c9a_kredit_pajak,
            // 'c9b_kredit_pajak'=>$request->NULL,
            'c9_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c9_kredit_pajak),
            'c10a_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c10a_kredit_pajak),
            'c10b_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c10b_kredit_pajak),
            'c10c_kredit_pajak'=>preg_replace('/[^0-9]/','',$request->c10c_kredit_pajak),
            'd11a_pph_kurang'=>$request->d11a_pph_kurang,
            // 'd11b_pph_kurang'=>$request->d11b_pph_kurang,
            'd11_pph_kurang'=>preg_replace('/[^0-9]/','',$request->d11_pph_kurang),
            'd12_pph_kurang'=>$request->d12_pph_kurang,
            'd13_pph_kurang'=>$request->d13_pph_kurang,
            'e14a_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14a_angsuran_pph),
            'e14b_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14b_angsuran_pph),
            'e14c_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14c_angsuran_pph),
            'e14d_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14d_angsuran_pph),
            'e14e_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14e_angsuran_pph),
            'e14f_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14f_angsuran_pph),
            'e14g_angsuran_pph'=>preg_replace('/[^0-9]/','',$request->e14g_angsuran_pph),
            'f15a_pph_final'=>preg_replace('/[^0-9]/','',$request->f15a_pph_final),
            'f15b_pph_final'=>preg_replace('/[^0-9]/','',$request->f15b_pph_final),
            'g16_pernyataan_trx'=>$request->g16_pernyataan_trx,
            'h17_lampiran'=>$request->h17_lampiran,
            'wajib_pajak'=>$request->wajib_pajak,
            'tempat'=>$request->tempat,
            'nama_lengkap'=>$request->nama_lengkap,
            'npwp_pengurus'=>$request->npwp_pengurus,
            'attribute1'=>Auth::user()->id,
        );
        // dd($header_id);
        $spt=SptTahunan::create($data1771);
        $data1771i = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_sptI,
            'tahun_pajak'=>$request->tahun_pajakI,
            'npwp'=>$request->npwp_1771i,
            'nama_npwp'=>$request->nama_npwp_1771i,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan_1771i,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan_1771i,
            'peredaran_usaha'=>preg_replace('/[^0-9]/','',$request->a1_penghasilan_netto_1771i),
            'harga_pokok'=>preg_replace('/[^0-9]/','',$request->b1_penghasilan_netto_1771i),
            'biaya_usaha_lain'=>preg_replace('/[^0-9]/','',$request->c1_penghasilan_netto_1771i),
            'penghasilan_netto_dari_usaha'=>preg_replace('/[^0-9]/','',$request->d1_penghasilan_netto_1771i),
            'penghasilan_dari_luar_usaha'=>preg_replace('/[^0-9]/','',$request->e1_penghasilan_netto_1771i),
            'biaya_dari_luar_usaha'=>preg_replace('/[^0-9]/','',$request->f1_penghasilan_netto_1771i),
            'penghasilan_netto_dari_luar_usaha'=>preg_replace('/[^0-9]/','',$request->g1_penghasilan_netto_1771i),
            'jumlah_netto_komersial_dalam_negeri'=>preg_replace('/[^0-9]/','',$request->h1_penghasilan_netto_1771i),
            'penghasilan_netto_luar_negeri'=>preg_replace('/[^0-9]/','',$request->penghasilan_netto_luar_negeri_1771i),
            'jumlah_penghasilan_netto_komersial'=>preg_replace('/[^0-9]/','',$request->jumlah_1771i),
            'penghasilan'=>preg_replace('/[^0-9]/','',$request->penghasilan_1771i),
            'biaya_dibebankan'=>preg_replace('/[^0-9]/','',$request->a5_penyesuaian_fiskal_1771i),
            'dana_cadangan'=>preg_replace('/[^0-9]/','',$request->b5_penyesuaian_fiskal_1771i),
            'natura'=>preg_replace('/[^0-9]/','',$request->c5_penyesuaian_fiskal_1771i),
            'jumlah_melebihi_kewajaran'=>preg_replace('/[^0-9]/','',$request->d5_penyesuaian_fiskal_1771i),
            'harta_dihibahkan'=>preg_replace('/[^0-9]/','',$request->e5_penyesuaian_fiskal_1771i),
            'pajak_penghasilan'=>preg_replace('/[^0-9]/','',$request->f5_penyesuaian_fiskal_1771i),
            'gaji_yang_dibayarkan'=>preg_replace('/[^0-9]/','',$request->g5_penyesuaian_fiskal_1771i),
            'sanksi_adm'=>preg_replace('/[^0-9]/','',$request->h5_penyesuaian_fiskal_1771i),
            'selisih_penyusutan_komersial'=>preg_replace('/[^0-9]/','',$request->i5_penyesuaian_fiskal_1771i),
            'selisih_amortisasi'=>preg_replace('/[^0-9]/','',$request->j5_penyesuaian_fiskal_1771i),
            'biaya_yang_ditangguhkan'=>preg_replace('/[^0-9]/','',$request->k5_penyesuaian_fiskal_1771i),
            'penyesuaian_fiskal'=>preg_replace('/[^0-9]/','',$request->l5_penyesuaian_fiskal_1771i),
            'jumlah_penyesuaian'=>preg_replace('/[^0-9]/','',$request->m5_penyesuaian_fiskal_1771i),
            'selisih_penyusutan_fiskal_negatif'=>preg_replace('/[^0-9]/','',$request->a6_fiskal_negatif_1771i),
            'selisih_amortisasi_fiskal_negatif'=>preg_replace('/[^0-9]/','',$request->b6_fiskal_negatif_1771i),
            'penghasilan_ditangguhkan'=>preg_replace('/[^0-9]/','',$request->c6_fiskal_negatif_1771i),
            'penyesuaian_fiskal_fiskal_negatif'=>preg_replace('/[^0-9]/','',$request->d6_fiskal_negatif_1771i),
            'jumlah_fiskal_negatif'=>preg_replace('/[^0-9]/','',$request->e6_fiskal_negatif_1771i),
            'pengurangan_penghasilan_netto'=>preg_replace('/[^0-9]/','',$request->fasilitas_1771i),
            'netto_fiskal'=>preg_replace('/[^0-9]/','',$request->netto_fiskal_1771i),
            'attribute1'=>Auth::user()->id,
        );
        SptTahunanI::create($data1771i);
        $data1771iihead = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_spt_1771II,
            'tahun_pajak'=>$request->tahun_pajak_1771II,
            'npwp'=>$request->npwp_1771II,
            'nama_npwp'=>$request->nama_npwp_1771II,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan_1771II,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan_1771II,
            'sub_harga_pokok'=>preg_replace('/[^0-9]/','',$request->subangkaharpok1),
            'sub_biaya_usaha'=>preg_replace('/[^0-9]/','',$request->subangkabiaya_usaha1),
            'sub_biaya_luar_usaha'=>preg_replace('/[^0-9]/','',$request->subangkabiaya_luar1),
            'total_jumlah_biaya'=>preg_replace('/[^0-9]/','',$request->totaljum1),
            'attribute1'=>Auth::user()->id,
        );
        SptTahunanIIHead::create($data1771iihead);
        foreach ($harpok as $key => $row) {
            $data1771iilines = array(
                'formulir_id' => $header_id,
                'perincian_pembelian_barang' => $rincian[$key],
                'harga_pokok' => $harpok[$key],
                'biaya_usaha' => $biayausaha[$key],
                'biaya_luar_usaha' => $biayaluar[$key],
                'sub_jumlah_biaya' => $subjumlah[$key],
            );
            // dd($data1771iihead);
        SptTahunanIILines::create($data1771iilines);
        }
        $data1771iiihead = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_spt_1771III,
            'tahun_pajak'=>$request->tahun_pajak_1771III,
            'npwp'=>$request->npwp_1771III,
            'nama_npwp'=>$request->nama_npwp_1771III,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan_1771III,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan_1771III,
            'jumlah_biaya_dalam_rupiah'=>preg_replace('/[^0-9]/','',$request->kreditsubrp),
            'jumlah_pajak_penghasil_yang_dipotong'=>preg_replace('/[^0-9]/','',$request->kreditpenghasilan),
            'attribute1'=>Auth::user()->id,
        );
        SptTahunanIIIHead::create($data1771iiihead);
        foreach ($no_npwp as $key => $row) {
            $data1771iiilines = array(
                'formulir_id' => $header_id,
                'nama_npwp' => $nama_npwp[$key],
                'npwp' => $no_npwp[$key],
                'jenis_transaksi' => $trx[$key],
                'biaya' => $rp[$key],
                'pajak_penghasilan' => $potonganpajak[$key],
                'bukti_no_pemotong' => $nopotong[$key],
                'tgl_bukti_pemotong' => $kredittgl[$key],
            );
            // dd($data1771iiilines);
        SptTahunanIIILines::create($data1771iiilines);
        }
        $data1771ivhead = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_spt_1771IV,
            'tahun_pajak'=>$request->tahun_pajak_1771IV,
            'npwp'=>$request->npwp_1771IV,
            'nama_npwp'=>$request->nama_npwp_1771IV,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan_1771IV,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan_1771IV,
            'jumlah_dasar_pengenaan_pajak'=>preg_replace('/[^0-9]/','',$request->sub_angka_pengenaan_pajak),
            'jumlah_potongan_tarif'=>preg_replace('/[^0-9]/','',$request->sub_tarif),
            'jumlah_pph_terutang'=>preg_replace('/[^0-9]/','',$request->total1771iv),
            'jumlah_penghasilan_bruto'=>preg_replace('/[^0-9]/','',$request->totalbruto),
            'attribute1'=>Auth::user()->id,
        );
        SptTahunanIVHead::create($data1771ivhead);
        foreach ($pengenaanpajak as $key => $row) {
            $data1771ivlines_a = array(
                'formulir_id' => $header_id,
                'jenis_penghasilan' => $jenispenghasilan[$key],
                'dasar_pengenaan_pajak' => $pengenaanpajak[$key],
                'potongan_tarif' => $tarifpotong[$key],
                'pph_terutang' => $pphterutang[$key],
                
            );
            // dd($data1771ivlines_a);
        SptTahunanIVLinesA::create($data1771ivlines_a);
        }
        foreach ($jenispenghasilanb as $key => $row) {
            $data1771ivlines_b = array(
                'formulir_id' => $header_id,
                'jenis_penghasilan' => $jenispenghasilanb[$key],
                'penghasilan_bruto' => $penghasilanbruto[$key],
            );
        SptTahunanIVLinesB::create($data1771ivlines_b);
        }
        $data1771vhead = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_spt_1771IV,
            'tahun_pajak'=>$request->tahun_pajak_1771IV,
            'npwp'=>$request->npwp_1771IV,
            'nama_npwp'=>$request->nama_npwp_1771IV,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan_1771IV,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan_1771IV,
            'jumlah_modal_setor'=>preg_replace('/[^0-9]/','',$request->jumlahmodalsetor),
            'jumlah_deviden'=>preg_replace('/[^0-9]/','',$request->jumlahdividen),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1771vhead);
        SptTahunanVHead::create($data1771vhead);
        foreach ($npwp_pemegang_sh as $key => $row) {
            $data1771vlines_a = array(
                'formulir_id' => $header_id,
                'nama_pemegang_saham' => $pemegang_saham[$key],
                'alamat_pemegang_saham' => $alamat_pemegang_sh[$key],
                'no_npwp' => $npwp_pemegang_sh[$key],
                'modal_setor_pemilik_saham' => $modal_setor[$key],
                'modal_persen' => $pemegangsh_persen[$key],
                'jumlah_dividen' => $pemegangsh_dividen[$key],
            );
            // dd($data1771vlines_b);
        SptTahunanVLinesA::create($data1771vlines_a);
        }
        foreach ($pemegangsh_namab as $key => $row) {
            $data1771vlines_b = array(
                'formulir_id' => $header_id,
                'nama_pengurus_saham' => $pemegangsh_namab[$key],
                'alamat_pengurus_saham' => $pemegangsh_alamatb[$key],
                'no_npwp' => $pemegangsh_npwpb[$key],
                'jabatan_pengurus' => $pemegangsh_jabatanb[$key],
            );
        SptTahunanVLinesB::create($data1771vlines_b);
        }
        $data1771vihead = array(
            'formulir_id'=>$header_id,
            'jenis_spt'=>$request->jenis_spt_1771IV,
            'tahun_pajak'=>$request->tahun_pajak_1771IV,
            'npwp'=>$request->npwp_1771IV,
            'nama_npwp'=>$request->nama_npwp_1771IV,
            'start_periode_pembukuan'=>$request->start_periode_pembukuan_1771IV,
            'end_periode_pembukuan'=>$request->end_periode_pembukuan_1771IV,
            'jumlah_modal_setor_pemilik_saham'=>preg_replace('/[^0-9]/','',$request->jumlahmodalafiliasi),
            'attribute1'=>Auth::user()->id,
        );
        SptTahunanVIHead::create($data1771vihead);
        foreach ($penyertaan_npwp as $key => $row) {
            $data1771vilines_a = array(
                'formulir_id' => $header_id,
                'nama_perusahaan_afiliasi' => $penyertaan_nama[$key],
                'alamat_perusahaan_afiliasi' => $penyertaan_alamat[$key],
                'no_npwp' => $penyertaan_npwp[$key],
                'modal_setor' => $penyertaan_modal[$key],
                'persen' => $penyertaan_persen[$key],
            );
            
            // dd($data1771vilines_a);
            SptTahunanVILinesA::create($data1771vilines_a);
        }
        foreach ($npwpvib as $key => $row) {
            $data1771vilines_b = array(
                'formulir_id' => $header_id,
                'nama_peminjam_saham' => $request->penyertaan_namab[$key],
                'no_npwp_peminjam' => $request->penyertaan_npwpb[$key],
                'jumlah_pinjaman' => preg_replace('/[^0-9]/','',$request->penyertaan_jumlahpinjamanb[$key]),
                'tahun_pinjaman' => preg_replace('/[^0-9]/','',$request->penyertaan_thnpinjamanb[$key]),
                'bunga_pinjaman' => preg_replace('/[^0-9]/','',$request->penyertaan_bungapinjamanb[$key]),
            );
            SptTahunanVILinesB::create($data1771vilines_b);
            
        }
        foreach ($npwpvic as $key => $row) {
            $data1771vilines_c = array(
                'formulir_id' => $header_id,
                'nama_peminjam_saham' => $request->penyertaan_namac[$key],
                'no_npwp_peminjam_saham' => $request->penyertaan_npwpc[$key],
                'jumlah_pinjaman' => preg_replace('/[^0-9]/','',$request->penyertaan_jumlahpinjamanc[$key]),
                'tahun_pinjaman' => preg_replace('/[^0-9]/','',$request->penyertaan_thnpinjamanc[$key]),
                'bunga_pinjaman' => preg_replace('/[^0-9]/','',$request->penyertaan_bungapinjamanc[$key]),
            );
            SptTahunanVILinesC::create($data1771vilines_c);
        }
        $a= \DB::commit();
        return redirect()->route('spttahunan');
        // return redirect()->route('spttahunan/show',['id'=>$spt->formulir_id]);
    }

    public function show($id)
    {
        // dd($id);
        $iduser=Auth::user()->id;
        if(Auth::user()->status==1){
            $spt=SptTahunan::where('formulir_id',$id)->get()->first();
            // $sptI=SptTahunanI::where('formulir_id',$id)->get()->first();
            // dd($spt);
            // $sptIIhead=SptTahunanIIHead::where('formulir_id',$id)->get()->first();
            // $sptIIline=SptTahunanIILines::where('formulir_id',$id)->get()->first();
            // $sptIIIhead=SptTahunanIIIHead::where('formulir_id',$id)->get()->first();
            // $sptIIIline=SptTahunanIIILines::where('formulir_id',$id)->get()->first();
            // $sptIVhead=SptTahunanIVHead::where('formulir_id',$id)->get()->first();
            // $sptIVlinea=SptTahunanIVLinesA::where('formulir_id',$id)->get()->first();
            // $sptIVlineb=SptTahunanIVLinesB::where('formulir_id',$id)->get()->first();
            // $sptVhead=SptTahunanVHead::where('formulir_id',$id)->get()->first();
            // $sptVlinea=SptTahunanVLinesA::where('formulir_id',$id)->get()->first();
            // $sptVlineb=SptTahunanVLinesB::where('formulir_id',$id)->get()->first();
            // $sptVIhead=SptTahunanVIHead::where('formulir_id',$id)->get()->first();
            // $sptVIlinea=SptTahunanVILinesA::where('formulir_id',$id)->get()->first();
            // $sptVIlineb=SptTahunanVILinesB::where('formulir_id',$id)->get()->first();
            // $sptVIlinec=SptTahunanVILinesC::where('formulir_id',$id)->get()->first();
        }else{
            $spt=SptTahunan::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptI=SptTahunanI::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIIhead=SptTahunanIIHead::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIIline=SptTahunanIILines::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIIIhead=SptTahunanIIIHead::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIIIline=SptTahunanIIILines::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIVhead=SptTahunanIVHead::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIVlinea=SptTahunanIVLinesA::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptIVlineb=SptTahunanIVLinesB::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVhead=SptTahunanVHead::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVlinea=SptTahunanVLinesA::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVlineb=SptTahunanVLinesB::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVIhead=SptTahunanVIHead::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVIlinea=SptTahunanVILinesA::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVIlineb=SptTahunanVILinesB::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
            // $sptVIlinec=SptTahunanVILinesC::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
        }
        if($spt==null){
            return back();
        }
        $split_npwp=str_split($spt->npwp);
        return view('spttahunan.show',compact('spt'));
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        SptTahunan::where('formulir_id',$id)->update([
            'attribute2'=>Auth::user()->id,
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanI::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIIHead::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIIIHead::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIIILines::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIILines::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIILines::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIVHead::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIVLinesA::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanIVLinesB::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVHead::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVIHead::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVILinesA::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVILinesB::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVILinesC::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVLinesA::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        SptTahunanVLinesB::where('formulir_id',$id)->update([
            'deleted_at'=>date('Y-m-d H:i:s'),
        ]);
        $a= \DB::commit();    
        return redirect()->back()->with('alert','Berhasil Dihapus');
    }
   
}
