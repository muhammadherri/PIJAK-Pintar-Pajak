<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Vendor;

class Invoice extends Model
{
    use SoftDeletes;
    public $table = 'tx_invoice_head';
    protected $fillable = [
        'id',
        'invoice_id',
        'pembeli',
        'no_faktur',
        'tgl_faktur',
        'jatuh_tempo',
        'termin_pembayaran',
        'nilai_transaksi',
        'potongan_harga',
        'total',
        'catatan',
        'informasi_pembayaran',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function vendor(){
        return $this->hasOne(Vendor::class,'id','pembeli');
    }
    public function users(){
        return $this->hasOne(User::class,'id','attribute1');
    }
}
