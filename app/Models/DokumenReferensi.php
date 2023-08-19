<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenReferensi extends Model
{
    use SoftDeletes;
    public $table = 'tx_dok_ref';
    protected $fillable = [
        'id',
        'no',
        'jenis_dokumen',
        'sertifikat',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
