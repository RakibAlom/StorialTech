<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('bio_title')->nullable();
            $table->string('education')->nullable();
            $table->string('profession')->nullable();
            $table->string('address')->nullable();
            $table->string('language')->nullable();
            $table->string('religion')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('github_link')->nullable();
            $table->text('about')->nullable();
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
        Schema::dropIfExists('userdetails');
    }
}
