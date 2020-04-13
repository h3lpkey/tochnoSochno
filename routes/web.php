<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('landing');

Auth::routes();

//Админка
Route::group(['middleware' => 'admin'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products', 'ProductController');
    Route::resource('/address', 'AdressController');
});


