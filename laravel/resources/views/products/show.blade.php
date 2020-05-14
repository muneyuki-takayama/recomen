@extends('app')

@section('title', 'Recomen! | Detail')

@section('content')
@include('nav')
<div class="">
    <div class="">
        <div>
           <div>
                <img src="{{ $product->pic1}}" alt="">
                @if($product->pic2)
                    <img src="{{ $product->pic2}}" alt="">
                @endif
                @if($product->pic3)
                    <img src="{{ $product->pic3}}" alt="">
                @endif
           </div>

            <div class="tag-container">
                @foreach ($product->tags as $tag)
                    @if($loop->first)
                    <div>
                        <div>
                    @endif
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                                {{ $tag->hashtag}}
                            </a>
                    @if($loop->last)
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div>
        <span>{{ $product->user->name }}</span>
        <span>+フォロー</span>


            {{ $product->title }}
            {{ $product->body}}

            <div>FB/TW</div>
            <div class="">
                <product-like
                :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($product->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('products.like', ['product' => $product]) }}"
                >
                </product-like>
            </div>
        </div>

    </div>

</div>
@endsection