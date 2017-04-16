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
Route::get('profil','IndexController@displayProfil');

Route::get('login','IndexController@displayLogin');

Route::get('logout','IndexController@logout');

Route::get('register','IndexController@displayCreateAcc');

Route::get('club','IndexController@displayClub');

Route::get('event','IndexController@displayEvent');

Route::get('event/new','EventController@displayCreate');

Route::get('admin','IndexController@displayAdmin');

Route::get('store','IndexController@displayStore');

Route::get('store/buy','IndexController@displayStoreBuy');

Route::get('/','IndexController@displayHomepage');

Route::get('user','IndexController@displayProfil');

Route::get('user/{id}','UserController@show');

Route::get('dbtries', 'IndexController@displayDBTries');

/*
|-----------|
| POST part |
|-----------|
*/

Route::post('login','UserController@check');

Route::post('register','UserController@store');

Route::post('create','EventController@store');

