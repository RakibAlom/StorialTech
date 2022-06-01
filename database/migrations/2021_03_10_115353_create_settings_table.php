<?php

use App\Models\Admin\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('address')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('github_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('telegram_link')->nullable();
            $table->string('whatsapp_link')->nullable();
            $table->string('discord_link')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('short_about')->nullable();
            $table->text('copyright')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('donate_image')->nullable();
            $table->timestamps();
        });

        Setting::create([
            'title' => 'StorialTech - Blog of Story Tutorial Technology'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
