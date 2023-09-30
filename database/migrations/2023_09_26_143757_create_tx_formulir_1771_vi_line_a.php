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
        Schema::create('tx_formulir_1771_vi_line_a', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->string('nama_perusahaan_afiliasi');
            $table->string('alamat_perusahaan_afiliasi');
            $table->string('no_npwp');
            $table->float('modal_setor');
            $table->integer('persen');
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
        Schema::dropIfExists('tx_formulir_1771_vi_line_a');
    }
};
