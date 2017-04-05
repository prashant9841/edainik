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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
| All the routes for post are listed below
|
*/

Route::post('/posts', 'Site\PostController@store');
Route::put('/posts/{post}', 'UserPostController@store');
Route::get('/posts/create', 'UserPostController@create');
Route::delete('/posts/{post}','UserPostController@destroy');
Route::get('/posts/{post}/edit', 'UserPostController@edit');

//Everyone can see 
Route::get('/posts', 'Site\PostController@index');
Route::get('/posts/{post}', 'Site\PostController@show'); 

/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
| All the routes for category are listed below
|
*/
Route::get('/categories', 'CategoryController@index');
Route::post('/categories', 'CategoryController@store');
Route::get('/categories/create', 'CategoryController@create');
Route::get('/categories/{category}', 'CategoryController@show');
Route::delete('/categories/{category}','CategoryController@destroy');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
