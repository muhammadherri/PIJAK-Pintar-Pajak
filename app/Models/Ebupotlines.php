<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ebupotlines extends Model
{
    use SoftDeletes;
    public $table = 'tx_ebupot_lines';
    protected $fillable = [
        'id',
        'ebupot_id',
        'dok_ref',
        'no_dok',
        'tgl_doc',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];}
