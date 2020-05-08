@extends('app')

@section('title', $tag->hashtag)

@section('content')
    <div>
        <div>
            <h2>{{ $tag->hashtag}}</h2>
            <span>{{ $tag->products->count() }} 件</span>
        </div>
        <div>
            @foreach($tag->products as $product)
                @include('products.card')
            @endforeach
        </div>
    </div>
@endsection