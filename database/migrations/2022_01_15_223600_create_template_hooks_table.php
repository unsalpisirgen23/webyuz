<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateHooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_hooks', function (Blueprint $table) {
            $table->id();
            $table->integer("template_id")->nullable();
            $table->integer("component_widget_id")->nullable();
            $table->integer("action_order")->default(2)->nullable();
            $table->integer("action_status")->default(0)->nullable();
            $table->string("action_title",100)->nullable();
            $table->string("action_to",300)->nullable();
            $table->string("action_from",350)->nullable();
            $table->string("action_group",150)->nullable();
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
        Schema::dropIfExists('template_hooks');
    }
}
