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

use App\Category;

Route::get('/', 'UserController@index');
Route::get('/aboutus', 'UserController@about');
Route::get('/careers', 'UserController@careers');
Route::get('/products', 'UserController@showProducts');
Route::get('/products/{id}', 'UserController@showProduct');
Route::get('/category/{id}', 'UserController@showCategory');

Route::post('email', 'UserController@email');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Routes for Categories
Route::get('/admin', 'ProductController@index');
Route::get('/admin/categories', 'CategoryController@home');
Route::get('/admin/categories/addnew', 'CategoryController@index');
Route::get('/admin/categories/{id}', 'CategoryController@show');
Route::post('/admin/categories/modify', 'CategoryController@create');

// Routes for Products
Route::get('/admin/products', 'ProductController@index');
Route::get('/admin/products/addnew', 'ProductController@create');
Route::post('/admin/products/store', 'ProductController@store');
Route::get('/admin/products/{id}', 'ProductController@show');


