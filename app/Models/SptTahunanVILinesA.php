<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanVILinesA extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_vi_line_a';
    protected $fillable = [
        'id',
        'formulir_id',
        'nama_perusahaan_afiliasi',
        'alamat_perusahaan_afiliasi',
        'no_npwp',
        'modal_setor',
        'persen',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
