<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaII extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_ii_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'masa_pajak',
        'npwp_pemotong',
        'jumlah_penghasilan_bruto',
        'pph_yang_dipotong',
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
