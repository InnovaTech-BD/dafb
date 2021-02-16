<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('headline');
            $table->longText('headline2');
            $table->longText('description');
            $table->longText('description2');
            $table->unsignedBigInteger('slider_id')->nullable();
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->timestamps();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('set null');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
