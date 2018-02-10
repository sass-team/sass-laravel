<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string('notes');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('tutor_id')->unsigned();
            $table->foreign('tutor_id')->references('id')->on('users');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('instructor_id')->unsigned();
            $table->foreign('instructor_id')->references('id')->on('instructors');
            $table->integer('term_id')->unsigned();
            $table->foreign('term_id')->references('id')->on('terms');
        });
    }

    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['tutor_id']);
            $table->dropForeign(['student_id']);
            $table->dropForeign(['instructor_id']);
            $table->dropForeign(['term_id']);
        });

        Schema::dropIfExists('appointments');
    }
}
