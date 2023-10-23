<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AkunTest extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_akun_test';
    protected $fillable = [
        'id',
        'no_akun',
        'nama_akun',
        'keterangan',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
