<?php

namespace AlleyCat\Repositories;

use AlleyCat\Contracts\LocationContract;

class FoursquareRepository implements LocationContract
{
    private $baseAPI = 'https://api.foursquare.com/v2/venues/search';

    private $categories = [
      '4deefb944765f83613cdba6e', // statue
      '507c8c4091d498d9fc8c67a9', // publicart
      '4bf58dd8d48988d1ae941735', // university
      '4bf58dd8d48988d16d941735', // café
      '4bf58dd8d48988d1e0931735', // coffeeshop
      '52e81612bcbc57f1066b7a28', // bathingarea
      '56aa371be4b08b9a8d573544', // bay
      '4bf58dd8d48988d1df941735', // bridge
      '50aaa49e4b90af0d42d5de11', // castle
      '56aa371be4b08b9a8d573547', // fountain
      '4bf58dd8d48988d1e0941735', // harbor
      '5bae9231bedf3950379f89cd', // hill
      '4bf58dd8d48988d15d941735', // lighthouse
      '4bf58dd8d48988d164941735', // plaza
      '52e81612bcbc57f1066b7a25', // pedestrianplaza
      '4bf58dd8d48988d165941735', // sceniclookout
      '4bf58dd8d48988d166941735', // sculpture garden
      '56aa371be4b08b9a8d573560', // waterfall
      '4fbc1be21983fc883593e321', // well
      '4bf58dd8d48988d12f941735', // library
      '4bf58dd8d48988d115951735', // bikestore
      '4bf58dd8d48988d114951735', // bookstore
      '52f2ab2ebcbc57f1066b8b30', // usedbooks
      '4bf58dd8d48988d129951735', // trainstation
      '52f2ab2ebcbc57f1066b8b51', // trams
    ];

    public function __construct()
    {
        $this->baseAPI .= '?client_id=' . env('FOURSQUARE_CLIENT_ID');
        $this->baseAPI .= '&client_secret=' . env('FOURSQUARE_CLIENT_SECRET');
        $this->baseAPI .= '&v=20180323';
        $this->baseAPI .= '&intent=checkin';
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

        return $request->get($url)->body->response->venues;
    }
}

// curl - X GET - G  \'https://api.foursquare.com/v2/venues/explore' \-d client_id = "CLIENT_ID"  \-d client_secret = "CLIENT_SECRET"  \-d v = "20180323"  \-d ll = "40.7243,-74.0018"  \-d query = "coffee"  \-d limit = 1
