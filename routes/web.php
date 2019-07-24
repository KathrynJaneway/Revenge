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

Route::get('/', 'PageController@index');
Route::get('/contact', 'PageController@contact');
Route::get('/impressum', 'PageController@contact');
Route::get('/about', 'PageController@contact');
Route::get('/projects', 'PageController@contact');


Route::get('/login', function () {
    return view('welcome');
});
/*
Route::get('/projects', function () {
	return view('projects');
});
*/
Route::get('/demo', function () {

    return view('demo');

});

/*
Route::get('/blub', function () {
    return view('blub');
});

*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
