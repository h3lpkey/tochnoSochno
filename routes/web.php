<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('landing');

Route::post('/getProducts', 'HomeController@getProducts')->name('getProducts');
Route::post('/getAddresses', 'HomeController@getAddresses')->name('getAddresses');

//Админка
// Route::group(['middleware' => 'admin'], function () {
//     Route::get('/home', 'HomeController@index')->name('home');
//     Route::resource('/products', 'ProductController');
//     Route::resource('/address', 'AdressController');
// });
Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');
Route::resource('/products', 'ProductController')->middleware('admin');
Route::resource('/address', 'AdressController')->middleware('admin');

Auth::routes();
