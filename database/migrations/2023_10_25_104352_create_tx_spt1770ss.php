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
        Schema::create('tx_spt1770ss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('tahun_pajak');
            $table->integer('spt_pembetulan');
            $table->string('id_npwp');
            $table->string('id_nama_npwp');
            $table->float('a1_pajak');
            $table->float('a2_pajak');
            $table->integer('a3_pajak_dd');
            $table->float('a3_pajak');
            $table->float('a4_pajak');
            $table->float('a5_pajak');
            $table->float('a6_pajak');
            $table->integer('a7_pajak');
            $table->float('a7_jumlah_pajak');
            $table->float('b8_penghasilan');
            $table->float('b9_penghasilan');
            $table->float('b10_penghasilan');
            $table->float('c11_daftar');
            $table->float('c12_daftar');
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
        Schema::dropIfExists('tx_spt1770ss');
    }
};
