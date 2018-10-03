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

Route::get('/', 'Frontend\HomeController@index' );

Route::get('/about-us', 'Frontend\HomeController@getAbout' );

Route::get('/contact-us', 'Frontend\HomeController@getContact' );

Route::post('contact/save', 'Frontend\HomeController@postContact' );
