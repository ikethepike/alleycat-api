<?php

use Faker\Generator as Faker;

$factory->define(AlleyCat\Location::class, function (Faker $faker) {
    return [
        'name'          => mt_rand(0, 1) ? $faker->address() : $faker->company(),
        'description'   => mt_rand(0, 1) ? $faker->text() : null,
        'longitude'     => mt_rand(-180, 180),
        'latitude'      => mt_rand(-90, 90),
        'user_id'       => mt_rand(1, AlleyCat\User::count()),
    ];
});
