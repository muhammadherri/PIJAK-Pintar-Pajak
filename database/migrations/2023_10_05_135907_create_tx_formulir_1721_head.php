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
        Schema::create('tx_formulir_1721_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('npwp');
            $table->string('nama');
            $table->string('ptkp');
            $table->string('alamat');
            $table->string('no_telp');
            $table->float('jumlah_penerima_penghasilan_b');
            $table->float('jumlah_penghasilan_bruto_b');
            $table->float('jumlah_pajak_dipotong_b');
            $table->float('pokok_pajak');
            $table->integer('masa_pajak_bulan');
            $table->integer('masa_pajak_tahun');
            $table->float('masa_pajak_pokok');
            $table->float('jumlah_objekpajak');
            $table->float('kurang_lebih_setor');
            $table->float('spt_dibetulkan');
            $table->float('spt_pembetulan');
            $table->dateTime('kompensasi');
            $table->string('npwp_pemotong');
            $table->float('jumlah_penerima_penghasilan_c');
            $table->float('jumlah_penghasilan_bruto_c');
            $table->float('jumlah_pajak_dipotong_c');
            $table->integer('lembar_formulir_1721I');
            $table->integer('lembar_formulir_1721II');
            $table->integer('lembar_formulir_1721III');
            $table->integer('lembar_formulir_1721IV');
            $table->integer('lembar_formulir_1721V');
            $table->integer('surat_setoran_pajak');
            $table->integer('surat_kuasa_khusus');
            $table->integer('pernyataan_ttd');
            $table->string('npwp_ttd');
            $table->string('nama_ttd');
            $table->dateTime('tanggal_ttd');
            $table->string('tempat_ttd');
            $table->string('attribute1');
            $table->string('attribute2');
            $table->string('attribute3');
            $table->timestamps();
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_formulir_1721_head');
    }
};
