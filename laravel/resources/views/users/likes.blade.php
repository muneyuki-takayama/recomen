@extends('app')

@section('title', $user->name . ' | Likes')

@section('content')
    @include('nav')

    <div class="container">
        @include('users.user')
        @include('users.tabs', ['hasProducts' => false, 'hasLikes' => true])
        
        @foreach($products as $product)
            @include('products.card')
        @endforeach
    </div>

@endsection