@extends('app')

@section('title', 'RECOMEN! | Products')

@section('content')
@include('nav')

<div class="container">
    @foreach($products as $product)
        @include('products.card')
    @endforeach
</div>
@endsection
