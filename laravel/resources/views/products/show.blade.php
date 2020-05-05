@extends('app')

@section('title', 'Recomen! | Detail')

@section('content')
@include('nav')
<div class="">
    <div class="">
        <div>
            画像表示領域
            ＋タグもここに表示
        </div>
        <div>
        <span>{{ $product->user->name }}</span>
        <span>+フォロー</span>


            {{ $product->title }}
            {{ $product->body}}

            <span>TW/FB</span>
            <span>いいいねボタン</span>
        </div>

    </div>

</div>