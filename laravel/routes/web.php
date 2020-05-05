<?php

Auth::routes();
Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products', 'ProductController')->except(['index', 'show'])->middleware('auth')->middleware('auth');
Route::resource('products', 'ProductController')->only(['show']);
