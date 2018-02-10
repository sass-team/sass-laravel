<?php

use App\Appointment;
use App\Report;
use App\Student;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Report::class, function (Faker $faker) {
    return [
        'topic'                           => 'Topic: ' . $faker->paragraph,
        'other'                           => 'Other: ' . $faker->paragraph,
        'student_concerns'                => 'Student concerns: ' . $faker->paragraph,
        'relevant_feedback_or_guidelines' => 'Relevant feedback or guidlines: ' . $faker->paragraph,
        'additional_comments'             => 'Additional comments: ' . $faker->paragraph,
    ];
});

$factory->defineAs(Report::class, 'with-relations', function (Faker $faker) {
    return factory(Report::class)->make([
        'student_id'     => function () {
            return factory(Student::class)->create()->id;
        },
        'appointment_id' => function () {
            return factory(Appointment::class)->create()->id;
        }
    ])->toArray();
});

$factory->defineAs(Report::class, 'with-student', function (Faker $faker) {
    return factory(Report::class)->make([
        'student_id' => function () {
            return factory(Student::class)->create()->id;
        },
    ])->toArray();
});
