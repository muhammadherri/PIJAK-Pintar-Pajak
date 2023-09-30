<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Kodepajak extends Model
{
    use SoftDeletes;
    public $table = 'tx_kode_objek_pajak';
    protected $fillable = [
        'id',
        'kode_objek_pajak',
        'keterangan',
        'tarif',
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
