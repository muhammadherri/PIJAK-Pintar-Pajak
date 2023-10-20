<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class PphTidakFinal extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_pph_tidak_final';
    protected $fillable = [
        'id',
        'trx',
        'kode_objek_pajak',
        'bruto',
        'dasar_pengenaan_pajak',
        'tarif_lebih_tinggi',
        'tarif',
        'potongan_pph',
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
