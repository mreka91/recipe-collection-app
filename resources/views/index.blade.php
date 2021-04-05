@extends('layout')
@section('content')
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
        <form action="create-recipe" method="post">
            @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="content">Content</label>
            <textarea id="content" name="content"></textarea>
            <button type="submit">Add recipe</button>
        </form>
    @endauth
@endif

@foreach ($recipes as $recipe)
    <h2>{{$recipe->title}}</h2>
    <p>{{$recipe->content}}</p>
    @auth
        @if (Auth::id() === $recipe->user_id)
            <form action="/recipes/{{$recipe->id}}/edit" method="post">
                @csrf
                @method('put')
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{$recipe->title}}">
                <label for="content">Content</label>
                <textarea id="content" name="content">{{$recipe->content}}</textarea>
                <button type="submit">Edit recipe</button>
            </form>
            <form action="/recipes/{{$recipe->id}}/delete" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete recipe</button>
            </form>
        @endif
    @endauth
@endforeach
@endsection
