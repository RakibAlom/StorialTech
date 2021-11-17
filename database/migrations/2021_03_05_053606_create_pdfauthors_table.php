<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfauthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfauthors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_id');
            $table->foreign('pdf_id')->references('id')->on('pdfs')->onDelete('cascade');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('author_pdfs');
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
        Schema::dropIfExists('pdfauthors');
    }
}
