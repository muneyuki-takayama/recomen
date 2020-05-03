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
            <a href="">Tag Search</a>
        </li>
    </ul>
    @endguest
    
    @auth
    <ul>
         <li>
            <a href="">Post</a>
        </li>
        <li>
            <a href="javascript:logout.submit()">Logout</a>
        </li>
         <li>
            <a href="">Mypage</a>
        </li>
         <li>
            <a href="">Tag Search</a>
        </li>
        <form name="logout" method="POST" action="{{ route('logout') }}" >
            @csrf
        </form>
    </ul>
    @endauth
</nav>