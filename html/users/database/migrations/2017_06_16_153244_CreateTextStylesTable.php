<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textstyles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idtext');
            $table->integer('idtextelement');
            $table->foreign('idtext')->reference('id')->on('text');
            $table->foreign('idtextelement')->reference('id')->on('textelement');
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
        Schema::dropIfExists('textstyles');
    }
}
