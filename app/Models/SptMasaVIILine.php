<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class SptMasaVIILine extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1721_vii_line';
    protected $fillable = [
        'id',
        'formulir_id',
        'kode_objek_pajak',
        'jumlah_penghasilan_bruto',
        'tarif',
        'pph',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
