<?php

use App\Models\Seo\SeoStory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable()->comment('after single post title');
            $table->timestamps();
        });

        SeoStory::create([
            'title' => 'Bangla Story | StorialTech - Blog of Story Tutorial Technology & PDF Book',
            'description' => "You can read enjoyable stories from storialtech. Bangla romantic, adventure, funny,  Historial, and many other stories you can find and read.",
            'keywords' => 'story, bangla story, romantic story, love story, scifi story, science fiction story, adventure story, fictional story, bengali story, funny story, crime story, mythology story, horror story, fairy tail, life story, historical story, fantasy story, detective story',
            'cover_image' => '',
            'sp_title_plus' => '- Story of StorialTech',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_stories');
    }
}
