<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SptTahunanIIHead extends Model
{
    use HasFactory,SoftDeletes;
    public $table = 'tx_formulir_1771_ii_head';
    protected $fillable = [
        'id',
        'formulir_id',
        'jenis_spt',
        'tahun_pajak',
        'npwp',
        'nama_npwp',
        'start_periode_pembukuan',
        'end_periode_pembukuan',
        'hpp1_1771ii',
        'hpp2_1771ii',
        'hpp3_1771ii',
        'hpp4_1771ii',
        'hpp5_1771ii',
        'hpp6_1771ii',
        'hpp7_1771ii',
        'hpp8_1771ii',
        'hpp9_1771ii',
        'hpp10_1771ii',
        'hpp11_1771ii',
        'hpp12_1771ii',
        'hpp13_1771ii',
        'hpp14_1771ii',
        'biayausaha1_1771ii',
        'biayausaha2_1771ii',
        'biayausaha3_1771ii',
        'biayausaha4_1771ii',
        'biayausaha5_1771ii',
        'biayausaha6_1771ii',
        'biayausaha7_1771ii',
        'biayausaha8_1771ii',
        'biayausaha9_1771ii',
        'biayausaha10_1771ii',
        'biayausaha11_1771ii',
        'biayausaha12_1771ii',
        'biayausaha13_1771ii',
        'biayausaha14_1771ii',
        'biayaluarusaha1_1771ii',
        'biayaluarusaha2_1771ii',
        'biayaluarusaha3_1771ii',
        'biayaluarusaha4_1771ii',
        'biayaluarusaha5_1771ii',
        'biayaluarusaha6_1771ii',
        'biayaluarusaha7_1771ii',
        'biayaluarusaha8_1771ii',
        'biayaluarusaha9_1771ii',
        'biayaluarusaha10_1771ii',
        'biayaluarusaha11_1771ii',
        'biayaluarusaha12_1771ii',
        'biayaluarusaha13_1771ii',
        'biayaluarusaha14_1771ii',
        'jumlah1_1771ii',
        'jumlah2_1771ii',
        'jumlah3_1771ii',
        'jumlah4_1771ii',
        'jumlah5_1771ii',
        'jumlah6_1771ii',
        'jumlah7_1771ii',
        'jumlah8_1771ii',
        'jumlah9_1771ii',
        'jumlah10_1771ii',
        'jumlah11_1771ii',
        'jumlah12_1771ii',
        'jumlah13_1771ii',
        'jumlah14_1771ii',
        'attribute1',
        'attribute2',
        'attribute3',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
   
}
