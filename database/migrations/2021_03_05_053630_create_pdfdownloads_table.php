<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfdownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfdownloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_id');
            $table->foreign('pdf_id')->references('id')->on('pdfs')->onDelete('cascade');
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
        Schema::dropIfExists('pdfdownloads');
    }
}
