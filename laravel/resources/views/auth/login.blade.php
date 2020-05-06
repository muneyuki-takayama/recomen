@extends('app')

@section('title', 'Login')

@section('content')

    @include('nav')
    
    <h2>Login</h2>

    @include('error_message')

    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="">
                <label for="email">Mail Address</label>
            <input class="" type="text" id="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="">
                <label for="password">Password</label>
                <input class="" type="password" id="password" name="password" required>
            </div>

            <input type="hidden" name="remember" id="remember" value="on">

            <div class="">
            <a href="{{ route('password.request') }}">Forgot Password</a>
            </div>

            <button class="" type="submit">Login</button>
        </form>

        <div class="">
            <a href="{{ route('register') }}" class="">Register</a>
        </div>
    </div>
@endsection