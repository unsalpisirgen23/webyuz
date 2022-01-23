<?php

namespace App\System\Builder\Migrations;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrationBuilder
{
    public static function up($database_name)
    {
         config()->set("database.connections.user_database.database",$database_name);

        Schema::connection('user_database')->create('categories', function (Blueprint $table) {

            $table->id();
            $table->string('name',200)->nullable();
            $table->string('link',250)->nullable();
            $table->integer('status')->default('0')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });

        Schema::connection('user_database')->create('posts', function (Blueprint $table) {

            $table->id();
            $table->string('title',250)->nullable();
            $table->text('content')->nullable();
            $table->string('description',500)->nullable();
            $table->string('link',300)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });


        Schema::connection('user_database')->create('settings', function (Blueprint $table) {
            $table->string('site_logo',150)->nullable();
            $table->string('site_url',150)->nullable();
            $table->string('site_title',150)->nullable();
            $table->string('site_description',500)->nullable();
            $table->string('site_phone',100)->nullable();
            $table->string('site_email',200)->nullable();
            $table->string('site_facebook',200)->nullable();
            $table->string('site_twitter',200)->nullable();
            $table->string('site_instagram',200)->nullable();
            $table->string('site_gmail',200)->nullable();
            $table->string('site_address',200)->nullable();
            $table->string('site_working_hours',200)->nullable();
            $table->string('site_whatsapp_number',200)->nullable();
            $table->string('site_whatsapp_text',200)->nullable();
        });

        Schema::connection('user_database')->create('tags', function (Blueprint $table) {

            $table->id();
            $table->string('name',60)->nullable();
            $table->integer('type',)->default('0')->nullable();
            $table->integer('status')->default('0')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });


        Schema::connection('user_database')->create('pages', function (Blueprint $table) {

            $table->id();
            $table->string('title',250)->nullable();
            $table->text('content')->nullable();
            $table->string('link',300)->nullable();
            $table->integer('status')->default('0')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });

        Schema::connection('user_database')->create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_title',255)->nullable();
            $table->string('menu_link',300)->nullable();
            $table->json("content")->nullable();
            $table->integer('status')->default('0')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });






    }

    public static function down($database_name)
    {
        config()->set("database.connections.user_database.database",$database_name);

        Schema::connection('user_database')->dropIfExists('categories');
        Schema::connection('user_database')->dropIfExists('posts');
        Schema::connection('user_database')->dropIfExists('settings');
        Schema::connection('user_database')->dropIfExists('tags');
        Schema::connection('user_database')->dropIfExists('pages');
        Schema::connection('user_database')->dropIfExists('menus');

    }

}