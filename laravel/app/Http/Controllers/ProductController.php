<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all()->sortByDesc('created_at');

        return view('products/index', ['products' => $products]);
    }
}
