<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class PphBadanTahunan extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_pph_badan_tahunan';
    protected $fillable = [
        'id',
        'trx',
        'dasar_pengenaan_pajak',
        'pph_terutang',
        'mendapat_fasilitas',
        'tidak_mendapat_fasilitas',
        'dpp',
        'jumlah_pph_terutang',
        'attribute1',
        'attribute2',
        'attribute3',
        'attribute4',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
