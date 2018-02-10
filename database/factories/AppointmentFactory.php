<?php

use App\Appointment;
use App\Course;
use App\Instructor;
use App\Student;
use App\Term;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'starts_at'     => $faker->dateTime,
        'ends_at'       => $faker->dateTime,
        'notes'         => $faker->sentence,
        'creator_id'    => function () {
            return factory(User::class, 'admin')->create()->id;
        },
        'course_id'     => function () {
            return factory(Course::class)->create()->id;
        },
        'tutor_id'      => function () {
            return factory(User::class, 'tutor')->create()->id;
        },
        'student_id'    => function () {
            return factory(Student::class)->create()->id;
        },
        'instructor_id' => function () {
            return factory(Instructor::class)->create()->id;
        },
        'term_id'       => function () {

            return factory(Term::class)->create()->id;
        },
    ];
});
