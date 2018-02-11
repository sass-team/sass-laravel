<?php

use App\Major;
use App\Student;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Student::class, function (Faker $faker) {

    return [
        'first_name'             => 'First Name: ' . $faker->firstName,
        'last_name'              => 'Last Name: ' . $faker->lastName,
        'email'                  => $faker->unique()->safeEmail,
        'student_identification' => 'ID: ' . str_random(10),
        'mobile_number'          => 'Phone number: ' . $faker->phoneNumber,
        'ci'                     => $faker->randomFloat(2, 0, 4),
        'credits'                => $faker->numberBetween(0, 2000),
        'major_id'               => function () {
            return factory(Major::class)->create()->id;
        },
        'creator_id'             => function () {
            return factory(User::class, 'admin')->create()->id;
        },
        'modifier_id'            => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ];
});
