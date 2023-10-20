<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Pphfinal extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_pph_final';
    protected $fillable = [
        'id',
        'transaksi',
        'kode_objek_pajak',
        'bruto',
        'tarif',
        'potongan_pph',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
