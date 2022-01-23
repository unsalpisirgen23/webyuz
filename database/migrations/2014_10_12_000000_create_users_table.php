<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

        $table->id();
        $table->integer('user_id')->nullable();
		$table->string('name')->nullable();
		$table->string('lastname')->nullable();
		$table->string('username',200)->nullable();
		$table->string('email');
		$table->timestamp('email_verified_at')->nullable();
		$table->string('password');
		$table->integer('language_type')->nullable();
		$table->integer('rank')->nullable()->nullable(0);
		$table->integer('status')->nullable()->default(0);
		$table->string('profile_image',250)->nullable();
		$table->string('link',300)->nullable();
		$table->string('remember_token',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
