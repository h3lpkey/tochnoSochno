<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('landing');

Auth::routes();

Route::post('/getProducts', 'HomeController@getProducts')->name('getProducts');
Route::post('/getAddresses', 'HomeController@getAddresses')->name('getAddresses');
Route::post('/callback', 'HomeController@callback')->name('callback');

//Админка
Route::group(['middleware' => 'admin'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products', 'ProductController');
    Route::resource('/address', 'AdressController');
});


