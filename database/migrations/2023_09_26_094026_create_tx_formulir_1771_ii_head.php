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
        Schema::create('tx_formulir_1771_ii_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('jenis_spt');
            $table->integer('tahun_pajak'); 
            $table->string('npwp');
            $table->string('nama_npwp');
            $table->dateTime('start_periode_pembukuan');
            $table->dateTime('end_periode_pembukuan');
            $table->float('sub_harga_pokok');
            $table->float('sub_biaya_usaha');
            $table->float('sub_biaya_luar_usaha');
            $table->float('total_jumlah_biaya');
            $table->string('attribute1')->nullable();
            $table->string('attribute2')->nullable();
            $table->string('attribute3')->nullable(); 
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
        Schema::dropIfExists('tx_formulir_1771_ii_head');
    }
};
