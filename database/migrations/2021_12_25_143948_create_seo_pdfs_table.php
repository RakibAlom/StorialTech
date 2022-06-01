<?php

use App\Models\Seo\SeoPdf;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->longText('keywords');
            $table->string('cover_image')->nullable();
            $table->string('sp_title_plus')->nullable();
            $table->timestamps();
        });

        SeoPdf::create([
            'title' => 'Free PDF Book Download | World Largest eBook Free Collection | StorialTech',
            'description' => "StorialTech is the largest library of eBooks. You can download bangla, onubad, and various types of pdf. So let's visit and download your favorite book.",
            'keywords' => 'pdf, bangla pdf, ebook download, western bangla pdf, pdf download, bengali free pdf download, onubad book free download, free ebook download, story book pdf download, pdf books world, free pdf books bestsellers, google drive pdf books, google drive pdf books, pdf books library',
            'cover_image' => '',
            'sp_title_plus' => '- Largest PDF Book Collection of StorialTech',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_pdfs');
    }
}
