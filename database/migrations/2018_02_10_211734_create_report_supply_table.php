<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportSupplyTable extends Migration
{
    public function up()
    {
        Schema::create('report_supply', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('report_id')->nullable()->unsigned();
            $table->foreign('report_id')
                ->references('id')->on('reports');
            $table->integer('supply_id')->nullable()->unsigned();
            $table->foreign('supply_id')
                ->references('id')->on('supplies');
            $table->string('value')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('report_supply');
    }
}
