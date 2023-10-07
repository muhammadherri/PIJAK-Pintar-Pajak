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
        Schema::create('tx_formulir_1721_b_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('nomor');
            $table->dateTime('masa_perolehan');
            $table->string('nama_instansi');
            $table->string('nama_bendahara');
            $table->string('npwp_bendahara');
            $table->string('npwp_identitas');
            $table->string('nip_identitas');
            $table->string('nama_penerima_identitas');
            $table->string('pangkat_identitas');
            $table->string('alamat_identitas');
            $table->integer('jenis_kelamin_identitas');
            $table->integer('nik_identitas');
            $table->integer('status_pernikahan_identitas');
            $table->float('status_jumlah_identitas');
            $table->string('jabatan_identitas');
            $table->integer('kode_objek_rincian');
            $table->float('gaji_pokok_rincian');
            $table->float('tunjangan_istri_rincian');
            $table->float('tunjangan_anak_rincian');
            $table->float('tunjangan_keluarga_rincian');
            $table->float('tunjangan_perbaikan_rincian');
            $table->float('tunjangan_struktural_rincian');
            $table->float('tunjangan_beras_rincian');
            $table->float('tunjangan_khusus_rincian');
            $table->float('tunjangan_lain_rincian');
            $table->float('penghasilan_tetap_rincian');
            $table->float('jumlah_bruto_rincian');
            $table->float('biaya_jabatan_pengurangan');
            $table->float('iuran_pensiun_pengurangan');
            $table->float('jumlah_pengurangan');
            $table->float('jumlah_penghasilan_neto_penghitung');
            $table->float('jumlah_penghasilan_neto_masa_penghitung');
            $table->float('jumlah_penghasilan_penghitung');
            $table->float('ptkp_penghitung');
            $table->float('pkp_penghitung');
            $table->float('pkp_setahun_penghitung');
            $table->float('potongan_masa_penghitung');
            $table->float('terutang_penghitung');
            $table->float('dilunasi_gaji_penghitung');
            $table->float('dilunasi_tetap_penghitung');
            $table->integer('status_pegawai');
            $table->string('npwp_ttd');
            $table->string('nama_ttd');
            $table->integer('nip_ttd');
            $table->dateTime('tgl_ttd');
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
        Schema::dropIfExists('tx_formulir_1721_b_head');
    }
};
