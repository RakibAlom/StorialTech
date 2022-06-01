<?php

use App\Models\Seo\SeoPrefree;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoPrefreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_prefrees', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable()->comment('after single post title');
            $table->timestamps();
        });

        SeoPrefree::create([
            'title' => 'Premium Free Source | StorialTech - Blog of Story Tutorial Technology & PDF Book',
            'description' => "Download Premium Source and Course For Free. You can find your course and necessary file source here. Let's visit and download free.",
            'keywords' => 'premuim course, free source, premium free source download, download, software free download, free theme download, free course, udemy course, course cupon, download course',
            'cover_image' => '',
            'sp_title_plus' => '- Free Source of StorialTech',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_prefrees');
    }
}
