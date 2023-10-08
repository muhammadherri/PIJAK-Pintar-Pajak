<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Fasilitas;

class Ebupot extends Model
{
    use SoftDeletes;
    public $table = 'tx_ebupot_head';
    protected $fillable = [
        'id',
        'ebupot_id',
        'trx',
        'jenis_pph',
        'pilih_transaksi',
        'no_tlp',
        'fasilitas',
        'tanggal_bukti_potong',
        'periode_pajak',
        'kode_objek_pajak',
        'jumlah_bruto',
        'tarif',
        'potongan_pph',
        'penandatanganan',
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
    public function fasilitases()
    {
        return $this->hasOne(Fasilitas::class,'id','fasilitas');
    }
}
