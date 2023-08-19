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
        Schema::create('tx_ebupot_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ebupot_id');
            $table->string('dok_ref')->nullable();
            $table->string('no_dok')->nullable();
            $table->dateTime('tgl_doc')->nullable();
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
        Schema::dropIfExists('tx_ebupot_lines');
    }
};
