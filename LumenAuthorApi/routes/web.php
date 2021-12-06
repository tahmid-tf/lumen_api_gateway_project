<?php

use App\Http\Controllers\AuthorController;



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

$router->get('/authors', 'AuthorController@index'); //index
$router->post('/authors', 'AuthorController@store'); //store
$router->get('/authors/{author}','AuthorController@show'); //show
$router->put('/authors/{id}','AuthorController@update'); //update
$router->delete('/authors/{id}','AuthorController@destroy'); //delete

