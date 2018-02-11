<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFocusReportTable extends Migration
{
    public function up()
    {
        Schema::create('focus_report', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('report_id')->unsigned();
            $table->foreign('report_id')->references('id')->on('reports');
            $table->integer('focus_id')->unsigned();
            $table->foreign('focus_id')->references('id')->on('foci');
            $table->string('value');
        });
    }

    public function down()
    {
        Schema::dropIfExists('focus_report');
    }
}
