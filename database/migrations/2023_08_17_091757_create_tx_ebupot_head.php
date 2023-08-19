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
        Schema::create('tx_ebupot_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ebupot_id');
            $table->string('jenis_pph');
            $table->string('pilih_transaksi');
            $table->integer('no_tlp');
            $table->string('fasilitas');
            $table->dateTime('tanggal_bukti_potong')->nullable();
            $table->dateTime('periode_pajak')->nullable();
            $table->string('kode_objek_pajak');
            $table->integer('jumlah_bruto');
            $table->integer('tarif');
            $table->integer('potongan_pph');
            $table->string('penandatanganan');
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
        Schema::dropIfExists('tx_ebupot_head');
    }
};
