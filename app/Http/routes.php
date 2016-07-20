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
    return view('welcome');
});

// User login/registration
Route::auth();

// User dashboard
Route::get('/home', 'HomeController@index');
Route::get('/cv', 'CvController@index');

// APIs
Route::group([
	'namespace' => 'Api',
 	'middleware' => 'auth',
 	'prefix' => 'api',
], function () {

	Route::group([
		'namespace' => 'Cv',
		'prefix' => 'cv',
	], function () {
		Route::resource('profile', 'ProfileController', ['only' => ['store', 'update']]);
		Route::resource('work', 'WorkController', ['only' => ['store', 'update', 'destroy']]);
		Route::resource('school', 'SchoolController', ['only' => ['store', 'update', 'destroy']]);
		Route::resource('skill', 'SkillController', ['only' => ['store', 'update', 'destroy']]);
		Route::resource('award', 'AwardController', ['only' => ['store', 'update', 'destroy']]);
		Route::resource('interest', 'InterestController', ['only' => ['store', 'update', 'destroy']]);
	});

});


