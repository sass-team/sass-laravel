<?php

use App\Course;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Course::class, function (Faker $faker) {
    return [
        'code' => $faker->dateTime,
        'name'   => $faker->dateTime,
        'user_id'   => function () { // creator
            return factory(User::class)->create()->id;
        },
    ];
});
