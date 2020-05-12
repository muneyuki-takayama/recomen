@extends('app')

@section('title', 'RECOMEN! | Tag Search')
    
@section('content')
    @include('nav')

    <div class=""> 
        <h2>Tag Search</h2>

        @foreach ($registeredTags as $registeredTag)
          <div>
            <a href="{{ route('tags.show', ['name' => $registeredTag->name]) }}">
                {{ $registeredTag->hashtag }}
            </a>  
          </div>
        @endforeach
    </div>
    
@endsection