<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceLine extends Model
{
    use SoftDeletes;
    public $table = 'tx_invoice_line';
    protected $fillable = [
        'id',
        'invoice_id',
        'nama_barang',
        'kuantitas',
        'harga_satuan',
        'total_diskon',
        'total_harga',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
