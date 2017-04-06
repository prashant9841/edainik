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

Route::get('/', function (App\Post $post) {
    return view('welcome')->with('posts',$post->approved()->get());
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

Route::get('/posts', 'Site\PostController@index');
Route::get('/posts/{post}', 'Site\PostController@show'); 

/*
|--------------------------------------------------------------------------
| Category Routes
|--------------------------------------------------------------------------
| All the routes for category are listed below
|
*/
Route::get('/categories', 'Site\CategoryController@index');
Route::get('/categories/{category}', 'Site\CategoryController@show'); 

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix'=>'/dashboard'],function(){

	/*
	|--------------------------------------------------------------------------
	| Post Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/posts','UserPostController@index');
	Route::post('/posts', 'UserPostController@store');
	Route::get('/posts/create', 'UserPostController@create');
	Route::get('/posts/{post}','UserPostController@show');
	Route::put('/posts/{post}', 'UserPostController@update');
	Route::get('/posts/{post}/edit', 'UserPostController@edit');
	Route::delete('/posts/{post}','UserPostController@destroy');
	
	/*
	|--------------------------------------------------------------------------
	| Category Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/categories', 'CategoryController@index');
	Route::post('/categories', 'CategoryController@store');
	Route::get('/categories/create', 'CategoryController@create');
	Route::get('/categories/{category}', 'CategoryController@show');
	Route::delete('/categories/{category}','CategoryController@destroy');
	Route::get('/categories/{category}/edit', 'CategoryController@edit');

	/*
	|--------------------------------------------------------------------------
	| Menu Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/menus','MenuController@index');
	Route::post('/menus','MenuController@store');
	Route::delete('/menus/{id}','MenuController@destroy');
	

});

