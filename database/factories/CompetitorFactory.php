<?php

use Faker\Generator as Faker;

$factory->define(AlleyCat\Competitor::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1, AlleyCat\User::count()),
        'race_id' => mt_rand(1, AlleyCat\Race::count()),
    ];
});
