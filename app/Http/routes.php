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

Route::get('/', 'WelcomeController@index');
Route::get('articles/{id}', 'ArticleController@category');

Route::get('article/{id}', 'ArticleController@show');

Route::get('tag/{id}', 'ArticleController@tag');

Event::listen('illuminate.query', function($query)
{
    \Log::debug($query);
});