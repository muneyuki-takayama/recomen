@extends('app')

@section('title', $user->name . ' | Followee')

@section('content')
  @include('nav')
  <div class="container">
    @include('users.user')
    @include('users.tabs', ['hasProducts' => false, 'hasLikes' => false])
    @foreach($followings as $person)
      @include('users.person')
    @endforeach
  </div>
@endsection