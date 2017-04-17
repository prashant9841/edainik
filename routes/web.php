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

Route::get('/', 'Site\PagesController@homepage');

Auth::routes();

Route::get('/logout',function(){
	 Auth::logout();
	return redirect('/');
});

/*
|--------------------------------------------------------------------------
| Post Routes
|--------------------------------------------------------------------------
| All the routes for post are listed below
|
*/

Route::get('/news', 'Site\PostController@index');
Route::get('/news/{post}', 'Site\PostController@show'); 

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

Route::group(['middleware' => ['web','auth'],'prefix'=>'/dashboard'],function(){

	/*
	|--------------------------------------------------------------------------
	| Pages Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/','DashboardController@index');

	Route::get('/ajax/posts','AjaxController@getAllPosts');

	/*
	|--------------------------------------------------------------------------
	| User Post Routes
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
	| All Posts for admin Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/all-posts','AdminPostController@index');
	Route::get('/all-posts/{post}','AdminPostController@show');
	//Route::get('/all-posts/create', 'AdminPostController@create');
	//Route::post('/all-posts', 'AdminPostController@store');
	Route::put('/all-posts/{post}', 'AdminPostController@update');
	Route::get('/all-posts/{post}/edit', 'AdminPostController@edit');
	Route::delete('/all-posts/{post}','AdminPostController@destroy');


	/*
	|--------------------------------------------------------------------------
	| Admin Post Verifications Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/posts/{post}/verify','AdminPostController@verify');
	Route::get('/posts/{post}/unverify','AdminPostController@unVerify');


	/*
	|--------------------------------------------------------------------------
	| Images Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/medias','UserMediaController@index'); 
	Route::post('/medias','UserMediaController@store'); 

	Route::get('/medias/{media}','UserMediaController@show'); 
	Route::get('/medias/create','UserMediaController@create'); 

	Route::put('/medias/{media}','UserMediaController@update'); 
	Route::get('/medias/{media}/edit','UserMediaController@edit'); 

	//Post Images Manipulations
	Route::get('/medias/removeImage/{mediaId}','PostMediaController@deleteImage'); //Remove an image
	Route::get('/medias/remove/{postId}/{mediaId}','PostMediaController@removeImage'); //Remove an image
	Route::get('/medias/detach/{postId}/{mediaId}','PostMediaController@removeImage'); //Detach image from model
	Route::get('/medias/remove-all/{postId}','PostMediaController@removeByPost'); // Remove all the images in post

	Route::get('/medias/set-featured/{postId}/{imageId}','PostMediaController@makeTitleImage'); // Remove all the images in post
	
	/*
	|--------------------------------------------------------------------------
	| Category Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/categories', 'CategoryController@index');
	Route::post('/categories', 'CategoryController@store');
	Route::get('/categories/create', 'CategoryController@create');
	Route::get('/categories/{category}', 'CategoryController@show');
	Route::put('/categories/{category}', 'CategoryController@update');
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
	/*
	|--------------------------------------------------------------------------
	| Users Routes
	|--------------------------------------------------------------------------
	*/
	
	Route::get('/users','UsersController@index');	
	/*
	|--------------------------------------------------------------------------
	| Settings Routes
	|--------------------------------------------------------------------------
	*/
	Route::get('/settings','SettingsController@index');
	Route::get('/settings/password','SettingsController@password');
	Route::post('/settings/password','SettingsController@changePassword');
});

