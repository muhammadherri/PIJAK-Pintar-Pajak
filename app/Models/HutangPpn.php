<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class HutangPpn extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_hutang_ppn';
    protected $fillable = [
        'id',
        'trx',
        'jumlah_ppn_masuk',
        'jumlah_ppn_keluar',
        'hutang_ppn',
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
