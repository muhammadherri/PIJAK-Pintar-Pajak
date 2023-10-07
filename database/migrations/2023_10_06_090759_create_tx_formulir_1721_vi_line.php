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
        Schema::create('tx_formulir_1721_vi_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('kode_objek_pajak');
            $table->float('jumlah_penghasilan_bruto');
            $table->integer('dasar_pengenaan_pajak');
            $table->integer('tarif');
            $table->integer('potongan');
            $table->integer('potongan_pph');
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
        Schema::dropIfExists('tx_formulir_1721_vi_line');
    }
};
