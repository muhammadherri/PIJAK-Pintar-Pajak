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
        Schema::create('categories_pengeluaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sewa_kos');
            $table->integer('makan');
            $table->integer('pakaian');
            $table->integer('nonton');
            $table->integer('attribute1');
            $table->string('attribute2');
            $table->string('attribute3');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
