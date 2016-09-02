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

//Route::get('/', function () {
//    return view('welcome');
//});

// index
Route::get('/', ['as' => 'projects.index', 'uses' => 'IndexController@index']);
Route::post('validate', ['as' => 'projects.validate', 'uses' => 'IndexController@validate_model']);
Route::post('store', ['as' => 'projects.store', 'uses' => 'IndexController@store']);

// static
Route::get('static/privacy', ['as' => 'static.privacy', 'uses' => 'StaticController@privacy']);
Route::get('static/nda', ['as' => 'static.nda', 'uses' => 'StaticController@nda']);

// auth
Route::get('auth/register', ['as' => 'auth.register.get', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register-ajax', ['as' => 'auth.register.ajax', 'uses' => 'Auth\AuthController@ajaxRegister']);

Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@postLogout']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::post('auth/login', ['as' => 'auth.login.post', 'uses' => 'Auth\AuthController@postLogin']);
