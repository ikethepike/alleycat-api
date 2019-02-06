<?php

namespace AlleyCat\Http\Controllers;

use AlleyCat\Race;
use Illuminate\Http\Request;
use AlleyCat\Http\Requests\Race\StoreRequest;
use AlleyCat\Repositories\FoursquareRepository;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->user()->load('races')->races;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $foursquare = new FoursquareRepository();
        $fourquare->getLocations($request->longitude, $request->lattitude, $request->count, $request->radius);

        return auth()->user()->races()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Race::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $race = Race::findOrFail($id);
        if ($race->user_id === $request->user()->id) {
            $race->update($request->all());

            $race->save();

            return $race;
        }

        return abort(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $race = Race::findOrFail($id);
        if ($race->user_id === $request->user()->id) {
            $race->destroy();

            return (int) true;
        }

        return abort(401);
    }
}
