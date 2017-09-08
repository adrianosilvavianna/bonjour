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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@index')->name('index');
Route::get('/profile/create', 'ProfileController@create')->name('create');
Route::post('/profile/update', 'ProfileController@update')->name('update');
Route::post('/profile/store/{profile}', 'ProfileController@store')->name('store');
Route::post('/profile/edit', 'ProfileController@edit')->name('edit');
Route::delete('/profile/delete', 'ProfileController@delete')->name('delete');


