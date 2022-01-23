<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateHooksComponentWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_hooks_component_widgets', function (Blueprint $table) {
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_hooks_component_widgets');
    }
}
