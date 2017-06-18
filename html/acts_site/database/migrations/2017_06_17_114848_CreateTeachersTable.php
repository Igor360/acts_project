<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FirstName',60)->default('Дані відсутні');
            $table->string('MiddleName',60)->default('Дані відсутні');
            $table->string('LastName',100)->default('Дані відсутні');
            $table->string('Department',100)->default('ФІОТ АУТС');
            $table->string('Profession')->default('Дані відсутні');
            $table->string('Photo',500)->default('/img/Photo.png');
            $table->string('TimeDay',100)->default('Дані відсутні');
            $table->string('Room',100)->default('Дані відсутні');
            $table->string('Phone',60)->default('Дані відсутні');
            $table->string('Mobile',100)->default('Дані відсутні');
            $table->longText('ProfInterest')->default('Дані відсутні');
            $table->longText('Discipline')->default('Дані відсутні');
            $table->integer('user_id');
            $table->integer('position_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
        });
    }
}
