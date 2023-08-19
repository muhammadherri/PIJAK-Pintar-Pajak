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
        Schema::create('tx_billing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_akun_pajak');
            $table->string('kode_jenis_setoran');
            $table->string('npwp');
            $table->dateTime('start_periode_pajak');
            $table->dateTime('end_periode_pajak');
            $table->string('keterangan');
            $table->integer('jumlah');
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
        Schema::dropIfExists('tx_billing');
    }
};
