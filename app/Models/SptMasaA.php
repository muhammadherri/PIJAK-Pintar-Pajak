<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaA extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_a_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'nomor',
        'masa_perolehan',
        'npwp_pemotong',
        'nama_pemotong',
        'npwp_identitas',
        'nik_identitas',
        'nama_identitas',
        'alamat_identitas',
        'jenis_kelamin_identitas',
        'status_pernikahan',
        'status_tanggungan',
        'nama_jabatan',
        'karyawan',
        'kode_negara',
        'gaji_rincian',
        'tunjungan_pph_rincian',
        'tunjungan_rincian',
        'honorarium_rincian',
        'premi_asuransi_rincian',
        'natura_rincian',
        'tantiem_rincian',
        'jumlah_rincian',
        'biaya_jabatan_pengurangan',
        'iuran_pensiun_pengurangan',
        'jumlah_pengurangan',
        'jumlah_neto_penghitungan',
        'penghasilan_neto_penghitungan',
        'jumlah_penghasilan_neto_penghitungan',
        'ptkp_penghitungan',
        'pkp_penghitungan',
        'pkp_atas_penghitungan',
        'potongan_masa_penghitungan',
        'terutang_penghitungan',
        'terlunasi_penghitungan',
        'npwp_identitas_pemotong',
        'nama_identitas_pemotong',
        'tgl_identitas_pemotong',
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
