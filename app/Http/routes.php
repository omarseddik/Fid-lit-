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

Route::get('/',['middleware' => 'auth', function () {
    return view('dashboard');
}]);

/*Route Client*/
Route::get('client',['middleware' => 'auth', 'uses'=>'ClientController@index']);
Route::get('client/add',['middleware' => 'auth','uses'=>'ClientController@create']);
Route::match(['get', 'put'],'client/edit/{id}',['middleware' => 'auth','uses'=> 'ClientController@edit'])->where('id', '[0-9]+');
Route::match(['post'],'client/add',['middleware' => 'auth', 'uses'=>'ClientController@add']);

/*Authentication routes*/
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*Registration routes*/
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');