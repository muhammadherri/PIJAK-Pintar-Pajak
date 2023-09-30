<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanIILines extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_ii_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'perincian_pembelian_barang',
        'harga_pokok',
        'biaya_usaha',
        'biaya_luar_usaha',
        'sub_jumlah_biaya',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
