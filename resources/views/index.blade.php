@if (Auth::check())
    Hello {{Auth::user()->name}}! <a href="logout">logout</a>
@else
    <a href="login-user">Click here to login</a>
@endif
