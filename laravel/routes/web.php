<?php

Auth::routes();
Route::get('/', 'ProductController@index')->name('products.index');
Route::resource('/products', 'ProductController')->except(['index', 'show'])->middleware('auth')->middleware('auth');
Route::resource('products', 'ProductController')->only(['show']);
Route::prefix('products')->name('products.')->group(function () {
    Route::put('/{product}/like', 'ProductController@like')->name('like')->middleware('auth');
    Route::delete('/{product}/like', 'ProductController@unlike')->name('unlike')->middleware('auth');
}