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
        Schema::create('tx_pphduasatu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_npwp')->nullable();
            $table->string('nama_wajib_pajak')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('status_pernikahan')->nullable();
            $table->integer('tanggungan')->nullable();
            $table->dateTime('masa_penghasilan_start')->nullable();
            $table->dateTime('masa_penghasilan_end')->nullable();
            $table->integer('tunjangan_pajak')->nullable();
            $table->string('ketentuan_ptkp')->nullable();
            $table->integer('ketentuan_tarif')->nullable();
            $table->integer('gaji_pensiun')->nullable();
            $table->integer('tunjangan_pph')->nullable();
            $table->integer('tunjangan_lain')->nullable();
            $table->string('honorarium')->nullable();
            $table->string('premi_asuransi')->nullable();
            $table->string('natura')->nullable();
            $table->string('tantiem')->nullable();
            $table->integer('penghasilan_bruto')->nullable();
            $table->integer('biaya_jabatan')->nullable();
            $table->integer('tht_jht')->nullable();
            $table->integer('total_pengurangan')->nullable();
            $table->integer('penghasilan_netto')->nullable();
            $table->integer('netto_massa')->nullable();
            $table->integer('netto_setahun')->nullable();
            $table->integer('ptkp')->nullable();
            $table->integer('pkp')->nullable();
            $table->float('tarif1')->nullable();
            $table->float('tarif2')->nullable();
            $table->float('tarif3')->nullable();
            $table->float('tarif4')->nullable();
            $table->integer('pph21ataspkp')->nullable();
            $table->integer('pph21_dipotong_sebelumnya')->nullable();
            $table->integer('pph21_terutang')->nullable();
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
        Schema::dropIfExists('tx_pphduasatu');
    }
};
