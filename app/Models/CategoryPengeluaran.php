<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPengeluaran extends Model
{
    use SoftDeletes;
    public $table = 'categories_pengeluaran';
    protected $fillable = [
        'id',
        'sewa_kos',
        'makan',
        'pakaian',
        'nonton',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
