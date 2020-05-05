@extends('app')

@section('title', 'RECOMEN! | Products')

@section('content')
@include('nav')

<div class="container">
    @foreach($products as $product)
    <div class="" style="width: 200px; height: 200px; padding: 30px">
        
        <div>
            {{ $product->user->name }}
        </div>
        <div>
            {{ $product->created_at->format('Y/n/j H:i') }}
        </div>

        <!-- ログインしているユーザーのみ表示される -->
        @if(Auth::id() === $product->user_id)
        <div>
            <a href="{{ route('products.edit', ['product'=> $product]) }}">
            Edit
            </a>
        </div>
        <div>
            <!-- ここはモーダルで表示すること -->
            <form method="POST" action="{{ route('products.destroy', ['product' => $product]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
            </form>
            
        </div>
        @endif
        <!-- ログインしているユーザーのみ表示される -->

        <div>
            <h3>{{ $product->title }}</h3>
            <div>
            <p>いいねボタン</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
