<?php

use App\Models\Seo\SeoTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable()->comment('after single post title');
            $table->timestamps();
        });

        SeoTemplate::create([
            'title' => 'Theme Template | Download Free Website Template | StorialTech',
            'description' => "Download Premium Theme and Template For Free. You can find your favorite website template here. Let's visit and free download your necessary template.",
            'keywords' => 'website theme, web template, ecommerce theme template, free html template, wordpress template, wordpress plugin, wordpress theme, react template, vue template, angular template, shopify template, free premium template, free premium theme, magazine theme, newspaper theme, creative theme',
            'cover_image' => '',
            'sp_title_plus' => '| StorialTech',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_templates');
    }
}
