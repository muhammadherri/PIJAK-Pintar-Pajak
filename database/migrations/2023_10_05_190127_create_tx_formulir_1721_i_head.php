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
        Schema::create('tx_formulir_1721_i_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->dateTime('masa_pajak');
            $table->integer('daftar_potongan');
            $table->string('npwp_pemotong');
            $table->float('jumlah_penghasilan_bruto');
            $table->float('jumlah_pph_dipotong');
            $table->float('jht_penghasilan_bruto');
            $table->float('jumlah_total');
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
        Schema::dropIfExists('tx_formulir_1721_i_head');
    }
};
