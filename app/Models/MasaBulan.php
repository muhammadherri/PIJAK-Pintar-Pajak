<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasaBulan extends Model
{
    use HasFactory;
    public $table = 'tx_masa_bulan';
    protected $fillable = [
        'id',
        'nama_bulan',
        'value',
        'created_at',
        'updated_at',
    ];
}
