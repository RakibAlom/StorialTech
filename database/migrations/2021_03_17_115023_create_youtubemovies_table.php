<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoutubemoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youtubemovies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('slug');
            $table->string('elink');
            $table->text('details')->nullable();
            $table->string('duration')->nullable();
            $table->string('language')->nullable();
            $table->string('release_date')->nullable();
            $table->string('imdb_rating')->nullable();
            $table->string('region')->nullable();
            $table->text('keywords')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('status')->default(1)->comment('active = 1, deactive = 0, trash = 9');
            $table->string('views')->default(0);
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
        Schema::dropIfExists('youtubemovies');
    }
}
