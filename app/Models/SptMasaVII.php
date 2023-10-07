<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaVII extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_vii_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'nomor',
        'npwp_identitas',
        'nik_identitas',
        'nama_identitas',
        'alamat_identitas',
        'npwp_pemotong',
        'nama_pemotong',
        'tgl_pemotong',
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
