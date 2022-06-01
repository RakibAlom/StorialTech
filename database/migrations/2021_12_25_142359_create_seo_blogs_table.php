<?php

use App\Models\Seo\SeoBlog;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable();
            $table->timestamps();
        });

        SeoBlog::create([
            'title' => 'Blog - StorialTech | Blog of Story Tutorial Technology & PDF Book',
            'description' => 'StorialTech - Story Tutorial Technology is a multi-platform blog website. You can read stories, improve skills from tutorials, download web templates & pdf books.',
            'keywords' => 'storialtech blog tutorial, story, pdf, book, ebook, php, laravel, web design, development, web development, seo, search engine optimization, programming, bangla pdf book, website template, romantic story, bangla story, funny story, fantasy story, bangla onubad book, free ebook download,  themeforest template download, free wordpress theme download, wordpress, premium theme download, admin template download, admin dashboard, e-commerce template download, storialtech, storial tech, story tutorial technology',
            'cover_image' => '',
            'sp_title_plus' => '- Blog of StorialTech',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_blogs');
    }
}
