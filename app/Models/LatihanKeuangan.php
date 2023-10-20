<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class LatihanKeuangan extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_latihan_keuangan';
    protected $fillable = [
        'id',
        'no_akun',
        'nama_akun',
        'saldo',
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
