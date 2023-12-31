<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Vendor extends Model
{
    use SoftDeletes;
    public $table = 'tx_vendor';
    protected $fillable = [
        'id',
        'no_id_vendor',
        'nama_vendor',
        'alamat_vendor',
        'contact_person',
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
