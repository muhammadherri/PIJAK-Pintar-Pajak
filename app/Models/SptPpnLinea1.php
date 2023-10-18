<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptPpnLinea1 extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_spt_ppn_line_a1';
    protected $fillable = [ 
       'id',
        'formulir_id',
        'nama_pembeli_bkp',
        'no_dok',
        'tgl_dok',
        'dpp',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
