<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialcommentrepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorialcommentreplies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comment_id');
            $table->foreign('comment_id')->references('id')->on('tutorialcomments')->onDelete('cascade');
            $table->unsignedBigInteger('tutorial_id');
            $table->foreign('tutorial_id')->references('id')->on('tutorials')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('message', 300);
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
        Schema::dropIfExists('tutorialcommentreplies');
    }
}
