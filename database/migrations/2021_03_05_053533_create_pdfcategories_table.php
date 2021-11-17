<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_id');
            $table->foreign('pdf_id')->references('id')->on('pdfs')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_pdfs');
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
        Schema::dropIfExists('pdfcategories');
    }
}
