<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/appointments', 'AppointmentController@index');
    Route::get('/appointments/{appointment}', 'AppointmentController@show');
});

