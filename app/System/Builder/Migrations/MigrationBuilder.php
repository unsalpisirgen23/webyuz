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

        Schema::connection('user_database')->create('comments', function (Blueprint $table) {
            $table->id();
            $table->string("fullname",200)->nullable();
            $table->string("email",200)->nullable();
            $table->text("comment")->nullable();
            $table->integer("post_id")->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string("name",400)->nullable();
            $table->string("subject",400)->nullable();
            $table->string("description",800)->nullable();
            $table->string("email",400)->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string("title",500)->nullable();
            $table->string("description",800)->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string("img_title",400)->nullable();
            $table->string("img_url",400)->nullable();
            $table->string("redirect_url",400)->nullable();
            $table->string("gallery_categori_id",400)->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name",400)->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('scrolling_pictures', function (Blueprint $table) {
            $table->id();
            $table->string("title",400)->nullable();
            $table->string("img_url",400)->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('services', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("image")->nullable();
            $table->text("content")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('description',500)->nullable();
            $table->string('image_url',500)->nullable();
            $table->integer('position')->default('0');
            $table->string('content',500)->nullable()->nullable();
            $table->integer('status')->default('0')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });

        Schema::connection('user_database')->create('teams', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->string("image")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("facebook")->nullable();
            $table->text("content" )->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string("name",400)->nullable();
            $table->string("img_url",400)->nullable();
            $table->string("description",800)->nullable();
            $table->string("sector",400)->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string("module_name",200)->nullable();
            $table->string("module_version",15)->nullable();
            $table->string("module_namespace",255)->nullable();
            $table->integer("module_status")->default(0)->nullable();
            $table->integer("module_install")->default(0)->nullable();
            $table->timestamps();
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
        Schema::connection('user_database')->dropIfExists('comments');
        Schema::connection('user_database')->dropIfExists('contacts');
        Schema::connection('user_database')->dropIfExists('faqs');
        Schema::connection('user_database')->dropIfExists('gallery_categories');
        Schema::connection('user_database')->dropIfExists('galleries');
        Schema::connection('user_database')->dropIfExists('scrolling_pictures');
        Schema::connection('user_database')->dropIfExists('services');
        Schema::connection('user_database')->dropIfExists('sliders');
        Schema::connection('user_database')->dropIfExists('teams');
        Schema::connection('user_database')->dropIfExists('testimonials');
        Schema::connection('user_database')->dropIfExists('modules');
    }

}