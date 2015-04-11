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

//Auth controller for handle user
Route::post('authenticate', 'AuthController@authenticate');
Route::get('logout', 'AuthController@logout');
Route::get('login', function() {
    return view('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    Route::get('/', function()
    {
        return view('admin.administrator');
    });

    Route::get('/user/data', ['as' => 'admin.user.data', 'uses' => 'UserController@data'] );

    Route::resource('/user', 'UserController');

    Route::get('/menu/data', ['as' => 'admin.menu.data', 'uses' => 'MenuController@data']);

    Route::resource('/menu', 'MenuController');
});

Route::group(['prefix' => 'author', 'middleware' => 'author'], function()
{
    Route::get('/', function()
    {
        return view('admin.author');
    });
});

Event::listen('illuminate.query', function($query)
{
    \Log::debug($query);
});