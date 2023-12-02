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
        Schema::create('tx_pph_badan_tahunan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trx');
            $table->float('dasar_pengenaan_pajak');
            $table->integer('pph_terutang');
            $table->float('mendapat_fasilitas');
            $table->float('tidak_mendapat_fasilitas');
            $table->float('dpp');
            $table->float('jumlah_pph_terutang');
            $table->integer('atrribute1')->nullable();
            $table->integer('atrribute2')->nullable();
            $table->integer('atrribute3')->nullable();
            $table->integer('atrribute4')->nullable();
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
        Schema::dropIfExists('tx_pph_badan_tahunan');
    }
};
