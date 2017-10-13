<?php

Route::get('/home', 'UserController@index')->name('home');


Route::group(['prefix' => 'profile', 'as' =>'profile.'], function () {

    Route::get('/',                  'ProfileController@index')->name('index');
    Route::get('/create',            'ProfileController@create')->name('create');
    Route::post('/store',            'ProfileController@store')->name('store');
    Route::get('/{profile}/edit',    'ProfileController@edit')->name('edit');
    Route::post('/{profile}/update', 'ProfileController@update')->name('update');

});

Route::group(['prefix' => 'phone', 'as' =>'phone.'], function () {

    Route::get('/',                 'PhoneController@index')->name('index');
    Route::get('/create',           'PhoneController@create')->name('create');
    Route::post('/store',           'PhoneController@store')->name('store');
    Route::get('/{profile}/edit',   'PhoneController@edit')->name('edit');
    Route::post('/update',          'PhoneController@update')->name('update');

});

Route::group(['prefix' => 'vehicle', 'as' =>'vehicle.'], function () {

    Route::get('/',                 'VehicleController@index')->name('index');
    Route::get('/create',           'VehicleController@create')->name('create');
    Route::post('/store',           'VehicleController@store')->name('store');
    Route::get('/{vehicle}/edit',   'VehicleController@edit')->name('edit');
    Route::post('/{vehicle}/update',          'VehicleController@update')->name('update');
    Route::get('/{vehicle}/delete',          'VehicleController@delete')->name('delete');

});

Route::group(['prefix' => 'trip', 'as' =>'trip.'], function () {

    Route::get('/',                 'TripController@index')->name('index');
    Route::get('/create',           'TripController@create')->name('create');
    Route::post('/store',           'TripController@store')->name('store');
    Route::get('/{trip}/edit',   'TripController@edit')->name('edit');
    Route::get('/show',   'TripController@show')->name('show');
    Route::post('/{trip}/update',          'TripController@update')->name('update');

});

Route::group(['prefix' => 'meeting', 'as' =>'meeting.'], function () {

    Route::get('/',                 'MeetingController@index')->name('index');
    Route::get('/create',           'MeetingController@create')->name('create');
    Route::post('/store',           'MeetingController@store')->name('store');
    Route::get('/{profile}/edit',   'MeetingController@edit')->name('edit');
    Route::post('/update',          'MeetingController@update')->name('update');

});

Route::group(['prefix' => 'location', 'as' =>'location.'], function () {

    Route::get('/',                 'LocationController@index')->name('index');
    Route::get('/create',           'LocationController@create')->name('create');
    Route::post('/store',           'LocationController@store')->name('store');
    Route::get('/{location}/delete',           'LocationController@delete')->name('delete');

});