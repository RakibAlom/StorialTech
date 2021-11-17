<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('date');
            $table->string('month');
            $table->string('year');
            $table->string('image')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('views')->default(0);
            $table->integer('status')->default(0)->comment('pending = 1, active = 1, approve = 1, deactive = 2, trash = 9');
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
        Schema::dropIfExists('blogs');
    }
}
