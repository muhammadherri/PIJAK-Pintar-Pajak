<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Vendor;

class Billing extends Model
{
    use SoftDeletes;
    public $table = 'tx_billing';
    protected $fillable = [
        'id',
        'kode_billing',
        'trx_bupot',
        'npwp',
        'nama',
        'alamat',
        'jenis_pajak',
        'kode_jenis_setoran',
        'masa_pajak',
        'tahun_pajak',
        'start_periode_pajak',
        'end_periode_pajak',
        'jumlah',
        'keterangan',
        'npwp_penyetor',
        'nama_penyetor',
        'no_ref',
        'no_rek',
        'perusahaan',
        'akun',
        'no_sk',
        'nop',
        'ntpn',
        'ntb',
        'stan',
        'jenis_pembayaran',
        'jenis_transaksi',
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
    public function vendor()
    {
        return $this->hasOne(Vendor::class,'id','no_rek');
    }
}