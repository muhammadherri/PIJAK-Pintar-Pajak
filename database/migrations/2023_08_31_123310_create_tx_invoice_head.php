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
        Schema::create('tx_invoice_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('pembeli');
            $table->string('no_faktur');
            $table->dateTime('tgl_faktur');
            $table->dateTime('jatuh_tempo');
            $table->integer('termin_pembayaran');
            $table->float('nilai_transaksi');
            $table->float('potongan_harga');
            $table->float('ppn')->nullable();
            $table->float('total')->nullable();
            $table->string('catatan');
            $table->string('informasi_pembayaran');
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
        Schema::dropIfExists('tx_invoice_head');
    }
};
