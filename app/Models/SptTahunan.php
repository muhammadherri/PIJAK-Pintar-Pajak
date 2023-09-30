<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptTahunan extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_spt',
        'tahun_pajak',
        'npwp',
        'nama_npwp',
        'jenis_usaha',
        'klu',
        'no_telp',
        'no_fak',
        'start_periode_pembukuan',
        'end_periode_pembukuan',
        'negara_domisili',
        'laporan_keuangan',
        'kantor_akuntan',
        'npwp_kantor_akuntan',
        'akuntan_publik',
        'nama_akuntan_publik',
        'nama_kantor_konsultan_pajak',
        'npwp_kantor_konsultan_pajak',
        'nama_konsultan_pajak',
        'npwp_konsultan_pajak',
        'a1_kena_pajak',
        'a2_kena_pajak',
        'a3_kena_pajak',
        'b4_pph_terutang',
        'b5_pph_terutang',
        'b6_pph_terutang',
        'c7_kredit_pajak',
        'c8a_kredit_pajak',
        'c8b_kredit_pajak',
        'c8c_kredit_pajak',
        'c9a_kredit_pajak',
        'c9b_kredit_pajak',
        'c9_kredit_pajak',
        'c10a_kredit_pajak',
        'c10b_kredit_pajak',
        'c10c_kredit_pajak',
        'd11a_pph_kurang',
        'd11b_pph_kurang',
        'd11_pph_kurang',
        'd12_pph_kurang',
        'd13_pph_kurang',
        'e14a_angsuran_pph',
        'e14b_angsuran_pph',
        'e14c_angsuran_pph',
        'e14d_angsuran_pph',
        'e14e_angsuran_pph',
        'e14f_angsuran_pph',
        'e14g_angsuran_pph',
        'f15a_pph_final',
        'f15b_pph_final',
        'g16_pernyataan_trx',
        'h17_lampiran',
        'wajib_pajak',
        'tempat',
        'nama_lengkap',
        'npwp_pengurus',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
