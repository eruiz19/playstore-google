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

Route::get('/', function () {


	/*$user = Auth::user();

	if (Auth::check()) {

		if ($user->esAdmin()) {
			
			return true;
		} else {

			return false;
		}
	}*/

    return view('welcome');
})->name('welcome.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/me/dev', 'DeveloperController@index')->name('developer.index');

Route::get('/me/client', 'ClientController@index')->name('client.index');*/

// Rutas para recursos

Route::resource('developer', 'DeveloperController');
Route::resource('client', 'ClientController');
