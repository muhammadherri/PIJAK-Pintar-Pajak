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
        Schema::create('tx_formulir_1721_ii_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->dateTime('masa_pajak');
            $table->string('npwp_pemotong');
            $table->float('jumlah_penghasilan_bruto');
            $table->integer('pph_yang_dipotong');
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
        Schema::dropIfExists('tx_formulir_1721_ii_head');
    }
};
