<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});



Route::get('/users', 'UsersController@index');

Route::get('/users/{user}', 'UsersController@show')->where('user', '[0-9]+');

Route::get('/users/create', 'UsersController@create');

Route::post('/users', 'UsersController@store');

Route::get('/users/{user}/edit', 'UsersController@edit')->where('user', '[0-9]+');

Route::put('/users/{user}', 'UsersController@update')->where('user', '[0-9]+');

Route::delete('/users/{user}', 'UsersController@destroy')->where('user', '[0-9]+');





Route::get('/projects', 'ProjectsController@index');

Route::get('/projects/{project}', 'ProjectsController@show')->where('project', '[0-9]+');

Route::get('/projects/create', 'ProjectsController@create');

Route::post('/projects', 'ProjectsController@store');

Route::get('/projects/{project}/edit', 'ProjectsController@edit')->where('project', '[0-9]+');

Route::put('/projects/{project}', 'ProjectsController@update')->where('project', '[0-9]+');

Route::delete('/projects/{project}', 'ProjectsController@destroy')->where('project', '[0-9]+');





Route::get('/categories', 'CategoriesController@index');

Route::get('/categories/{category}', 'CategoriesController@show')->where('category', '[0-9]+');

Route::get('/categories/create', 'CategoriesController@create');

Route::post('/categories', 'CategoriesController@store');

Route::get('/categories/{category}/edit', 'CategoriesController@edit')->where('category', '[0-9]+');

Route::put('/categories/{category}', 'CategoriesController@update')->where('category', '[0-9]+');

Route::delete('/categories/{category}', 'CategoriesController@destroy')->where('category', '[0-9]+');





Route::get('/issues', 'IssuesController@index');

Route::get('/issues/{issue}', 'IssuesController@show')->where('issue', '[0-9]+');

Route::get('/issues/create', 'IssuesController@create');

Route::post('/issues', 'IssuesController@store');

Route::get('/issues/{issue}/edit', 'IssuesController@edit')->where('issue', '[0-9]+');

Route::put('/issues/{issue}', 'IssuesController@update')->where('issue', '[0-9]+');

Route::delete('/issues/{issue}', 'IssuesController@destroy')->where('issue', '[0-9]+');





Route::get('photos/upload', 'PhotosController@index');

Route::post('photos/uploaded', 'PhotosController@upload');

// Route::get('/users/{name?}', 'UsersController@showName')->where(['name' => '[A-z][A-z0-9]*']);

// Route::get('/users/{id}/{name?}', 'UsersController@showIdAndName')->where(['id' => '[0-9]+', 'name' => '[A-z][A-z0-9]*']);
