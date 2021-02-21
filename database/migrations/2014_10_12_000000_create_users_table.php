<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('name');
            $table->string('ssd')->unique();
            $table->decimal('gpa')->nullable();
            $table->integer('credit')->nullable();
            $table->foreignId('level_id')->nullable();

            $table->string('email')->unique();

            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('role_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('init_password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
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
