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
        Schema::create('tx_formulir_1721_v_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->dateTime('masa_pajak');
            $table->string('npwp_pemotong');
            $table->float('gaji');
            $table->float('biaya_transport');
            $table->float('biaya_penyusutan');
            $table->float('biaya_sewa');
            $table->float('biaya_bunga_pinjaman');
            $table->float('biaya_jasa');
            $table->float('biaya_piutang');
            $table->float('biaya_royalti');
            $table->float('biaya_pemasaran');
            $table->float('biaya_lain');
            $table->float('jumlah');
            $table->string('attribute1');
            $table->string('attribute2');
            $table->string('attribute3');
            $table->timestamps();
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_formulir_1721_v_head');
    }
};
