<nav>
    <a href="/">RECOMEN!</a>
    @guest
    <ul>
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
    @endguest
    
    @auth
    <ul>
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
    @endauth
</nav>