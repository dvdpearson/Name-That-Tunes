<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    $data = array(
        'pinkScore' => Team::where('name', 'pink')->firstOrFail()->pts,
        'yellowScore' => Team::where('name', 'yellow')->firstOrFail()->pts,
        'greenScore' => Team::where('name', 'green')->firstOrFail()->pts
    );
	return View::make('home', $data);
});

Route::put('/team/{team}', function($teamName)
{
    $team = Team::where('name', $teamName)->firstOrFail();
    $team->pts = Input::get('pts');
    $team->save();
    return $team;
});

Route::get('/game', function()
{
    $game = Game::where('used', '!=', '1')->orderBy(DB::raw('RAND()'))->firstOrFail();
    //$game->used = 1;
    //$game->save();
    return $game;
});

Route::get('/game/{id}', function($id)
{
    $game = Game::find($id);
    return $game;
});

Route::filter('after', function($response)
{
// No caching for pages
    $response->header("Pragma", "no-cache");
    $response->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0");
});