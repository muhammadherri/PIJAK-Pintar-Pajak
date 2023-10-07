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
        Schema::create('tx_formulir_1721_iv_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->dateTime('masa_pajak');
            $table->string('npwp_pemotong');
            $table->float('jumlah_pph_yang_disetor');
            $table->string('keterangan');
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
        Schema::dropIfExists('tx_formulir_1721_iv_line');
    }
};
