@extends('app')

@section('title', $user->name . ' | Edit')

@section('content')
@include('nav')

    <div class="container" >
    @include('error_message')
        <form method="POST" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data"> 
            @csrf
            <div>
                <img-view
                select-user-prof="profile_photo"
                img-data-user-prof="{{ $user->profile_photo}}"
                >
                </img-view>
            </div>
            <div>
                <label>You Name</label>
                <input type="text" name="name" class="" required value="{{ $user->name ?? old('name') }}">
             </div>
             <div>
                <label>Introduction</label>
                <textarea name="profile_body" class="" rows="16" placeholder="Write yourself">{{ $user->profile_body ?? old('profile_body') }}</textarea>
            </div>
            <button type="submit" class="">Update</button>
        </form>
</div>
@endsection
