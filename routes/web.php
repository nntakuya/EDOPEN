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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/sign_up','UsersController@create');
Route::post('/users/sign_up','UsersController@store');
Route::get('/index','HomeController@index');


Route::get('users/login','UsersController@getAuth');
Route::post('users/login','UsersController@postAuth');
Route::get('users/logout','UsersController@getLogout');
Route::get('user/edit','UsersController@edit');
Route::post('user/edit','UsersController@update');
