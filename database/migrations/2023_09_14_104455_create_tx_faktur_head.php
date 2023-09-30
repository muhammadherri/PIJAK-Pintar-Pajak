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
        Schema::create('tx_faktur_head', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faktur_id');
            $table->integer('pembeli');
            $table->integer('jenis_dok')->nullable();
            $table->integer('dok_lain');
            $table->integer('no_seri');
            $table->string('no_dok');
            $table->string('catatan');
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
        Schema::dropIfExists('tx_faktur_head');
    }
};
