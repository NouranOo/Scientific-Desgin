<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');
Route::get('city/country/{id}', 'HomeController@getCity');
Route::post('get/order/details', 'HomeController@orderDetails');
Route::post('create/order', 'HomeController@createOrder');


