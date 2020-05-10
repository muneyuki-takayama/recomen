@extends('app')

@section('title', $user->name)

@section('content')
    @include('nav')
    <div class="continer">
        @include('users.user')
        @include('users.tabs', ['hasProducts' => true, 'hasLikes' => false])
        @foreach($products as $product)
            @include('products.card')
        @endforeach
    </div>
@endsection