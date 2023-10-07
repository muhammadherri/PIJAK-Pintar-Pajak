<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaIIILine extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_iii_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'nomor_npwp_pemotong',
        'nama_npwp_pemotong',
        'nomor_bukti_pemotong',
        'tgl_bukti_pemotong',
        'kode_objek_pajak',
        'jumlah_penghasilan_bruto',
        'pph_yang_dipotong',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
