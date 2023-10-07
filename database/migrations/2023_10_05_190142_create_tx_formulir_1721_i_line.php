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
        Schema::create('tx_formulir_1721_i_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('npwp_pegawai');
            $table->string('nama_pegawai');
            $table->integer('no_bukti_pemotongan');
            $table->dateTime('tgl_bukti_pemotongan');
            $table->integer('kode_objek_pajak');
            $table->float('jumlah_penghasilan_bruto');
            $table->float('pph_dipotong');
            $table->float('masa_perolehan_penghasilan');
            $table->integer('kode_negara');
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
        Schema::dropIfExists('tx_formulir_1721_i_line');
    }
};
