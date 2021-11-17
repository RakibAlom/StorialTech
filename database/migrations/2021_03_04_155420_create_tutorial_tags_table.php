<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorialTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorial_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tag_tutorials');
            $table->unsignedBigInteger('tutorial_id');
            $table->foreign('tutorial_id')->references('id')->on('tutorials')->onDelete('cascade');
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
        Schema::dropIfExists('tutorial_tags');
    }
}
