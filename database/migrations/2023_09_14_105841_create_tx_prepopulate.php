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
        Schema::create('tx_prepopulate', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('masa_ppn');
            $table->float('tahun');
            $table->string('npwp');
            $table->string('nama_npwp');
            $table->string('alamat_npwp');
            $table->integer('no_faktur');
            $table->integer('jumlah_dpp');
            $table->integer('jumlah_ppn');
            $table->string('keterangan');
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
        Schema::dropIfExists('tx_prepopulate');
    }
};
