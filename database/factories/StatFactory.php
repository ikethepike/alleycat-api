<?php

use Faker\Generator as Faker;

$factory->define(AlleyCat\Stat::class, function (Faker $faker) {
    return [
        "key"   => collect(["Distance", "Altitude", "Cops avoided", "Sick stunts", "Wipe outs", "Stairs run"])->random(), 
        "value" => mt_rand(0, 100), 
    ];
});
