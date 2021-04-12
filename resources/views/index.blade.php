<x-layout>
    <x-navigation/>
    <h2 class="text-3xl m-4">Home</h2>
    <main class="p-4">
        <x-recipe-section>
            @foreach ($recipes as $recipe)
            <x-recipe-card link="/recipes/{{$recipe->id}}/view" title="{{$recipe->title}}" image="{{$recipe->picture_url}}"/>
                @endforeach
        </x-recipe-section>
        {{$recipes->links('paginator')}}
    </main>
</x-layout>
