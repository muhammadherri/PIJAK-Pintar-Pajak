<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanIVLinesB extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_iv_line_b';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_penghasilan',
        'penghasilan_bruto',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
