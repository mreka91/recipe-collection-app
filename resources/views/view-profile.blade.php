<x-layout>
    <x-navigation />
    <section class="p-4">
        @auth
            @if ($user->id === Auth::user()->id)
                <a href="/create-recipe" class="inline-block w-max px-4 py-2 mt-2 mr-2 font-bold text-white bg-blue-700 rounded-full hover:bg-blue-400 focus:shadow-outline my-4">Add new recipe</a>
            @endif
        @endauth
        <h2 class="text-3xl mt-4">{{Auth::id() === $user->id ? "Welcome" : ""}} {{$user->name}}</h2>
        <h3 class="text-2xl mt-4 mb-2">{{Auth::id() === $user->id ? "Your" : ""}} recipes</h3>
        <x-recipe-section>
            @foreach ($userRecipes as $recipe)
                <x-recipe-card link="/recipes/{{$recipe->id}}/view" title="{{$recipe->title}}" image="{{$recipe->picture_url}}"/>
            @endforeach
        </x-recipe-section>
        {{$userRecipes->links('components.paginator')}}
    </section>
</x-layout>
