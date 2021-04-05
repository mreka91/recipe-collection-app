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

@if (Route::has('create-recipe'))
    @auth
        <form action="create-recipe" method="post" style="width: 300px; display: flex; flex-direction: column; margin-top: 16px;">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="content">Content</label>
            <textarea id="content" name="content"></textarea>
            <button type="submit">Add recipe</button>
        </form>
    @endauth
@endif
