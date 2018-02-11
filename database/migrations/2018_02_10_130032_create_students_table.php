<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    protected $table = 'students';

    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('student_identification');
            $table->string('mobile_number');
            $table->unsignedDecimal('ci', 4, 2);
            $table->unsignedSmallInteger('credits');
            $table->integer('major_id')->unsigned();
            $table->foreign('major_id')->references('id')->on('majors');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('modifier_id')->unsigned();
            $table->foreign('modifier_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
//            $table->dropForeign(['creator_id']); fails :/
//            $table->dropForeign(['modifier_id']);
            $table->dropForeign(['major_id']);
        });


        Schema::dropIfExists($this->table);
    }
}
