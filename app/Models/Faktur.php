<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Invoice;

class Faktur extends Model
{
    use SoftDeletes;
    public $table = 'tx_faktur_head';
    protected $fillable = [
        'id',
        'faktur_id',
        'pembeli',
        'jenis_dok',
        'dok_lain',
        'no_seri',
        'no_dok',
        'nilai_transaksi_fktr',
        'potongan_harga_fktr',
        'ppn_fktr',
        'total_fktr',
        'catatan',
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
    public function inv(){
        return $this->hasOne(Invoice::class,'invoice_id','faktur_id');
    }
}
