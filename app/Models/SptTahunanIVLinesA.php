<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanIVLinesA extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_iv_line_a';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_penghasilan',
        'dasar_pengenaan_pajak',
        'potongan_tarif',
        'pph_terutang',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
