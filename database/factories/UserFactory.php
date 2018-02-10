<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name'     => 'First name: ' . $faker->firstName,
        'last_name'      => 'Last name: ' . $faker->lastName,
        'email'          => $faker->unique()->safeEmail,
        'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(User::class, 'admin', function (Faker $faker) {
    return factory(User::class)->make([
        'role'       => 'admin',
        'creator_id' => null,
    ])->makeVisible('password')->toArray();
});

$factory->defineAs(User::class, 'tutor', function (Faker $faker) {
    return factory(User::class)->make([
        'role'       => 'tutor',
        'creator_id' => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ])->makeVisible('password')->toArray();
});

$factory->defineAs(User::class, 'secretary', function (Faker $faker) {
    return factory(User::class)->make([
        'role'       => 'secretary',
        'creator_id' => function () {
            return factory(User::class, 'admin')->create()->id;
        },
    ])->makeVisible('password')->toArray();
});
