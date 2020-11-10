<?php

Route::get('login', 'AdminController@showLoginPage');
Route::post('login', 'AdminController@login')->name('admin.login');

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('logout', 'AdminController@logout')->name('adminLogout');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('gov', 'GovController@index');
    Route::post('edit/gov/{id}', 'GovController@edit');
    Route::get('city', 'CityController@index');
    Route::post('edit/city/{id}', 'CityController@edit');
    Route::get('delete/city/{id}', 'CityController@delete');
    Route::post('create/city', 'CityController@create');

    Route::get('order/{status?}', 'OrderController@index');
    Route::post('edit/order/{id}', 'OrderController@edit');
    Route::get('delete/order/{id}', 'OrderController@delete');
    Route::post('filter/orders', 'OrderController@filter');

    Route::get('social', 'SettingController@social');
    Route::post('edit/setting', 'SettingController@edit');

    Route::get('contactus', 'ContactUsController@index');

    Route::get('shiping', 'ShipingController@index');
    Route::post('create/shiping','ShipingController@create');
    Route::post('edit/shiping/{id}','ShipingController@edit');
    Route::get('delete/shiping/{id}','ShipingController@delete');
    Route::post('orders/edit/','OrderController@editOrders');

});

