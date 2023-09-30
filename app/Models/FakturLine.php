<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FakturLine extends Model
{
    use SoftDeletes;
    public $table = 'tx_faktur_line';
    protected $fillable = [
        'id',
        'faktur_id',
        'nama_barang',
        'kuantitas',
        'harga_satuan',
        'total_diskon',
        'total_harga',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
