<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaILine extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_i_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'npwp_pegawai',
        'nama_pegawai',
        'no_bukti_pemotongan',
        'tgl_bukti_pemotongan',
        'kode_objek_pajak',
        'jumlah_penghasilan_bruto',
        'pph_dipotong',
        'masa_perolehan_penghasilan',
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
