<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanVILinesC extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_vi_line_c';
    protected $fillable = [
        'id',
        'formulir_id',
        'nama_peminjam_saham',
        'no_npwp_peminjam_saham',
        'jumlah_pinjaman',
        'tahun_pinjaman',
        'bunga_pinjaman',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
