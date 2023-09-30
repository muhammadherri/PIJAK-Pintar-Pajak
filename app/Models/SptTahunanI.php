<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptTahunanI extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771__i';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_spt',
        'tahun_pajak',
        'npwp',
        'nama_npwp',
        'start_periode_pembukuan',
        'end_periode_pembukuan',
        'peredaran_usaha',
        'harga_pokok',
        'biaya_usaha_lain',
        'penghasilan_netto_dari_usaha',
        'penghasilan_dari_luar_usaha',
        'biaya_dari_luar_usaha',
        'penghasilan_netto_dari_luar_usaha',
        'jumlah_netto_komersial_dalam_negeri',
        'penghasilan_netto_luar_negeri',
        'jumlah_penghasilan_netto_komersial',
        'penghasilan',
        'biaya_dibebankan',
        'dana_cadangan',
        'natura',
        'jumlah_melebihi_kewajaran',
        'harta_dihibahkan',
        'pajak_penghasilan',
        'gaji_yang_dibayarkan',
        'sanksi_adm',
        'selisih_penyusutan_komersial',
        'selisih_amortisasi',
        'biaya_yang_ditangguhkan',
        'penyesuaian_fiskal',
        'jumlah_penyesuaian',
        'selisih_penyusutan_fiskal_negatif',
        'selisih_amortisasi_fiskal_negatif',
        'penghasilan_ditangguhkan',
        'penyesuaian_fiskal_fiskal_negatif',
        'jumlah_fiskal_negatif',
        'pengurangan_penghasilan_netto',
        'netto_fiskal',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
