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
        Schema::create('tx_spt_1770_s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('pembetulan');
            $table->string('npwp');
            $table->string('nama_npwp');
            $table->string('pekerjaan');
            $table->string('klu');
            $table->string('no_telp');
            $table->integer('no_faks');
            $table->integer('status_kewajiban');
            $table->string('npwp_pasangan');
            $table->float('a1_penghasil');
            $table->float('a2_penghasil');
            $table->float('a3_penghasil');
            $table->float('a4_penghasil');
            $table->float('a5_penghasil');
            $table->float('a6_penghasil');
            $table->integer('b7_kena_pajak');
            $table->float('b7_penghasil');
            $table->float('b8_penghasil');
            $table->float('c9_terutang');
            $table->float('c10_terutang');
            $table->float('c11_terutang');
            $table->float('d12_kredit');
            $table->integer('pph_dibayar');
            $table->float('d13_kredit');
            $table->float('d14a_kredit');
            $table->float('d14b_kredit');
            $table->float('d15_kredit');
            $table->integer('e_kurangbayar');
            $table->dateTime('e16_date_kurangbayar');
            $table->float('e16_jumlah_kurangbayar');
            $table->integer('e17_kurangbayar');
            $table->integer('f18_lebihbayar_kurangbayar');
            $table->float('f18_rupiah_kurangbayar');
            $table->integer('g_lampiran');
            $table->integer('pernyataan');
            $table->dateTime('pernyataan_date');
            $table->string('pernyataan_nama_lengkap');
            $table->string('pernyataan_npwp');
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
        Schema::dropIfExists('tx_spt_1770_s');
    }
};
