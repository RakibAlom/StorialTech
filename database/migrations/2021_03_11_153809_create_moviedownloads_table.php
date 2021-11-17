<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviedownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moviedownloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
            $table->string('quality');
            $table->string('size')->nullable();
            $table->text('link');
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
        Schema::dropIfExists('moviedownloads');
    }
}
