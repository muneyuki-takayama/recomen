@extends('app')

@section('title', 'Register')

@section('content')
    @include('nav')

    <h2>ユーザー登録</h2>

    @include('error_message')

    <form method="POST" action="{{ route('register.{provider}', ['provider' => $provider]) }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <div class=>
                <label for="name">User Name</label>
                <input class="" type="text" id="name" name="name" required>
                <span>4〜16文字(登録後の変更はできません)</span>
            </div>
            <div class=>
                <label for="email">Mail Address</label>
                <input class="" type="text" id="email" name="email" required value="{{ $email }}" >
            </div>
            <button class="" type="submit">Register</button>
            </form>
        </div>
    </form>
    <div class="">
        <a href="{{ route('login') }}" class="">Login</a>
    </div>
@endsection