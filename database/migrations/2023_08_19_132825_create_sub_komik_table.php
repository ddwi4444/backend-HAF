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
        Schema::create('sub_komik', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->unsignedBiginteger('komik_id')->references('id')->on('komik');
            $table->string('user_id')->references('id')->on('user');
            $table->string('judul');
            $table->string('slug');
            $table->string('thumbnail');
            $table->string('content');
            $table->string('chapter')->nullable();
            $table->unsignedBiginteger('jumlah_view')->default(0);
	        $table->unsignedBiginteger('jumlah_like')->default(0);
            $table->string('post_by');
            $table->boolean('status')->default(0);
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('komik_id')->references('id')->on('komik')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_komik');
    }
};
