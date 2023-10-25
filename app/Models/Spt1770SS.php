<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Spt1770SS extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_spt1770ss';
    protected $fillable = [
        'id',
        'formulir_id',
        'tahun_pajak',
        'spt_pembetulan',
        'id_npwp',
        'id_nama_npwp',
        'a1_pajak',
        'a2_pajak',
        'a3_pajak_dd',
        'a3_pajak',
        'a4_pajak',
        'a5_pajak',
        'a6_pajak',
        'a7_pajak',
        'a7_jumlah_pajak',
        'b8_penghasilan',
        'b9_penghasilan',
        'b10_penghasilan',
        'c11_daftar',
        'c12_daftar',
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
