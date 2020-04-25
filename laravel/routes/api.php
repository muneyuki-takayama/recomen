<?php

use Illuminate\Http\Request;

Auth::routes();
Route::resource('/products', 'ProductController');