<?php

use App\Term;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Term::class, function (Faker $faker) {
    return [
        'name'       => 'Term Name: ' . $faker->word,
        'starts_at'  => $faker->dateTime,
        'ends_at'    => $faker->dateTime,
        'creator_id' => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ];
});
