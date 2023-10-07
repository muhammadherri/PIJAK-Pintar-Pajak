<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaV extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_v_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'masa_pajak',
        'npwp_pemotong',
        'gaji',
        'biaya_transport',
        'biaya_penyusutan',
        'biaya_sewa',
        'biaya_bunga_pinjaman',
        'biaya_jasa',
        'biaya_piutang',
        'biaya_royalti',
        'biaya_pemasaran',
        'biaya_lain',
        'jumlah',
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
