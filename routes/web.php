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


Route::get('/contact', 'PageController@contact');
Route::get('/impressum', 'PageController@impressum');
Route::get('/about', 'PageController@about');
Route::get('/projectlist', 'PageController@projectlist');
Route::get('/project_movie', 'PageController@project_movie');
Route::post('/project_movieAPI', 'PageController@project_movieAPI');
Route::get('/project_havenstones', 'PageController@project_havenstones');
Route::get('/', 'PageController@index');




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
