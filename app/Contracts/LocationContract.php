<?php

namespace AlleyCat\Contracts;

interface LocationContract
{
    /**
     * Return a list of locations.
     *
     * @param int $count
     */
    public function getLocations(int $count = 20);
}
