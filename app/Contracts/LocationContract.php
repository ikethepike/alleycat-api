<?php

namespace AlleyCat\Contracts;

interface LocationContract
{
    /**
     * Return a list of locations.
     *
     * @param int $count
     */
    public function getLocations(float $longitude, float $latitude, int $count = 20, int $radius = 15000);
}
