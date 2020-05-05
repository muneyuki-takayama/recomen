<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index() {
        $products = Product::all()->sortByDesc('created_at');

        return view('products/index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->user_id = $request->user()->id;

        $image_1 = $request->file('pic1');
        $path1 = Storage::disk('s3')->putFile('recomen', $image_1, 'public');
        $product->pic1 = Storage::disk('s3')->url($path1);

        if(($request->file('pic2')))
        {
            $image_2 = $request->file('pic2');
            $path2 = Storage::disk('s3')->putFile('recomen', $image_2, 'public');
            $product->pic2 = Storage::disk('s3')->url($path2);
        }

        if(($request->file('pic3')))
        {
            $image_3 = $request->file('pic3');
            $path3 = Storage::disk('s3')->putFile('recomen', $image_3, 'public');
            $product->pic3 = Storage::disk('s3')->url($path3);
        }
        
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(ProductRequest $request, Product $product)
    {
     $product->fill($request->all());

     //ここに画像の更新ロジックも記述する。

     $product->save();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

}
