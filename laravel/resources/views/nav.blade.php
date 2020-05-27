<header class="l-header">
    <nav class="l-row l-row--between l-row--middle">
        <div class="p-header--logo">
            <a href="/">RECOMEN!</a>
        </div>
        @guest
        <div class="c-menu--trigger js-toggle-sp-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="c-menu--list js-toggle-sp-menu-target">
            <ul class="c-list">
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li>
                    <a href="{{ route('tags.search') }}">Tag Search</a>
                </li>
            </ul>
        </div>
        @endguest
        
        @auth
         <div class="c-menu--trigger js-toggle-sp-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="c-menu--list js-toggle-sp-menu-target">
            <ul class="c-list">
                <li>
                    <a href="{{ route('products.create') }}">Post</a>
                </li>
                <li>
                    <a href="javascript:logout.submit()">Logout</a>
                </li>
                <li>
                    <a href="{{ route('users.show', ['name' => Auth::user()->name] )}}">Mypage</a>
                </li>
                <li>
                <a href="{{ route('tags.search') }}">Tag Search</a>
                </li>
                <form name="logout" method="POST" action="{{ route('logout') }}" >
                    @csrf
                </form>
            </ul>
        </div>
        @endauth
    </nav>
</header>