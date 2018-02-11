<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', User::$roles);
            $table->rememberToken();
            $table->timestamps();
            $table->integer('creator_id')->nullable()->unsigned();
            $table->foreign('creator_id')->references('id')->on('users');
            $table->integer('modifier_id')->nullable()->unsigned();
            $table->foreign('modifier_id')->references('id')->on('users');
        });

        User::query()->insert([
            'first_name' => 'Rizart',
            'last_name'  => 'Dokollari',
            'email'      => 'r.dokollari@gmail.com',
            'password'   => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
            'role'       => 'admin',
        ]);
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['modifier_id']);
        });

        Schema::dropIfExists('users');
    }
}
