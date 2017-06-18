<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text');
            $table->integer('article_id');
            $table->integer('type_id');
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('type_id')->references('id')->on('texttype');
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
        Schema::dropIfExists('text');
    }
}
