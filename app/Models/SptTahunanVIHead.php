<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanVIHead extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_vi_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_spt',
        'tahun_pajak',
        'npwp',
        'nama_npwp',
        'start_periode_pembukuan',
        'end_periode_pembukuan',
        'jumlah_modal_setor_pemilik_saham',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
