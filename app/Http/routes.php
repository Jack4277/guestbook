<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'DefaultController@index');
Route::post('/', 'DefaultController@index');
Route::get('/top/{top}/{period?}', 'TopController@index');
Route::get('/authors', 'AuthorsController@index');
Route::get('/api/authors', 'Api\AuthorsController@index');
Route::post('/api/authors/new', 'Api\AuthorsController@insert');

