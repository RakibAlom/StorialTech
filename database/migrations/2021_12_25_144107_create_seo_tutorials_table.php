<?php

use App\Models\Seo\SeoTutorial;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTutorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_tutorials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable()->comment('after single post title');
            $table->timestamps();
        });

        SeoTutorial::create([
            'title' => 'Tutorial - Learn and Improve Your Skills From StorialTech',
            'description' => "StorialTech is a place to learn tutorials and gain skills. You can learn from here various types of technology-related tutorials. We want to share knowledge and skill with you.",
            'keywords' => 'tutorial, web desing, web development, html, css, javascript php, laravel, mysql, react, python, graphic design, office application, networking, fullstack, fronend, backend, bangla tutorial',
            'cover_image' => '',
            'sp_title_plus' => '',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_tutorials');
    }
}
