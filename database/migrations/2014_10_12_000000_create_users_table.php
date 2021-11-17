<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('slug')->unique();
            $table->string('fullname');
            $table->string('phone')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('gender')->default('male');
            $table->string('image')->nullable();
            $table->integer('utype')->default(1)->comment('user = 1, moderator = 2, block-user = 0, admin = 5, trash = 9');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'username' => 'storialtech',
            'slug' => 'storialtech',
            'fullname' => 'StorialTech',
            'phone' => '',
            'birthdate' => '',
            'utype' => 5,
            'gender' => 'male',
            'email' => 'storialtech@gmail.com',
            'password' => Hash::make('st@00tech00;'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
