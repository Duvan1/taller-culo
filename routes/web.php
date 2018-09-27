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
//use App\Post;

Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show')->name('post.show');
Route::get('/categorias/{category}', 'CategoryController@show')->name('category.show');
Route::get('/tags/{tag}', 'TagController@show')->name('tag.show');

Route::group([
	'prefix'=>'admin',
	'namespace'=>'Admin',
	'middleware'=>'auth'], function ()
	{
		Route::get('posts','AdminController@index')->name('admin.posts.index');
		Route::get('posts/create','AdminController@create')->name('admin.ports.create');
		Route::post('posts','AdminController@store')->name('admin.post.store');
		Route::get('posts/{post}','AdminController@edit')->name('admin.posts.edit');
		Route::put('posts/{post}','AdminController@update')->name('admin.posts.update');
		Route::delete('posts/{post}','AdminController@destroy')->name('admin.post.destroy');
		
		Route::post('posts/{post}/photos','PhotosController@store')->name('admin.posts.photos.store');
		Route::delete('photos/{photo}','PhotosController@destroy')->name('admin.photos.destroy');
		Route::get('/', function () {
		    return view('admin.dashboard');
		})->middleware('auth')->name('dashboard');
	});



Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');