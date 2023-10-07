<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaLineB extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_line_b';
    protected $fillable = [
        'id',
        'formulir_id',
        'penerima_penghasilan',
        'kode_objek',
        'jumlah_penerima_penghasilan',
        'jumlah_penghasilan_bruto',
        'jumlah_pajak_dipotong',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
