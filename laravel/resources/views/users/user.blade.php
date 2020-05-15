        <div>
            <div>
            <a href="{{ route('users.show', ['name' => $user->name]) }}">
                @if(!$user->profile_photo) 
                    <i class="fas fa-user-circle fa-3x"></i>
                @endif  
                <img src="{{ $user->profile_photo }}" alt="">
            </a>
            </div>
            <div>
                <h2>
                    {{ $user->name }}
                </h2>
            </div>
            <div>
                {{  $user->profile_body }}
            </div>
            <a href="{{ route('users.edit', ['name' => $user->name]) }}">
                <button>Edit Profile</button>
            </a>
        </div>

        <div>
            <div>
                <a href="{{ route('users.followings', ['name' => $user->name]) }}">
                    {{ $user->count_followings }}フォロー
                </a>
                <a href="{{ route('users.followers', ['name' => $user->name]) }}">
                    {{ $user->count_followers}}フォロワー
                </a>
            </div>
            <div>
                @if( Auth::id() !== $user->id )
                    <follow-button
                        class=""
                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                    >
                    </follow-button>
                @endif
            </div>
        </div>