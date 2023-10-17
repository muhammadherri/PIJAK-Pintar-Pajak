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
        Schema::create('tx_hutang_ppn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trx');
            $table->float('jumlah_ppn_masuk')->nullable();
            $table->float('jumlah_ppn_keluar')->nullable();
            $table->float('hutang_ppn')->nullable();
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
        Schema::dropIfExists('tx_hutang_ppn');
    }
};
