<nav class="navigation">
    <ul>
        <span>
            <li><a href="/">Home</a></li>
        </span>
        @if (Route::has('login'))
            <span class="profile">
                @auth
                <li>
                    <a href="/users/{{Auth::user()->id}}/view">{{Auth::user()->name}}</a>
                </li>
                <li>
                    <a href="logout">Logout</a>
                </li>
                @else
                <li>
                    <a href="login">Login</a>
                </li>
                @endauth
            </span>
        @endif
    </ul>
</nav>
