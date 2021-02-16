<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnualReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anual_reports', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->longText('headline');
            $table->longText('description');
            $table->string('file')->nullable();
            $table->longText('buttom_desc')->nullable();
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
        Schema::dropIfExists('anual_reports');
    }
}
