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
	return View::make('home');
});

Route::filter('after', function($response)
{
// No caching for pages
    $response->header("Pragma", "no-cache");
    $response->header("Cache-Control", "no-store, no-cache, must-revalidate, max-age=0");
});