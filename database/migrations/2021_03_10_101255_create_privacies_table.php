<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Privacy;

class CreatePrivaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privacies', function (Blueprint $table) {
            $table->id();
            $table->text('privacy');
            $table->integer('views')->default(0);
            $table->timestamps();
        });

        Privacy::create([
            'privacy' => 'StorialTech Privacy & Policy Are Strong.',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privacies');
    }
}
