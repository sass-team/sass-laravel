<?php

use App\Supply;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('creator_id')->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('modifier_id')->unsigned();
            $table->foreign('modifier_id')->references('id')->on('users');
        });

        $adminId = \App\User::query()
            ->where('email', 'r.dokollari@gmail.com')
            ->firstOrFail()->id;

        $templates = [
            'Assignment (graded)', 'Draft', "Instructor's feedback", 'Textbook',
            'Notes', 'Assignment sheet', 'Exercise on', 'Other'
        ];

        foreach ($templates as $template) {
            Supply::query()->insert([
                'name'        => $template,
                'creator_id'  => $adminId,
                'modifier_id' => $adminId,
            ]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
