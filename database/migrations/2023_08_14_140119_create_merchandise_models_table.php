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
        Schema::create('merchandise_models', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 32)->references('id')->on('user');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('thumbnail');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise_models');
    }
};