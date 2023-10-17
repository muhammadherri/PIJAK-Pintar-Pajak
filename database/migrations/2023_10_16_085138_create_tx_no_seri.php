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
        Schema::create('tx_no_seri', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_seri');
            $table->string('serial_name');
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
        Schema::dropIfExists('tx_no_seri');
    }
};
