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
            $table->string('kode_billing');
            $table->string('npwp');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('jenis_pajak');
            $table->string('kode_jenis_setoran');
            $table->integer('masa_pajak');
            $table->integer('tahun_pajak');
            $table->dateTime('start_periode_pajak');
            $table->dateTime('end_periode_pajak');
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->string('npwp_penyetor');
            $table->string('nama_penyetor');
            $table->string('no_ref');
            $table->integer('no_rek');
            $table->integer('perusahaan');
            $table->integer('akun');
            $table->integer('no_sk');
            $table->integer('nop');
            $table->string('ntpn');
            $table->integer('ntb');
            $table->integer('stan');
            $table->string('jenis_pembayaran');
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
