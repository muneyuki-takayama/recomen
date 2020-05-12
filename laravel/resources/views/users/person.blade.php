<div>
    <div>
    <a href="{{ route('users.show', ['name' => $person->name]) }}">
    <i class="fas fa-user-circle fa-3x"></i> <!-- ここはプロフ画像にする-->
    </a>

    @if( Auth::id() !== $person->id )
        <follow-button
          class=""
          :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
        >
        </follow-button>
      @endif
 
    </div>
    <h2>
        <a href="{{ route('users.show', ['name' => $person->name]) }}" class="">{{ $person->name }}</a>
    </h2>
</div>