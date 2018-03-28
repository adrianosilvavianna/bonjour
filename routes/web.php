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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/entrar/facebook', 'Auth\SocialAuthController@entrarFacebook');
Route::get('/retorno/facebook', 'Auth\SocialAuthController@retornoFacebook');
Route::get('/entrar/github', 'Auth\SocialAuthController@entrarGithub');
Route::get('/retorno/github', 'Auth\SocialAuthController@retornoGithub');


