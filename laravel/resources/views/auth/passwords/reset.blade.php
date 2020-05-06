@extends('app')

@section('title', 'RECMEN! | Password Reset')

@section('content')
    @include('nav')

    <div class="">
        <div class="">
            <h2>Setting New Password</h2>
            @include('error_message')
            <div class="">
            <form method="POST" action="{{ route('password.update')}}">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" required> 
                </div>
                <div class="">
                    <label for="password_confirmation">New Password(confirm)</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection