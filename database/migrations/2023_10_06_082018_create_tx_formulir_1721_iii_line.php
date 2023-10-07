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
        Schema::create('tx_formulir_1721_iii_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('nomor_npwp_pemotong');
            $table->string('nama_npwp_pemotong');
            $table->string('nomor_bukti_pemotong');
            $table->dateTime('tgl_bukti_pemotong');
            $table->integer('kode_objek_pajak');
            $table->float('jumlah_penghasilan_bruto');
            $table->integer('pph_yang_dipotong');
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
        Schema::dropIfExists('tx_formulir_1721_iii_line');
    }
};
