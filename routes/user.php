<?php


Auth::routes();

Route::get('/home', 'UserController@index')->name('home');


Route::group(['prefix' => 'profile', 'as' =>'profile.'], function () {

    Route::get('/', 'ProfileController@index')->name('index');
    Route::get('/create', 'ProfileController@create')->name('create');
    Route::post('/store', 'ProfileController@store')->name('store');
    Route::post('/edit', 'ProfileController@edit')->name('edit');
    Route::post('/update/{profile}', 'ProfileController@update')->name('update');

});