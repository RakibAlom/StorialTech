<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreemiumFreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preemium_frees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_prefrees');
            $table->string('type')->nullable();
            $table->string('delete_time')->nullable();
            $table->text('body');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('preemium_frees');
    }
}
