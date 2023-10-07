<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaB extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_b_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'nomor',
        'masa_perolehan',
        'nama_instansi',
        'nama_bendahara',
        'npwp_bendahara',
        'npwp_identitas',
        'nip_identitas',
        'nama_penerima_identitas',
        'pangkat_identitas',
        'alamat_identitas',
        'jenis_kelamin_identitas',
        'nik_identitas',
        'status_pernikahan_identitas',
        'status_jumlah_identitas',
        'jabatan_identitas',
        'kode_objek_rincian',
        'gaji_pokok_rincian',
        'tunjangan_istri_rincian',
        'tunjangan_anak_rincian',
        'tunjangan_keluarga_rincian',
        'tunjangan_perbaikan_rincian',
        'tunjangan_struktural_rincian',
        'tunjangan_beras_rincian',
        'tunjangan_khusus_rincian',
        'tunjangan_lain_rincian',
        'penghasilan_tetap_rincian',
        'jumlah_bruto_rincian',
        'biaya_jabatan_pengurangan',
        'iuran_pensiun_pengurangan',
        'jumlah_pengurangan',
        'jumlah_penghasilan_neto_penghitung',
        'jumlah_penghasilan_neto_masa_penghitung',
        'jumlah_penghasilan_penghitung',
        'ptkp_penghitung',
        'pkp_penghitung',
        'pkp_setahun_penghitung',
        'potongan_masa_penghitung',
        'terutang_penghitung',
        'dilunasi_gaji_penghitung',
        'dilunasi_tetap_penghitung',
        'status_pegawai',
        'npwp_ttd',
        'nama_ttd',
        'nip_ttd',
        'tgl_ttd',
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
