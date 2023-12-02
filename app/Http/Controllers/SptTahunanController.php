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

    public function store(Request $request){
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
            'hpp1_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp1_1771ii),
            'hpp2_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp2_1771ii),
            'hpp3_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp3_1771ii),
            'hpp4_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp4_1771ii),
            'hpp5_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp5_1771ii),
            'hpp6_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp6_1771ii),
            'hpp7_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp7_1771ii),
            'hpp8_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp8_1771ii),
            'hpp9_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp9_1771ii),
            'hpp10_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp10_1771ii),
            'hpp11_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp11_1771ii),
            'hpp12_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp12_1771ii),
            'hpp13_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp13_1771ii),
            'hpp14_1771ii'=>preg_replace('/[^0-9]/','',$request->hpp14_1771ii),
            'biayausaha1_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha1_1771ii),
            'biayausaha2_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha2_1771ii),
            'biayausaha3_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha3_1771ii),
            'biayausaha4_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha4_1771ii),
            'biayausaha5_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha5_1771ii),
            'biayausaha6_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha6_1771ii),
            'biayausaha7_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha7_1771ii),
            'biayausaha8_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha8_1771ii),
            'biayausaha9_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha9_1771ii),
            'biayausaha10_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha10_1771ii),
            'biayausaha11_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha11_1771ii),
            'biayausaha12_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha12_1771ii),
            'biayausaha13_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha13_1771ii),
            'biayausaha14_1771ii'=>preg_replace('/[^0-9]/','',$request->biayausaha14_1771ii),
            'biayaluarusaha1_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha1_1771ii),
            'biayaluarusaha2_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha2_1771ii),
            'biayaluarusaha3_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha3_1771ii),
            'biayaluarusaha4_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha4_1771ii),
            'biayaluarusaha5_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha5_1771ii),
            'biayaluarusaha6_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha6_1771ii),
            'biayaluarusaha7_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha7_1771ii),
            'biayaluarusaha8_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha8_1771ii),
            'biayaluarusaha9_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha9_1771ii),
            'biayaluarusaha10_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha10_1771ii),
            'biayaluarusaha11_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha11_1771ii),
            'biayaluarusaha12_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha12_1771ii),
            'biayaluarusaha13_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha13_1771ii),
            'biayaluarusaha14_1771ii'=>preg_replace('/[^0-9]/','',$request->biayaluarusaha14_1771ii),
            'jumlah1_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah1_1771ii),
            'jumlah2_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah2_1771ii),
            'jumlah3_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah3_1771ii),
            'jumlah4_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah4_1771ii),
            'jumlah5_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah5_1771ii),
            'jumlah6_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah6_1771ii),
            'jumlah7_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah7_1771ii),
            'jumlah8_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah8_1771ii),
            'jumlah9_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah9_1771ii),
            'jumlah10_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah10_1771ii),
            'jumlah11_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah11_1771ii),
            'jumlah12_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah12_1771ii),
            'jumlah13_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah13_1771ii),
            'jumlah14_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlah14_1771ii),
            'attribute1'=>Auth::user()->id,
        );
        // dd($data1771iihead);
        SptTahunanIIHead::create($data1771iihead);
        // foreach ($harpok as $key => $row) {
        //     $data1771iilines = array(
        //         'formulir_id' => $header_id,
        //         'perincian_pembelian_barang' => $rincian[$key],
        //         'harga_pokok' => $harpok[$key],
        //         'biaya_usaha' => $biayausaha[$key],
        //         'biaya_luar_usaha' => $biayaluar[$key],
        //         'sub_jumlah_biaya' => $subjumlah[$key],
        //     );
        //     // dd($data1771iihead);
        // SptTahunanIILines::create($data1771iilines);
        // }
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
            'dpp1_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp1_1771iv),
            'dpp2_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp2_1771iv),
            'dpp3_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp3_1771iv),
            'dpp4_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp4_1771iv),
            'dpp5_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp5_1771iv),
            'dpp6_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp6_1771iv),
            'dpp7_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp7_1771iv),
            'dpp8a_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp8a_1771iv),
            'dpp8b_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp8b_1771iv),
            'dpp8c_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp8c_1771iv),
            'dpp9_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp9_1771iv),
            'dpp10_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp10_1771iv),
            'dpp11_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp11_1771iv),
            'dpp12_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp12_1771iv),
            'dpp13_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp13_1771iv),
            'dpp14_1771iv'=>preg_replace('/[^0-9]/','',$request->dpp14_1771iv),
            'jumlahdpp14_1771iv'=>preg_replace('/[^0-9]/','',$request->jumlahdpp14_1771iv),
            'tarif1_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif1_1771ii),
            'tarif2_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif2_1771ii),
            'tarif3_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif3_1771ii),
            'tarif4_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif4_1771ii),
            'tarif5_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif5_1771ii),
            'tarif6_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif6_1771ii),
            'tarif7_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif7_1771ii),
            'tarif8a_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif8a_1771ii),
            'tarif8b_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif8b_1771ii),
            'tarif8c_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif8c_1771ii),
            'tarif9_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif9_1771ii),
            'tarif10_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif10_1771ii),
            'tarif11_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif11_1771ii),
            'tarif12_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif12_1771ii),
            'tarif13_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif13_1771ii),
            'tarif14_1771ii'=>preg_replace('/[^0-9]/','',$request->tarif14_1771ii),
            'pph1_1771ii'=>preg_replace('/[^0-9]/','',$request->pph1_1771ii),
            'pph2_1771ii'=>preg_replace('/[^0-9]/','',$request->pph2_1771ii),
            'pph3_1771ii'=>preg_replace('/[^0-9]/','',$request->pph3_1771ii),
            'pph4_1771ii'=>preg_replace('/[^0-9]/','',$request->pph4_1771ii),
            'pph5_1771ii'=>preg_replace('/[^0-9]/','',$request->pph5_1771ii),
            'pph6_1771ii'=>preg_replace('/[^0-9]/','',$request->pph6_1771ii),
            'pph7_1771ii'=>preg_replace('/[^0-9]/','',$request->pph7_1771ii),
            'pph8a_1771ii'=>preg_replace('/[^0-9]/','',$request->pph8a_1771ii),
            'pph8b_1771ii'=>preg_replace('/[^0-9]/','',$request->pph8b_1771ii),
            'pph8c_1771ii'=>preg_replace('/[^0-9]/','',$request->pph8c_1771ii),
            'pph9_1771ii'=>preg_replace('/[^0-9]/','',$request->pph9_1771ii),
            'pph10_1771ii'=>preg_replace('/[^0-9]/','',$request->pph10_1771ii),
            'pph11_1771ii'=>preg_replace('/[^0-9]/','',$request->pph11_1771ii),
            'pph12_1771ii'=>preg_replace('/[^0-9]/','',$request->pph12_1771ii),
            'pph13_1771ii'=>preg_replace('/[^0-9]/','',$request->pph13_1771ii),
            'pph14_1771ii'=>preg_replace('/[^0-9]/','',$request->pph14_1771ii),
            'jumlahpph14_1771ii'=>preg_replace('/[^0-9]/','',$request->jumlahpph14_1771ii),
            'bruto1_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto1_1771iv),
            'bruto2_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto2_1771iv),
            'bruto3_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto3_1771iv),
            'bruto4_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto4_1771iv),
            'bruto5_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto5_1771iv),
            'bruto6_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto6_1771iv),
            'bruto7_1771iv'=>preg_replace('/[^0-9]/','',$request->bruto7_1771iv),
            'jumlahbruto_1771iv'=>preg_replace('/[^0-9]/','',$request->jumlahbruto_1771iv),
            'attribute1'=>Auth::user()->id,
        );
        SptTahunanIVHead::create($data1771ivhead);
        // foreach ($pengenaanpajak as $key => $row) {
        //     $data1771ivlines_a = array(
        //         'formulir_id' => $header_id,
        //         'jenis_penghasilan' => $jenispenghasilan[$key],
        //         'dasar_pengenaan_pajak' => $pengenaanpajak[$key],
        //         'potongan_tarif' => $tarifpotong[$key],
        //         'pph_terutang' => $pphterutang[$key],
                
        //     );
        //     // dd($data1771ivlines_a);
        // SptTahunanIVLinesA::create($data1771ivlines_a);
        // }
        // foreach ($jenispenghasilanb as $key => $row) {
        //     $data1771ivlines_b = array(
        //         'formulir_id' => $header_id,
        //         'jenis_penghasilan' => $jenispenghasilanb[$key],
        //         'penghasilan_bruto' => $penghasilanbruto[$key],
        //     );
        //     // DD($data1771ivlines_b);
        // SptTahunanIVLinesB::create($data1771ivlines_b);
        // }
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
            
        }else{
            $spt=SptTahunan::where('attribute1',$iduser)->where('formulir_id',$id)->get()->first();
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
