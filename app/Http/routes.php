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

Route::get('/', function () {
    return view('login');
});

Route::post('/auth_ps', ['as'=>'auth_ps', 'uses' => 'adminPanel@login']);

Route::group(['middleware' => 'auth'], function (){

	Route::get('/dashboard', 'adminPanel@index');

	Route::resource('/user','userController');
	Route::get('/active_users', ['uses' =>'userController@index']);
	Route::get('/inactive_users', ['uses' =>'userController@trashed']);
	Route::get('/user/{id}/inactive', ['uses' =>'userController@inactive']);
	Route::get('/user/{id}/untrashed', ['uses' =>'userController@untrashed']);

	Route::resource('/question','questionController');

	Route::resource('/answer','answerController');
});