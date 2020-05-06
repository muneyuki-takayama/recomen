@extends('app')

@section('title', 'RECOMEN! | Reset MailForm')

@section('content')
@include('nav')
    <div>
        <div>
            <h2>Password Resetting</h2>
            @include('error_message')
            @if (session('status'))
              <div class="">
                {{ session('status') }}
              </div>
            @endif
        </div>

        <div>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <label for="email">Email Address</label>
                <input type="text" id="email" name="email" required>
            </div>
            <button type="submit">Send Email</button>
        </form>
        </div>
    </div>
   
@endsection