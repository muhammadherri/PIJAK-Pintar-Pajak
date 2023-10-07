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
        Schema::create('tx_formulir_1721_a_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('nomor');
            $table->dateTime('masa_perolehan');
            $table->string('npwp_pemotong');
            $table->string('nama_pemotong');
            $table->string('npwp_identitas');
            $table->string('nik_identitas');
            $table->string('nama_identitas');
            $table->string('alamat_identitas');
            $table->integer('jenis_kelamin_identitas');
            $table->integer('status_pernikahan');
            $table->float('status_tanggungan');
            $table->string('nama_jabatan');
            $table->integer('karyawan');
            $table->integer('kode_negara');
            $table->float('gaji_rincian');
            $table->float('tunjungan_pph_rincian');
            $table->float('tunjungan_rincian');
            $table->float('honorarium_rincian');
            $table->float('premi_asuransi_rincian');
            $table->float('natura_rincian');
            $table->float('tantiem_rincian');
            $table->float('jumlah_rincian');
            $table->float('biaya_jabatan_pengurangan');
            $table->float('iuran_pensiun_pengurangan');
            $table->float('jumlah_pengurangan');
            $table->float('jumlah_neto_penghitungan');
            $table->float('penghasilan_neto_penghitungan');
            $table->float('jumlah_penghasilan_neto_penghitungan');
            $table->float('ptkp_penghitungan');
            $table->float('pkp_penghitungan');
            $table->float('pkp_atas_penghitungan');
            $table->float('potongan_masa_penghitungan');
            $table->float('terutang_penghitungan');
            $table->float('terlunasi_penghitungan');
            $table->float('npwp_identitas_pemotong');
            $table->float('nama_identitas_pemotong');
            $table->float('tgl_identitas_pemotong');
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
        Schema::dropIfExists('tx_formulir_1721_a_head');
    }
};
