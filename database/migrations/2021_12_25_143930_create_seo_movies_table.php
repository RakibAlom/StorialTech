<?php

use App\Models\Seo\SeoMovie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable();
            $table->timestamps();
        });

        SeoMovie::create([
            'title' => 'Movie Download World | Free Download Movie | StorialTech',
            'description' => 'You can download free movies from StorialTech. Free movie downloads like hollywood, hindi, adventure, mystery, horror, comedy, and others movie.',
            'keywords' => 'movie, movie download, dowload movie, hindi movie, hindi dubbed move, comedy movie, bollywood movie, hollywood movie, bangla subtitle movie, korean movie, chinese movie, free movie download, south indian movie, movie series, series, drama series, dc movie, marvel movie',
            'cover_image' => '',
            'sp_title_plus' => '- Movie of StorialTech',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_movies');
    }
}
