<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolSiteLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_site_links', function (Blueprint $table) {
            $table->id();
            $table->string('tool_name');
            $table->string('tool_title')->nullable();
            $table->string('website_links');
            $table->text('tool_details')->nullable();
            $table->string('tool_icon')->nullable();
            $table->integer('serial');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('tool_site_links');
    }
}
