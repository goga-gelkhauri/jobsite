<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'UiController@index');
Route::get('/alljobs', 'UiController@alljobs');
Route::get('/singleJob/{id}', 'UiController@singleJob');
Route::get('/contact', 'UiController@contact');
Route::post('/contact-us', 'UiController@contactUs');
Route::get('/about', 'UiController@about');
Route::get('/blog', 'UiController@blog');
Route::get('/company/{query?}', 'UiController@company');
Route::get('/singleCompany/{id}', 'UiController@singlecompany');
Route::get('/filterJob', 'UiController@filterjob');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('jobs','JobController');
    Route::resource('posts','PostController');
    Route::resource('category','CategoryController');
});