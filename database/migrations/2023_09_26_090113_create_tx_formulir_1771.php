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
        Schema::create('tx_formulir_1771', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulir_id');
            $table->integer('jenis_spt');
            $table->integer('tahun_pajak');
            $table->string('npwp');
            $table->string('nama_npwp');
            $table->string('jenis_usaha');
            $table->string('klu');
            $table->string('no_telp');
            $table->string('no_fak');
            $table->dateTime('start_periode_pembukuan');
            $table->dateTime('end_periode_pembukuan');
            $table->string('negara_domisili');
            $table->integer('laporan_keuangan');
            $table->string('kantor_akuntan');
            $table->string('npwp_kantor_akuntan');
            $table->string('akuntan_publik');
            $table->string('nama_akuntan_publik');
            $table->string('nama_kantor_konsultan_pajak');
            $table->string('npwp_kantor_konsultan_pajak');
            $table->string('nama_konsultan_pajak');
            $table->string('npwp_konsultan_pajak');
            $table->float('a1_kena_pajak');
            $table->float('a2_kena_pajak');
            $table->float('a3_kena_pajak');
            $table->float('b4_pph_terutang');
            $table->float('b5_pph_terutang');
            $table->float('b6_pph_terutang');
            $table->float('c7_kredit_pajak');
            $table->float('c8a_kredit_pajak');
            $table->float('c8b_kredit_pajak');
            $table->float('c8c_kredit_pajak');
            $table->float('c9a_kredit_pajak');
            $table->float('c9b_kredit_pajak');
            $table->float('c9_kredit_pajak');
            $table->float('c10a_kredit_pajak');
            $table->float('c10b_kredit_pajak');
            $table->float('c10c_kredit_pajak');
            $table->float('d11a_pph_kurang');
            $table->float('d11b_pph_kurang');
            $table->float('d11_pph_kurang');
            $table->dateTime('d12_pph_kurang');
            $table->float('d13_pph_kurang');
            $table->float('e14a_angsuran_pph');
            $table->float('e14b_angsuran_pph');
            $table->float('e14c_angsuran_pph');
            $table->float('e14d_angsuran_pph');
            $table->float('e14e_angsuran_pph');
            $table->float('e14f_angsuran_pph');
            $table->float('e14g_angsuran_pph');
            $table->float('f15a_pph_final');
            $table->float('f15b_pph_final');
            $table->integer('g16_pernyataan_trx');
            $table->integer('h17_lampiran');
            $table->integer('wajib_pajak');
            $table->string('tempat');
            $table->string('nama_lengkap');
            $table->string('npwp_pengurus');
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
        Schema::dropIfExists('tx_formulir_1771');
    }
};
