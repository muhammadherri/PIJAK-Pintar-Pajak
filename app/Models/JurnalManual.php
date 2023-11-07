<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Neraca;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class JurnalManual extends Model
{
    use SoftDeletes;
    public $table = 'tx_jurnal_manual';
    protected $fillable = [
        'id',
        'no_akun_debit',
        'no_akun_kredit',
        'nama_akun_debit',
        'nama_akun_kredit',
        'keterangan',
        'nilai_debit',
        'nilai_kredit',
        'attribute1',
        'attribute2',
        'attribute3',
        'attribute4',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users(){
        return $this->hasOne(User::class,'id','attribute1');
    }
    public function neraca(){
        return $this->hasOne(Neraca::class,'id','no_akun_debit');
    }
}
