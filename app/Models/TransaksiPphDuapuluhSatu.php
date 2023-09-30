<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Ptkp;
use App\Models\User;

class TransaksiPphDuapuluhSatu extends Model
{
    use SoftDeletes;
    public $table = 'tx_pphduasatu';
    protected $fillable = [
        'id',
        'status_npwp',
        'nama_wajib_pajak',
        'no_npwp',
        'status_pernikahan',
        'tanggungan',
        'masa_penghasilan_start',
        'masa_penghasilan_end',
        'tunjangan_pajak',
        'ketentuan_ptkp',
        'ketentuan_tarif',
        'gaji_pensiun',
        'tunjangan_pph',
        'tunjangan_lain',
        'honorarium',
        'premi_asuransi',
        'natura',
        'tantiem',
        'penghasilan_bruto',
        'biaya_jabatan',
        'tht_jht',
        'total_pengurangan',
        'penghasilan_netto',
        'netto_massa',
        'netto_setahun',
        'ptkp',
        'pkp',
        'tarif1',
        'tarif2',
        'tarif3',
        'tarif4',
        'pph21ataspkp',
        'pph21_dipotong_sebelumnya',
        'pph21_terutang',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function ptkp()
    {
        return $this->hasOne(Ptkp::class, 'kode_ptkp', 'status_pernikahan');
    }
    public function users()
    {
        return $this->hasOne(User::class, 'id', 'attribute1');
    }

}
