<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use SoftDeletes;
    public $table = 'tx_billing';
    protected $fillable = [
        'id',
        'billing_id',
        'kode_akun_pajak',
        'kode_jenis_setoran',
        'npwp',
        'start_periode_pajak',
        'end_periode_pajak',
        'keterangan',
        'jumlah',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];}
