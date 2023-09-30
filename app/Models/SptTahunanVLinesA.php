<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanVLinesA extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_v_line_a';
    protected $fillable = [
        'id',
        'formulir_id',
        'nama_pemegang_saham',
        'alamat_pemegang_saham',
        'no_npwp',
        'modal_setor_pemilik_saham',
        'modal_persen',
        'jumlah_dividen',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
