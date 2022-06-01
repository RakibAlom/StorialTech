<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacklinkListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backlink_lists', function (Blueprint $table) {
            $table->id();
            $table->string('authority_site');
            $table->string('tld');
            $table->string('link_type');
            $table->string('dr');
            $table->string('website_link');
            $table->integer('status')->default(1)->comment('active = 1, deactive = 0');
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
        Schema::dropIfExists('backlink_lists');
    }
}
