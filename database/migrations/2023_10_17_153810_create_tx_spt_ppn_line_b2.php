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
        Schema::create('tx_spt_ppn_line_b2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('nama_penjual_bkp');
            $table->string('npwp');
            $table->integer('noseri');
            $table->dateTime('tgl');
            $table->float('dpp');
            $table->float('ppn');
            $table->float('ppnbm');
            $table->integer('kodeseri');
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
        Schema::dropIfExists('tx_spt_ppn_line_b2');
    }
};
