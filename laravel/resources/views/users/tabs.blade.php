<ul>
    <li>
        <a class="{{ $hasProducts ? 'active' : '' }}"
            href="{{ route('users.show', ['name' => $user->name]) }}">
            Products
        </a>
    </li>
    <li>
        <a class="{{ $hasLikes ? 'active' : '' }}"
        href="{{ route('users.likes', ['name' => $user->name]) }}">
            Likes
        </a>
    </li>
</ul>