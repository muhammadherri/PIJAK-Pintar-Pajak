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
        Schema::create('tx_formulir_1771_iv_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('jenis_spt');
            $table->integer('tahun_pajak'); 
            $table->string('npwp');
            $table->string('nama_npwp'); 
            $table->dateTime('start_periode_pembukuan');
            $table->dateTime('end_periode_pembukuan');
            $table->float('jumlah_dasar_pengenaan_pajak');
            $table->float('jumlah_potongan_tarif');
            $table->float('jumlah_pph_terutang');
            $table->float('jumlah_penghasilan_bruto');
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
        Schema::dropIfExists('tx_formulir_1771_iv_head');
    }
};
