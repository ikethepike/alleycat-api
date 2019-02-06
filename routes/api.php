<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Unprotected user routes */
Route::group(['prefix' => 'user'], function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('exists', 'UserController@exists');
});

/* Protected Resource Routes */
Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('races', 'RaceController');
    Route::resource('competitors', 'CompetitorController');
    Route::resource('stats', 'StatController');
    Route::resource('checkpoints', 'CheckpointController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
