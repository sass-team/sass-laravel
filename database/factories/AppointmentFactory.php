<?php

use App\Appointment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'starts_at' => $faker->dateTime,
        'ends_at'   => $faker->dateTime,
        'notes'     => $faker->sentence,
        'creator_id'   => function () {
            return factory(User::class)->create()->id;
        },
        'tutor_id'   => function () {
            return factory(User::class)->create()->id;
        },
        'student_id'   => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
