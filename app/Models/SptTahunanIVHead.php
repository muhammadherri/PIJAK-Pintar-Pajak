<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanIVHead extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_iv_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_spt',
        'tahun_pajak',
        'npwp',
        'nama_npwp',
        'start_periode_pembukuan',
        'end_periode_pembukuan',
        'jumlah_dasar_pengenaan_pajak',
        'jumlah_potongan_tarif',
        'jumlah_pph_terutang',
        'jumlah_penghasilan_bruto',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at ',
        'deleted_at ',
    ];
}
