<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Neraca extends Model
{
    use SoftDeletes;
    public $table = 'tx_neraca';
    protected $fillable = [
        'id',
        'no_akun',
        'nama_akun',
        'saldo',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
