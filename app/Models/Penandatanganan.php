<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penandatanganan extends Model
{
    use SoftDeletes;
    public $table = 'tx_penandatanganan';
    protected $fillable = [
        'id',
        'name',
        'npwp',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];}
