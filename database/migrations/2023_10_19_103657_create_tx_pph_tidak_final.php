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
        Schema::create('tx_pph_tidak_final', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trx');
            $table->string('kode_objek_pajak');
            $table->float('bruto');
            $table->float('dasar_pengenaan_pajak');
            $table->integer('tarif_lebih_tinggi');
            $table->integer('tarif');
            $table->float('potongan_pph');
            $table->integer('attribute1')->nullable();
            $table->integer('attribute2')->nullable();
            $table->integer('attribute3')->nullable();
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
        Schema::dropIfExists('tx_pph_tidak_final');
    }
};
