<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Ptkp extends Model
{
    
    use SoftDeletes;
    public $table = 'tx_ptkp';
    protected $fillable = [
        'id',
        'status_pernikahan',
        'tanggungan',
        'besaran_ptkp',
        'kode_ptkp',
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
