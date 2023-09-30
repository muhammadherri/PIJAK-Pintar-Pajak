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
        Schema::create('tx_jurnal_manual', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_akun_debit');
            $table->integer('no_akun_kredit');
            $table->integer('nama_akun_debit');
            $table->integer('nama_akun_kredit');
            $table->string('keterangan');
            $table->float('nilai_debit');
            $table->float('nilai_kredit');
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
        Schema::dropIfExists('tx_jurnal_manual');
    }
};
