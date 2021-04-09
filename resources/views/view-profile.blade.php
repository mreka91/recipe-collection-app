<x-layout>
    <x-navigation />
    @if ($user->id === Auth::user()->id)
        <a href="/create-recipe">Add new recipe</a>
    @endif
    <h2>{{$user->name}}</h2>
    <section class="recipes">
        @foreach ($userRecipes as $recipe)
            <x-recipe-card link="/recipes/{{$recipe->id}}/view" title="{{$recipe->title}}" />
        @endforeach
    </section>
</x-layout>
