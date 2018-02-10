<?php

use App\Supply;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
        });

        Supply::query()->insert(['name' => 'Assignment (graded)']);
        Supply::query()->insert(['name' => 'Draft']);
        Supply::query()->insert(['name' => "Instructor's feedback"]);
        Supply::query()->insert(['name' => "Textbook"]);
        Supply::query()->insert(['name' => "Notes"]);
        Supply::query()->insert(['name' => "Assignment sheet"]);
        Supply::query()->insert(['name' => "Exercise on"]);
        Supply::query()->insert(['name' => "Other"]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
