        <div>
            <div>
            <a href="{{ route('users.show', ['name' => $user->name]) }}">
                <i class="fas fa-user-circle fa-3x"></i>
            </a>
            </div>
            <div>
                <h2>
                    {{ $user->name }}
                </h2>
            </div>
            <div>
                自己紹介の部分
            </div>
            <button style="color: red;">プロフィール編集(モーダル編集)</button>
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