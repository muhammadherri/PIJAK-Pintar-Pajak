<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Spt1770S extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_spt_1770_s';
    protected $fillable = [
        'id',
        'formulir_id',
        'tahun_pajak',
        'pembetulan',
        'npwp',
        'nama_npwp',
        'pekerjaan',
        'klu',
        'no_telp',
        'no_faks',
        'status_kewajiban',
        'npwp_pasangan',
        'a1_penghasil',
        'a2_penghasil',
        'a3_penghasil',
        'a4_penghasil',
        'a5_penghasil',
        'a6_penghasil',
        'b7_kena_pajak',
        'b7_penghasil',
        'b8_penghasil',
        'c9_terutang',
        'c10_terutang',
        'c11_terutang',
        'd12_kredit',
        'pph_dibayar',
        'd13_kredit',
        'd14a_kredit',
        'd14b_kredit',
        'd15_kredit',
        'e_kurangbayar',
        'e16_date_kurangbayar',
        'e16_jumlah_kurangbayar',
        'e17_kurangbayar',
        'f18_lebihbayar_kurangbayar',
        'f18_rupiah_kurangbayar',
        'g_lampiran',
        'pernyataan',
        'pernyataan_date',
        'pernyataan_nama_lengkap',
        'pernyataan_npwp',
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
