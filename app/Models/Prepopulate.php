<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Prepopulate extends Model
{
    use SoftDeletes;
    public $table = 'tx_prepopulate';
    protected $fillable = [
        'id',
        'masa_ppn',
        'tahun',
        'npwp',
        'nama_npwp',
        'alamat_npwp',
        'no_faktur',
        'jumlah_dpp',
        'jumlah_ppn',
        'keterangan',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','attribute1');
    }
}
