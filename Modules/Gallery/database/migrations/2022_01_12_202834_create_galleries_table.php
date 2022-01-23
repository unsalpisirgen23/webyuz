<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string("img_title",400)->nullable();
            $table->string("img_url",400)->nullable();
            $table->string("redirect_url",400)->nullable();
            $table->string("gallery_categori_id",400)->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });
        Schema::create('gallery_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name",400)->nullable();
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
        Schema::dropIfExists('gallery_categories');
        Schema::dropIfExists('galleries');
    }
}
