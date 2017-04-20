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

Route::get('login','IndexController@displayLogin');

Route::get('logout','IndexController@logout');

Route::get('register','IndexController@displayCreateAcc');

Route::get('profil','UserController@showUser');

Route::get('club','IndexController@displayClub');

Route::get('event','IndexController@displayEvent');

Route::get('event/new/','IndexController@displayCreate');

Route::get('admin','IndexController@displayAdmin');

Route::get('store','StoreController@displayStore');

Route::get('store/buy','IndexController@displayStoreBuy');

Route::get('/','IndexController@displayHomepage');

Route::get('user','IndexController@displayProfil');

Route::get('dbtries', 'IndexController@displayDBTries');

Route::get('bde', 'IndexController@displayBDE');

/*
|-----------|
| POST part |
|-----------|
*/

Route::post('login','UserController@check');

Route::post('register','UserController@store');

Route::post('profile','UserController@changeProfile');

Route::post('create/event','EventController@store');

Route::post('create/club','ClubController@store');

Route::post('event/new/','IndexController@displayCreate');

Route::post('club/new/','IndexController@displayClubCreate');

Route::post('admin/club/','AdminController@club');

Route::post('admin/event/','AdminController@event');

Route::post('bde/signup', 'UserController@bde');


/*
|-----------|
| Values part |
|-----------|
*/

Route::post('event/{id}','EventController@reaction');

Route::get('event/{id}','EventController@show');

Route::get('event/{id}/admin','EventController@admin');

Route::post('event/{id}/admin','EventController@admin');

Route::post('club/{id}','ClubController@reaction');

Route::get('club/{id}','ClubController@show');

Route::get('user/{id}','UserController@show');

Route::get('store/{id}','StoreController@show');


Route::get('club/{id}/admin','ClubController@admin');

Route::post('club/{id}/admin','ClubController@admin');

Route::post('club/{id}/admind','ClubController@admind');

Route::get('store/{id}','StoreController@show');

