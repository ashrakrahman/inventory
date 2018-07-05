<?php

Route::get('/login', 'MainController@login')->name('login');
Route::get('/register', 'MainController@register')->name('register');
Route::get('/logout', 'MainController@logout');
Route::get('/', 'MainController@index');
Route::get('/home', 'MainController@dashboard')->name('dashboard');

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::post('/store', ['as' => 'store', 'uses' => 'MainController@storeUserInfo']);
    Route::post('/login', ['as' => 'login', 'uses' => 'MainController@checkUserInfo']);

});

Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::get('/', 'EmployeeController@index');
    Route::post('/store', ['as' => 'store', 'uses' => 'EmployeeController@store']);
    Route::post('/updateinfo', ['as' => 'updateinfo', 'uses' => 'EmployeeController@update']);

});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('/', 'ProductController@index');
    Route::post('/storeproduct', ['as' => 'storeproduct', 'uses' => 'ProductController@store']);
    Route::post('/updateproduct', ['as' => 'updateproduct', 'uses' => 'ProductController@update']);

});

Route::group(['prefix' => 'requirement', 'as' => 'requirement.'], function () {
    Route::get('/', 'RequirementController@index');
    Route::post('/storerequirement', ['as' => 'storerequirement', 'uses' => 'RequirementController@store']);

});

Route::group(['prefix' => 'productholder', 'as' => 'productholder.'], function () {
    Route::get('/', 'ProductHolderController@index');
    Route::post('/storeholder', ['as' => 'storeholder', 'uses' => 'ProductHolderController@store']);
    Route::get('/detail/{id}', ['as' => 'detail', 'uses' => 'ProductHolderController@getDetails']);
    Route::get('/addqrcode/{id}', ['as' => 'addqrcode', 'uses' => 'ProductHolderController@generateQrCode']);

});