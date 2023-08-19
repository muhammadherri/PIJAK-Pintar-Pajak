<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fasilitas extends Model
{
    use SoftDeletes;
    public $table = 'tx_fasilitas';
    protected $fillable = [
        'id',
        'no',
        'jenis_fasilitas',
        'sertifikat',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
