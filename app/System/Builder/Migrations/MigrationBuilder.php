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

        Schema::connection('user_database')->create('template_styles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer("template_id")->nullable();
            $table->text("content")->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('component_widget_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer("template_id")->nullable();
            $table->integer("component_widget_id")->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('template_hooks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer("template_id")->nullable();
            $table->integer("component_widget_id")->nullable();
            $table->string("action_title",255)->nullable();
            $table->string("action_group",200)->nullable();
            $table->integer("action_status")->default(0)->nullable();
            $table->timestamps();
        });

        Schema::connection('user_database')->create('templates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::connection('user_database')->create('template_hooks_component_widgets', function (Blueprint $table) {
            $table->id();
            $table->integer("template_id")->nullable();
            $table->integer("template_hooks_id")->nullable();
            $table->integer("component_widget_id")->nullable();
            $table->integer("status")->nullable();
            $table->integer("user_id")->nullable();
            $table->text("component_style")->nullable();
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
        Schema::connection('user_database')->dropIfExists('template_styles');
        Schema::connection('user_database')->dropIfExists('component_widget_contents');
        Schema::connection('user_database')->dropIfExists('template_hooks');
        Schema::connection('user_database')->dropIfExists('templates');
        Schema::connection('user_database')->dropIfExists('template_hooks_component_widgets');

    }

}