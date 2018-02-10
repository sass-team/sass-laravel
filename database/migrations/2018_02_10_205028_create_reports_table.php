<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('topic');
            $table->text('other');
            $table->text('student_concerns');
            $table->text('relevant_feedback_or_guidelines');
            $table->text('additional_comments');
            $table->integer('student_id')->nullable()->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('appointment_id')->nullable()->unsigned();
            $table->foreign('appointment_id')->references('id')
                ->on('appointments');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
