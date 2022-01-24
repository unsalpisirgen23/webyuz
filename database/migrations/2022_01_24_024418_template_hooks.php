<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TemplateHooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
