<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Top extends Model
{
    use SoftDeletes;
    public $table = 'tx_top';
    protected $fillable = [
        'id',
        'jenis_termin',
        'keterangan_termin',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
