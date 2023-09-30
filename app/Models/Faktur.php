<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faktur extends Model
{
    use SoftDeletes;
    public $table = 'tx_faktur_head';
    protected $fillable = [
        'id',
        'faktur_id',
        'pembeli',
        'jenis_dok',
        'dok_lain',
        'no_seri',
        'no_dok',
        'catatan',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
