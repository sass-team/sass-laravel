<?php

use App\Instructor;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Instructor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'creator_id' => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ];
});
