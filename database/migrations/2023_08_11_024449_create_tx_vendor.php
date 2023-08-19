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
        Schema::create('tx_vendor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_id_vendor');
            $table->string('nama_vendor');
            $table->string('alamat_vendor');
            $table->integer('contact_person');
            $table->string('attribute1');
            $table->string('attribute2');
            $table->string('attribute3');
            $table->timestamps();
            $table->dateTime('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tx_vendor');
    }
};
