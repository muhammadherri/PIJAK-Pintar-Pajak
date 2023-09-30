<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanIIILines extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_iii_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'nama_npwp',
        'npwp',
        'jenis_transaksi',
        'biaya',
        'pajak_penghasilan',
        'bukti_no_pemotong',
        'tgl_bukti_pemotong',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
