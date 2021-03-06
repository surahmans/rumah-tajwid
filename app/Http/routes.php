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
Route::get('articles/{slug}', 'ArticleController@category');

Route::get('article/{slug}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);

Route::get('page/{slug}', ['as' => 'page.show', 'uses' => 'PageController@show']);

Route::get('tag/{slug}', 'ArticleController@tag');

//Auth controller for handle user
Route::post('authenticate', 'AuthController@authenticate');
Route::get('logout', 'AuthController@logout');
Route::get('login', ['middleware' => 'guest', function() {
    return view('admin.login');
}]);

Route::group(['middleware' => 'auth'], function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
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

    Route::get('/submenu/data', ['as' => 'admin.submenu.data', 'uses' => 'SubmenuController@data']);

    Route::resource('/submenu', 'SubmenuController');

    Route::get('/slide/data', ['as' => 'admin.slide.data', 'uses' => 'SlideController@data']);

    Route::resource('/slide', 'SlideController');

    Route::get('/category/data', ['as' => 'admin.category.data', 'uses' => 'CategoryController@data']);

    Route::resource('/category', 'CategoryController');

    Route::get('/basic', ['as' => 'admin.config', 'uses' => 'ConfigurationController@index']);

    Route::PUT('/basic/{id}', 'ConfigurationController@update');

    Route::get('/article/data', ['as' => 'admin.article.data', 'uses' => 'ArticleController@data']);

    Route::resource('/article', 'ArticleController', ['except' => ['show', 'edit']]);

    Route::GET('/article/{id}/edit', ['as' => 'admin.article.edit', 'uses' => 'ArticleController@edit']);

    Route::resource('/widget', 'WidgetController', ['only' => ['index', 'update']]);

    Route::get('/tag/data', ['as' => 'admin.tag.data', 'uses' => 'TagController@data']);

    Route::resource('/tag', 'TagController', ['except' => 'show']);

    Route::get('/page/data', ['as' => 'admin.page.data', 'uses' => 'PageController@data']);

    Route::resource('/page', 'PageController', ['except' => 'show']);

    Route::POST('config/menu/', ['as' => 'admin.config.menu.order', 'uses' => 'MenuController@updateOrder']);

    Route::get('config/menu/', ['as' => 'admin.config.menu', 'uses' => 'MenuController@indexOrder']);

    Route::POST('config/categories/', ['as' => 'admin.config.categories.order', 'uses' => 'CategoryController@updateOrder']);

    Route::get('config/categories/', ['as' => 'admin.config.categories', 'uses' => 'CategoryController@indexOrder']);

    Route::PUT('/article/published/{id}', ['as' => 'admin.article.published', 'uses' => 'ArticleController@published']);
});

Route::group(['prefix' => 'author', 'middleware' => 'author'], function()
{
    Route::get('/', function()
    {
        return view('admin.author');
    });

    Route::get('/article/data', ['as' => 'author.article.data', 'uses' => 'ArticleController@dataAnAuthor']);

    Route::resource('/article', 'ArticleController', ['except' => ['show']]);
});

Route::controller('password', 'Auth\PasswordController');

Route::group(['middleware' => 'auth.basic'], function(){
    Route::get('{any}/settings/{id}', 'UserController@setting');
    Route::PUT('{any}/settings/{id}', 'UserController@saveSetting');
});

Event::listen('illuminate.query', function($query)
{
    \Log::debug($query);
});