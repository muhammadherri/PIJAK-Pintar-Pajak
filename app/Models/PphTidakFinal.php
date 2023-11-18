<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\KodeObjekPPhTidakFinal;

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
        'tarif1',
        'tarif2',
        'tarif3',
        'tarif4',
        'persen1',
        'persen2',
        'persen3',
        'persen4',
        'hasil1',
        'hasil2',
        'hasil3',
        'hasil4',
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
    public function koptfinal()
    {
        return $this->hasOne(KodeObjekPPhTidakFinal::class,'id','kode_objek_pajak');
    }
}
