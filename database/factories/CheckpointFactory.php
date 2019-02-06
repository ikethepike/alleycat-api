<?php

use Faker\Generator as Faker;

$factory->define(AlleyCat\Checkpoint::class, function (Faker $faker) {
    return [
        'longitude' => mt_rand(-180, 180),
        'latitude'  => mt_rand(-90, 90),
        'name'      => 1 === mt_rand(0, 1) ? $faker->company() : $faker->address(),
    ];
});
