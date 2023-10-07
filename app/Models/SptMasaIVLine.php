<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaIVLine extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_iv_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'masa_pajak',
        'npwp_pemotong',
        'jumlah_pph_yang_disetor',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
