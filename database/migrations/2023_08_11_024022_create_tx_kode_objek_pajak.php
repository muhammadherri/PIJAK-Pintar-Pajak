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
        Schema::create('tx_kode_objek_pajak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_objek_pajak');
            $table->string('keterangan');
            $table->integer('tarif');
            $table->string('attribute1');
            $table->string('attribute2');
            $table->string('attribute3');
            $table->timestamps();
            $table->dateTime('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_kode_objek_pajak');
    }
};
