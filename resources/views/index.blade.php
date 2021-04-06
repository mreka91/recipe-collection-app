<x-layout>
    <x-navigation/>
    <main>
        <a href="create-recipe">Add new recipe</a>
        <section class="recipes">
            @foreach ($recipes as $recipe)
                <x-recipe-card link="recipes/{{$recipe->id}}/view" title="{{$recipe->title}}" />
            @endforeach
        </section>
    </main>
</x-layout>
