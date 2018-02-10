<?php

use App\Major;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(Major::class, function (Faker $faker) {
    return [
        'code'       => $faker->firstName,
        'name'       => $faker->lastName,
        'creator_id' => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ];
});
