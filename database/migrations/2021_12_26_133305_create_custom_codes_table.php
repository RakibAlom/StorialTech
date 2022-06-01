<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_codes', function (Blueprint $table) {
            $table->id();
            $table->longText('header_custom_code')->nullable();
            $table->longText('header_custom_css')->nullable();
            $table->longText('footer_custom_code')->nullable();
            $table->longText('footer_custom_js')->nullable();
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
        Schema::dropIfExists('custom_codes');
    }
}
