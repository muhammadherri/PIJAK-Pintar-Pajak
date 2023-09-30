<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanVLinesB extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_v_line_b';
    protected $fillable = [
        'id',
        'formulir_id',
        'nama_pengurus_saham',
        'alamat_pengurus_saham',
        'no_npwp',
        'jabatan_pengurus',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
