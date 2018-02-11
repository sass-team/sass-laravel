<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('modifier_id')->unsigned();
            $table->foreign('modifier_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['modifier_id']);
        });

        Schema::dropIfExists('instructors');
    }
}
