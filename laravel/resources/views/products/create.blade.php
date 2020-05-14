@extends('app')

@section('title', 'RECOMEN! | Post')

@include('nav')

@section('content')
    <div>
        @include('error_message')
        <form method="POST" action="{{ route('products.store') }} " enctype="multipart/form-data"> 
            @csrf
        @include('products.form_photo')
        @include('products.form_title')
        <button type="submit" class="">Post</button>

        </form>
    </div>
@endsection