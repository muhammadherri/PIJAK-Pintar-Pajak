<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPajak extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_jenis_pajak';
    protected $fillable = [
        'id',
        'kode',
        'jenis_pajak',
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
