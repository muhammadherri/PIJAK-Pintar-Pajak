<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
class SptMasa extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'npwp',
        'nama',
        'ptkp',
        'alamat',
        'no_telp',
        'alamat_objekpajak',
        'jumlah_penerima_penghasilan_b',
        'jumlah_penghasilan_bruto_b',
        'jumlah_pajak_dipotong_b',
        'pokok_pajak',
        'masa_pajak_bulan',
        'masa_pajak_tahun',
        'masa_pajak_pokok',
        'jumlah_objekpajak',
        'kurang_lebih_setor',
        'spt_dibetulkan',
        'spt_pembetulan',
        'kompensasi',
        'npwp_pemotong',
        'jumlah_penerima_penghasilan_c',
        'jumlah_penghasilan_bruto_c',
        'jumlah_pajak_dipotong_c',
        'lembar_formulir_1721I',
        'lembar_formulir_1721II',
        'lembar_formulir_1721III',
        'lembar_formulir_1721IV',
        'lembar_formulir_1721V',
        'surat_setoran_pajak',
        'surat_kuasa_khusus',
        'pernyataan_ttd',
        'npwp_ttd',
        'nama_ttd',
        'tanggal_ttd',
        'tempat_ttd',
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
