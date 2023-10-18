<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptPpn extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_spt_ppn';
    protected $fillable = [ 
        'id',
        'formulir_id',
        'nama_ptkp_1111',
        'alamat_1111',
        'no_telp_1111',
        'no_hp_1111',
        'no_klu_1111',
        'no_npwp_1111',
        'start_masa_1111',
        'end_masa_1111',
        'start_tahun_buku_1111',
        'end_tahun_buku_1111',
        'pembetulan_1111',
        'i_a_1_dpp_1111',
        'i_a_2_dpp_1111',
        'i_a_2_ppn_1111',
        'i_a_3_dpp_1111',
        'i_a_3_ppn_1111',
        'i_a_4_dpp_1111',
        'i_a_4_ppn_1111',
        'i_a_5_dpp_1111',
        'i_a_5_ppn_1111',
        'i_a_jumlah_dpp_1111',
        'i_a_jumlah_ppn_1111',
        'i_b_dpp_1111',
        'i_c_dpp_1111',
        'ii_a_ppn_1111',
        'ii_b_ppn_1111',
        'ii_c_ppn_1111',
        'ii_d_ppn_1111',
        'ii_e_ppn_1111',
        'ii_f_ppn_1111',
        'ii_g_start_1111',
        'ii_g_ntpp_1111',
        'ii_h_ppn_lebih_1111',
        'ii_h_oleh_1111',
        'ii_h_diminta_untuk_1111',
        'ii_h_diminta_untuk_date_1111',
        'ii_h_restitusi_1111',
        'ii_h_prosedur_1111',
        'iii_a_ppn_1111',
        'iii_b_ppn_1111',
        'iii_c_date_1111',
        'iii_c_ntpp_1111',
        'iv_a_ppn_1111',
        'iv_b_date_1111',
        'iv_b_ntpn_1111',
        'v_a_ppn_1111',
        'v_b_ppn_1111',
        'v_c_ppn_1111',
        'v_d_ppn_1111',
        'v_e_ppn_1111',
        'v_f_date_1111',
        'v_f_ntpp_1111',
        'vi_formulir_1111',
        'vi_lembar_1111',
        'vi_tempat_1111',
        'vi_penandatangan_1111',
        'vi_nama_jelas_1111',
        'vi_jabatan_1111',
        'nama_pkp_1111_AB',
        'npwp_1111_AB',
        'start_masa_1111_AB',
        'end_masa_1111_AB',
        'pembetulan_1111_AB',
        'i_a_dpp_1111_AB',
        'i_b_1_dpp_1111_AB',
        'i_b_1_ppn_1111_AB',
        'i_b_1_ppnbm_1111_AB',
        'i_b_2_dpp_1111_AB',
        'i_b_2_ppn_1111_AB',
        'i_b_2_ppnbm_1111_AB',
        'i_c_1_dpp_1111_AB',
        'i_c_1_ppn_1111_AB',
        'i_c_1_ppnbm_1111_AB',
        'i_c_2_dpp_1111_AB',
        'i_c_2_ppn_1111_AB',
        'i_c_2_ppnbm_1111_AB',
        'i_c_3_dpp_1111_AB',
        'i_c_3_ppn_1111_AB',
        'i_c_3_ppnbm_1111_AB',
        'i_c_4_dpp_1111_AB',
        'i_c_4_ppn_1111_AB',
        'i_c_4_ppnbm_1111_AB',
        'ii_a_dpp_1111_AB',
        'ii_a_ppn_1111_AB',
        'ii_a_ppnbm_1111_AB',
        'ii_b_dpp_1111_AB',
        'ii_b_ppn_1111_AB',
        'ii_b_ppnbm_1111_AB',
        'ii_c_dpp_1111_AB',
        'ii_c_ppn_1111_AB',
        'ii_c_ppnbm_1111_AB',
        'ii_d_dpp_1111_AB',
        'ii_d_ppn_1111_AB',
        'ii_d_ppnbm_1111_AB',
        'iii_a_pajak_masuk_1111_AB',
        'iii_b_pajaksebelumnya_1111_AB',
        'iii_b_spt_ppn_date_1111_AB',
        'iii_b_spt_ppn_1111_AB',
        'iii_b_pajak_masuk_1111_AB',
        'iii_b_jumlah_1111_AB',
        'iii_b_jumlah_pajak_masuk_1111_AB',
        'nama_pkp_1111_A1',
        'npwp_1111_A1',
        'start_masa_1111_A1',
        'end_masa_1111_A1',
        'pembetul_1111_A1',
        'jumlah_dpp_1111_A1',
        'nama_pkp_1111_A2',
        'npwp_1111_A2',
        'start_masa_1111_A2',
        'end_masa_1111_A2',
        'pembetul_1111_A2',
        'jumlah_dpp_1111_A2',
        'jumlah_ppn_1111_A2',
        'jumlah_ppnbm_1111_A2',
        'nama_pkp_1111_B1',
        'npwp_1111_B1',
        'start_masa_1111_B1',
        'end_masa_1111_B1',
        'pembetul_1111_B1',
        'jumlah_dpp_1111_B1',
        'jumlah_ppn_1111_B1',
        'jumlah_ppnbm_1111_B1',
        'nama_pkp_1111_B2',
        'npwp_1111_B2',
        'start_masa_1111_B2',
        'end_masa_1111_B2',
        'pembetul_1111_B2',
        'jumlah_dpp_1111_B2',
        'jumlah_ppn_1111_B2',
        'jumlah_ppnbm_1111_B2',
        'nama_pkp_1111_B3',
        'npwp_1111_B3',
        'start_masa_1111_B3',
        'end_masa_1111_B3',
        'pembetul_1111_B3',
        'jumlah_dpp_1111_B3',
        'jumlah_ppn_1111_B3',
        'jumlah_ppnbm_1111_B3',
        'attribute_1',
        'attribute_2',
        'attribute_3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute_1');
    }
}
