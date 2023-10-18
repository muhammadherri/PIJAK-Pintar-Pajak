<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptPpnLineb2 extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_spt_ppn_line_b2';
    protected $fillable = [
       'id' ,
        'formulir_id' ,
        'nama_penjual_bkp' ,
        'npwp' ,
        'noseri' ,
        'tgl' ,
        'dpp' ,
        'ppn' ,
        'ppnbm' ,
        'kodeseri' ,
        'created_at' ,
        'updated_at' ,
        'deleted_at' ,
    ];
}
