<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_codes', function (Blueprint $table) {
            $table->id();
            $table->longText('section_top_banner_ads')->nullable();
            $table->longText('section_bottom_banner_ads')->nullable();
            $table->longText('single_post_top_ads')->nullable();
            $table->longText('single_post_bottom_ads')->nullable();
            $table->longText('sidebar_top_ads')->nullable();
            $table->longText('sidebar_bottom_ads')->nullable();
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
        Schema::dropIfExists('ads_codes');
    }
}
