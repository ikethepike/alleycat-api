<?php

namespace AlleyCat\Repositories;

use AlleyCat\Contracts\LocationContract;

class FoursquareRepository implements LocationContract
{
    private $baseAPI = 'https://api.foursquare.com/v2/venues/search';

    public function __construct()
    {
        $this->baseAPI .= '?client_id=' . env('FOURSQUARE_CLIENT_ID');
        $this->baseAPI .= '&client_secret=' . env('FOURSQUARE_CLIENT_SECRET');
        $this->baseAPI .= '&v=20180323';
        $this->baseAPI .= '&intent=browse';
    }

    /**
     * Return a list of locations.
     *
     * @param int $count
     */
    public function getLocations(float $longitude, float $latitude, int $count = 20, int $radius = 15000)
    {
        $request = new CurlRepository();

        $url = $this->baseAPI . "&radius={$radius}&limit={$count}&ll={$longitude},{$latitude}";

        return $request->get($url);
    }
}

// curl - X GET - G  \'https://api.foursquare.com/v2/venues/explore' \-d client_id = "CLIENT_ID"  \-d client_secret = "CLIENT_SECRET"  \-d v = "20180323"  \-d ll = "40.7243,-74.0018"  \-d query = "coffee"  \-d limit = 1
