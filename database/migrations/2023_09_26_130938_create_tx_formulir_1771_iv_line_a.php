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
        Schema::create('tx_formulir_1771_iv_line_a', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('jenis_penghasilan');
            $table->string('dasar_pengenaan_pajak');
            $table->string('potongan_tarif');
            $table->string('pph_terutang');
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
        Schema::dropIfExists('tx_formulir_1771_iv_line_a');
    }
};
