<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatedownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templatedownloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('templates')->onDelete('cascade');
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
        Schema::dropIfExists('templatedownloads');
    }
}
