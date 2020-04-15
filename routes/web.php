<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['middleware' => 'cors'], function () {
    Route::post('/getProducts', 'HomeController@getProducts')->name('getProducts');
    Route::post('/getAddresses', 'HomeController@getAddresses')->name('getAddresses');
});

//Админка
Route::group(['middleware' => 'admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products', 'ProductController');
    Route::resource('/address', 'AdressController');
});

Route::get('/', function () {
    return view('index');
})->name('landing');