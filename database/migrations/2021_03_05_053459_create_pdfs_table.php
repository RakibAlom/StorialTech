<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('name');
            $table->text('review')->nullable();
            $table->string('translated')->nullable();
            $table->string('publisher')->nullable();
            $table->string('published')->nullable();
            $table->string('pages')->nullable();
            $table->string('size')->nullable();
            $table->text('keywords')->nullable();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->integer('status')->default(1)->comment('pending = 1, active = 1, approve = 1, deactive = 2, trash = 9');
            $table->integer('views')->default(0);
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
        Schema::dropIfExists('pdfs');
    }
}
