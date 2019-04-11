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

Route::get('/', function () {return view('auth.register');});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role:admin']],
    function () {
        Route::resource('admin', 'AdminController');
    });
Route::group(['middleware' => ['auth', 'role:user']],
    function () {
        //Route::get('users/{users}', 'UsersController@index');

    });
Route::resource('details', 'DetailsController');
//Route::get('users/{id}', ['as' => 'users.index', 'uses' => 'UsersController@index']);
//Route::resource('users', 'UsersController');
Route::get('users/{users}', 'UsersController@index')->name('users');
Route::post('users', 'UsersController@store')->name('users.store');
//Route::resource('user', 'UsersController@update')->name('user');
//Route::post('users/{users}/create', 'UsersController@create')->name('users.create');
Auth::routes();

Route::get('index', 'StaticsController@index')->name('index');
