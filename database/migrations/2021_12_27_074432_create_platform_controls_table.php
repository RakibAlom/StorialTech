<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_controls', function (Blueprint $table) {
            $table->id();
            $table->integer('story_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('tutorial_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('pdf_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('template_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('movie_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('blog_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('source_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('youtube_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('backlinks_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('tools_status')->default(1)->comment('1 = true, 0 = false');
            $table->integer('web_stories_status')->default(1)->comment('1 = true, 0 = false');
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
        Schema::dropIfExists('platform_controls');
    }
}
