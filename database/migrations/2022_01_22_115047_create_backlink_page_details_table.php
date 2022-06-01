<?php

use App\Models\Tools\BacklinkPageDetails;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacklinkPageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backlink_page_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slogan')->nullable();
            $table->longText('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('views')->nullable();
            $table->timestamps();
        });

        BacklinkPageDetails::create([
            'title' => 'Free Backlinks List',
            'meta_title' => 'Free Backlinks List - Boost Your Website Rank',
            'slogan' => 'Discover Free & Easy Backlinks and Boost Your Website Google Ranking',
            'description' => 'The Backlinks List Explorer is a collection of free easy-to-win backlink opportunities. it will help you kickstart your SEO and improve your Rankings on Search Engines.',
            'keywords' => 'backlinks, free backlinks, backlinks list, free backlinks list, backlinks generator, free backlinks generator, high domain authority',
            'cover_image' => '',
            'views' => '0',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backlink_page_details');
    }
}
