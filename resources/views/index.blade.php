<x-layout>
    <x-navigation/>
    {{$recipes->links('test')}}
    <main>
        <section class="recipes">
            @foreach ($recipes as $recipe)
                <x-recipe-card link="/recipes/{{$recipe->id}}/view" title="{{$recipe->title}}" />
            @endforeach
        </section>
    </main>
</x-layout>
