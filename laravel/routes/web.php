<?php

Auth::routes();
Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products', 'ProductController')->except(['index'])->middleware('auth');
