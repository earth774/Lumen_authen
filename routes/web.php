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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function ($router) {
    // Users
    $router->post('user/register', 'UserController@register');
    $router->post('user/login', ['uses' => 'UserController@login']);
});

$router->group(['prefix' => 'api/v1', 'middleware' => 'jwt.auth'], function ($router) {
    $router->get('test', 'UserController@MakeData');

});
