<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaIILine extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_ii_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'npwp_pemotong',
        'nama_pemotong',
        'no_bukti_pemotong',
        'tgl_bukti_pemotong',
        'kode_objek_pajak',
        'jumlah_penghasilan_bruto',
        'jumlah_pph_yang_dipotong',
        'kode_negara',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
