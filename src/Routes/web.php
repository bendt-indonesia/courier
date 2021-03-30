<?php

Route::group([
    'namespace' => 'Bendt\Courier\Controllers',
    'middleware' => 'web'
], function() {
    Route::get('/bc/province', 'ProvinceController@index')->name('bendt_courier.province');
    Route::get('/bc/province/{id}', 'ProvinceController@show')->name('bendt_courier.province.show');
    Route::get('/bc/city', 'CityController@index')->name('bendt_courier.city');
    Route::get('/bc/city/{id}', 'CityController@provinces')->name('bendt_courier.city.show');
    Route::get('/bc/city/{id}', 'CityController@provinces')->name('bendt_courier.city.show');
    Route::post('/bc/shippingFee', 'CourierController@estimate')->name('bendt_courier.city.show');
});

