@extends('app')

@section('title', 'Edit')

@include('nav')

@section('content')
    <div>
        @include('error_message')
        <form method="POST" action="{{ route('products.update', ['product' => $product]) }} " enctype="multipart/form-data"> 
            @method('PATCH')
            @csrf
        @include('products.form_photo')
        @include('products.form_title')
        <button type="submit" class="">Update</button>

        </form>
@endsection