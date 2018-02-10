<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentStudentTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_student', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('appointment_id')->nullable()->unsigned();
            $table->foreign('appointment_id')
                ->references('id')->on('appointments');
            $table->integer('student_id')->nullable()->unsigned();
            $table->foreign('student_id')
                ->references('id')->on('students');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointment_student');
    }
}
