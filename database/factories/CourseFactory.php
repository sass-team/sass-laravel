<?php

use App\Course;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Course::class, function (Faker $faker) {
    return [
        'code'        => 'Course code: ' . $faker->uuid,
        'name'        => 'Course name: ' . $faker->word,
        'creator_id'  => function () {
            return factory(User::class, 'admin')->create()->id;
        },
        'modifier_id' => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ];
});
