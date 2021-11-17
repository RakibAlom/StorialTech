<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfseries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_id');
            $table->foreign('pdf_id')->references('id')->on('pdfs')->onDelete('cascade');
            $table->unsignedBigInteger('series_id');
            $table->foreign('series_id')->references('id')->on('series_pdfs');
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
        Schema::dropIfExists('pdfseries');
    }
}
