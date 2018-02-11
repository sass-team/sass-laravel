<?php

use App\Appointment;
use App\Report;
use App\Student;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Report::class, function (Faker $faker) {

    /** @var Report $report */
    $report = factory(Report::class, 'without-relations')->make();

    return array_merge($report->toArray(), [
        'student_id'     => function () {
            return factory(Student::class)->create()->id;
        },
        'appointment_id' => function () {
            return factory(Appointment::class)->create()->id;
        },
        'creator_id'     => function () {
            return factory(User::class, 'admin')->create()->id;
        },
        'modifier_id'    => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ]);
});

$factory->defineAs(Report::class, 'without-relations', function (Faker $faker) {
    return [
        'topic'                           => 'Topic: ' . $faker->paragraph,
        'other'                           => 'Other: ' . $faker->paragraph,
        'student_concerns'                => 'Student concerns: ' . $faker->paragraph,
        'relevant_feedback_or_guidelines' => 'Relevant feedback or guidlines: ' . $faker->paragraph,
        'additional_comments'             => 'Additional comments: ' . $faker->paragraph,
    ];
});
