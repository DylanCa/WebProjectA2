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

Route::get('club','IndexController@displayClub');

Route::get('event','IndexController@displayEvent');

Route::get('admin','IndexController@displayAdmin');

Route::get('store','IndexController@displayStore');

Route::get('store/buy','IndexController@displayStoreBuy');

Route::get('/','IndexController@displayHomepage');

// Route::get('/', function () {
//      return view('welcome');
   // return 'hello World';

//}); 

Route::get('test', function(){

	return 'The test is functional!';
});

Route::get('test/{id}', function($id){

	return "The test is functional! Your id is equal to: $id";

});
