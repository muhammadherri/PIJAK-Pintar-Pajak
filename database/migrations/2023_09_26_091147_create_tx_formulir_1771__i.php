<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tx_formulir_1771__i', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('jenis_spt');
            $table->integer('tahun_pajak'); 
            $table->string('npwp');
            $table->string('nama_npwp');
            $table->dateTime('start_periode_pembukuan');
            $table->dateTime('end_periode_pembukuan'); 
            $table->float('peredaran_usaha');
            $table->float('harga_pokok');
            $table->float('biaya_usaha_lain');
            $table->float('penghasilan_netto_dari_usaha');
            $table->float('penghasilan_dari_luar_usaha');
            $table->float('biaya_dari_luar_usaha');
            $table->float('penghasilan_netto_dari_luar_usaha');
            $table->float('jumlah_netto_komersial_dalam_negeri');
            $table->float('penghasilan_netto_luar_negeri');
            $table->float('jumlah_penghasilan_netto_komersial');
            $table->float('penghasilan');
            $table->float('biaya_dibebankan');
            $table->float('dana_cadangan');
            $table->float('natura');
            $table->float('jumlah_melebihi_kewajaran');
            $table->float('harta_dihibahkan');
            $table->float('pajak_penghasilan');
            $table->float('gaji_yang_dibayarkan');
            $table->float('sanksi_adm');
            $table->float('selisih_penyusutan_komersial');
            $table->float('selisih_amortisasi');
            $table->float('biaya_yang_ditangguhkan');
            $table->float('penyesuaian_fiskal');
            $table->float('jumlah_penyesuaian');
            $table->float('selisih_penyusutan_fiskal_negatif');
            $table->float('selisih_amortisasi_fiskal_negatif');
            $table->float('penghasilan_ditangguhkan');
            $table->float('penyesuaian_fiskal_fiskal_negatif');
            $table->float('jumlah_fiskal_negatif');
            $table->float('pengurangan_penghasilan_netto');
            $table->float('netto_fiskal');
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_formulir_1771__i_head');
    }
};
