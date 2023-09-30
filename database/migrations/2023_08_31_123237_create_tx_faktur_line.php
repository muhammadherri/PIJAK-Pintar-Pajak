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
        Schema::create('tx_faktur_line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faktur_id');
            $table->integer('nama_barang');
            $table->float('kuantitas');
            $table->float('harga_satuan');
            $table->float('total_diskon');
            $table->float('total_harga');
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
        Schema::dropIfExists('tx_faktur_line');
    }
};
