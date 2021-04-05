<nav class="navigation">
    <ul>
        <span>
            <li>Item one</li>
            <li>Item two</li>
        </span>
        @if (Route::has('login'))
            <span class="profile">
                @auth
                <li>
                    <a href="">{{Auth::user()->name}}</a>
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
