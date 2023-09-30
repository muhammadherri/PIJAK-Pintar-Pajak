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
        Schema::create('tx_formulir_1771_iii_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('nama_npwp');
            $table->string('npwp');
            $table->string('jenis_transaksi');
            $table->string('biaya');
            $table->string('pajak_penghasilan');
            $table->string('bukti_no_pemotong');
            $table->dateTime('tgl_bukti_pemotong');
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
        Schema::dropIfExists('tx_formulir_1771_iii_line');
    }
};
