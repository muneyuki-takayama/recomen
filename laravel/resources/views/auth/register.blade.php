@extends('app')

@section('title', 'Register')

@section('content')
    @include('nav')

    <h2>ユーザー登録</h2>

    @include('error_message')

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <div class=>
                <label for="name">User Name</label>
                <input class="" type="text" id="name" name="name" required value="{{ old('name') }}">
                <span>4〜16文字(登録後の変更はできません)</span>
            </div>
            <div class=>
                <label for="email">Mail Address</label>
                <input class="" type="text" id="email" name="email" required value="{{ old('email') }}" >
            </div>
            <div class=>
                <label for="password">Password</label>
                <input class="" type="password" id="password" name="password" required>
                <span>8文字以上で設定してください</span>
            </div>
            <div class=>
                <label for="password_confirmation">Password(confirmation)</label></label>
                <input class="" type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button class="" type="submit">ユーザー登録</button>
            </form>
        </div>
    </form>
    <div class="">
        <a href="{{ route('login') }}" class="">Login</a>
    </div>
@endsection