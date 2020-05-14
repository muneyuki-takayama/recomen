<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index() {
        $products = Product::all()->sortByDesc('created_at');

        return view('products/index', ['products' => $products]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('products.create', [
            'allTagNames' => $allTagNames,
        ]);
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

        $request->tags->each(function ($tagName) use ($product) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $product->tags()->attach($tag);
        });

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $tagNames = $product->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('products.edit' , [
            'product' => $product,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
     $product->fill($request->all());

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

      $product->tags()->detach();
      $request->tags->each(function ($tagName) use ($product) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $product->tags()->attach($tag);
      });

     $product->save();

     return redirect()->route('products.index');
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

    public function like(Request $request, Product $product)
    {
        $product->likes()->detach($request->user()->id);
        $product->likes()->attach($request->user()->id);

        return [
            'id' => $product->id,
            'countLikes' => $product->count_likes,
        ];
    }

    public function unlike(Request $request, Product $product)
    {
        $product->likes()->detach($request->user()->id);

        return [
            'id' => $product->id,
            'countLikes' => $product->count_likes,
        ];
    }


}
