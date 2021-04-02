{{-- @if (Auth::check())
    Hello {{Auth::user()->name}}! <a href="logout">logout</a>
@else
    <a href="login">Click here to login</a>
@endif --}}

@if (Route::has('login'))
    <div>
        @auth
            <p>Hello {{Auth::user()->name}}!</p>
            <a href="logout">Click here to logout</a>
        @else
            <a href="login">Click here to login</a>
        @endauth
    </div>
@endif
