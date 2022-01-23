<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {

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
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
