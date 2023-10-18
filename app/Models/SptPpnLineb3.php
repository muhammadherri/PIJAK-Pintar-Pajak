<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptPpnLineb3 extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_spt_ppn_line_b3';
    protected $fillable = [
        'id',
        'formulir_id',
        'nama_penjual_bkp',
        'npwp',
        'seri',
        'tgl',
        'dpp',
        'ppn',
        'ppnbm',
        'kodeseri',
        'deleted_at',
    ];
}
