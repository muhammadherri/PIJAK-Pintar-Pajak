<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaI extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_i_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'masa_pajak',
        'daftar_potongan',
        'npwp_pemotong',
        'jumlah_penghasilan_bruto',
        'jumlah_pph_dipotong',
        'jht_penghasilan_bruto',
        'jumlah_total',
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
