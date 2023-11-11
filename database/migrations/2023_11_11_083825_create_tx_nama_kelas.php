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
        Schema::create('tx_nama_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelas');
            $table->integer('attribute1')->nullable();
            $table->integer('attribute2')->nullable();
            $table->integer('attribute3')->nullable();
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
        Schema::dropIfExists('tx_nama_kelas');
    }
};
