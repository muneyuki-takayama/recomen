<?php

Auth::routes();
Route::get('/', 'ProductController@index')->name('index');
