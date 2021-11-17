<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatetagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templatetags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tag_templates');
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
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
        Schema::dropIfExists('templatetags');
    }
}
