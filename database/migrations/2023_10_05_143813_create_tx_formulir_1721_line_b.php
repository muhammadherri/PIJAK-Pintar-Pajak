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
        Schema::create('tx_formulir_1721_line_b', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('penerima_penghasilan');
            $table->dateTime('kode_objek');
            $table->float('jumlah_penerima_penghasilan');
            $table->float('jumlah_penghasilan_bruto');
            $table->float('jumlah_pajak_dipotong');
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
        Schema::dropIfExists('tx_formulir_1721_line_a');
    }
};
