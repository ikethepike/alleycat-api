@php 

use AlleyCat\Repositories\FoursquareRepository; 

$repository = new FoursquareRepository();
dd($repository->getLocations(59.309160, 18.080790));


@endphp 
@extends("templates.default")