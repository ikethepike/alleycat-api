<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        factory(AlleyCat\User::class, 50)->create()->each(function ($user) {
            $user->races()->save(factory(AlleyCat\Race::class)->make());
        });

        Factory(AlleyCat\Competitor::class, 100)->create()->each(function ($competitor) {
            $competitor->stats()->save(factory(AlleyCat\Stat::class)->make());
        });

        Factory(AlleyCat\Location::class, 100)->create();
    }
}
