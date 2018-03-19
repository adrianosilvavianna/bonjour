<?php

Route::get('/home',                         'TripController@index')->name('index');
Route::put('/update',                       'UserController@update')->name('update');

Route::group(['prefix' => 'chat', 'as' =>'chat.'], function () {

    Route::get('/',                         'ChatController@index')->name('index');
    Route::post('/send',                     'ChatController@send')->name('send');
//    Route::get('/create',                   'ProfileController@create')->name('create');
//    Route::post('/store',                   'ProfileController@store')->name('store');
//    Route::get('/{profile}/edit',           'ProfileController@edit')->name('edit');
//    Route::put('/{profile}/update',         'ProfileController@update')->name('update');
});

Route::group(['prefix' => 'profile', 'as' =>'profile.'], function () {

    Route::get('/',                         'ProfileController@index')->name('index');
    Route::get('/create',                   'ProfileController@create')->name('create');
    Route::post('/store',                   'ProfileController@store')->name('store');
    Route::get('/{profile}/edit',           'ProfileController@edit')->name('edit');
    Route::put('/{profile}/update',         'ProfileController@update')->name('update');
});

Route::group(['prefix' => 'vehicle', 'as' =>'vehicle.'], function () {

    Route::get('/',                         'VehicleController@index')->name('index');
    Route::get('/create',                   'VehicleController@create')->name('create');
    Route::post('/store',                   'VehicleController@store')->name('store');
    Route::get('/{vehicle}/edit',           'VehicleController@edit')->name('edit');
    Route::put('/{vehicle}/update',         'VehicleController@update')->name('update');
    Route::get('/{vehicle}/delete',         'VehicleController@delete')->name('delete');
});

Route::group(['prefix' => 'trip', 'as' =>'trip.'], function () {

    Route::get('/',                         'TripController@index')->name('index');
    Route::get('/create',                   'TripController@create')->name('create');
    Route::post('/store',                   'TripController@store')->name('store');
    Route::get('/{trip}/edit',              'TripController@edit')->name('edit');
    Route::put('/{trip}/update',            'TripController@update')->name('update');
    Route::get('/{trip}/show',              'TripController@show')->name('show');
    Route::get('/{trip}/canceled',          'TripController@canceled')->name('canceled');
    Route::get('/{trip}/finish',           'TripController@finish')->name('finish');
    Route::get('/my_trips',                 'TripController@myTrips')->name('myTrips');
    Route::post('/search',                  'TripController@search')->name('search');
});

Route::group(['prefix' => 'meeting', 'as' =>'meeting.'], function () {

    Route::get('/',                         'MeetingController@index')->name('index');
    Route::get('/{trip}/store',             'MeetingController@store')->name('store');
    Route::get('/{trip}/cancel',            'MeetingController@cancel')->name('cancel');
    Route::get('/{trip}/show',              'MeetingController@show')->name('show');
    Route::post('/accept',                  'MeetingController@accept')->name('accept');
    Route::get('/my_rides',                 'MeetingController@myRides')->name('myRides');
});

Route::group(['prefix' => 'evaluation', 'as' =>'evaluation.'], function () {

    Route::get('/',                         'EvaluationController@index')->name('index');
    Route::get('/{trip}/driver',            'EvaluationController@driver')->name('driver');
    Route::get('/{trip}/passenger',         'EvaluationController@passenger')->name('passenger');
    Route::post('/{trip}/store',     'EvaluationController@store')->name('store');
});

Route::group(['prefix' => 'location', 'as' =>'location.'], function () {

    Route::get('/',                         'LocationController@index')->name('index');
    Route::get('/create',                   'LocationController@create')->name('create');
    Route::post('/store',                   'LocationController@store')->name('store');
    Route::get('/{location}/delete',        'LocationController@delete')->name('delete');
});

Route::group(['prefix' => 'config', 'as' =>'config.'], function () {

    Route::get('/',                         'ConfigController@index')->name('index');
    Route::post('/update',                  'ConfigController@update')->name('update');
});
