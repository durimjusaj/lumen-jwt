<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$api = $router->app->make(Dingo\Api\Routing\Router::class);

$router->get('/', function () use ($api) {
    return app()->version();
});

$api->version('v1', ['namespace' => 'App\Http\Controllers'], function ($api) {

	$api->post('login', [
        'uses' => 'AuthController@login',
        'as' => 'api.user.login'
    ]);

    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('/', function () use ($api) {
		    return app()->version();
		});
    });
});