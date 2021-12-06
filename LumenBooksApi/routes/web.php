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


$router->get('/books', 'BookController@index'); //index
$router->post('/books', 'BookController@store'); //store
$router->get('/books/{author}','BookController@show'); //show
$router->put('/books/{id}','BookController@update'); //update
$router->delete('/books/{id}','BookController@destroy'); //delete
