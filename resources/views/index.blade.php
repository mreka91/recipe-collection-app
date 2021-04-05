<x-layout>
    <x-navigation/>
    <main>
        @if (Route::has('create-recipe'))
            @auth
                <div>
                    <x-form action="create-recipe" buttonText="Add recipe">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title">
                        <label for="content">Content</label>
                        <textarea id="content" name="content"></textarea>
                    </x-form>
                </div>
            @endauth
        @endif
        <section class="recipes">
            @foreach ($recipes as $recipe)
                <x-recipe>
                    <h2>{{$recipe->title}}</h2>
                    <p>{{$recipe->content}}</p>
                    @if(Auth::id() === $recipe->user_id)
                        <x-form action="/recipes/{{$recipe->id}}/edit" buttonText="Edit recipe">
                            @method('put')
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{$recipe->title}}">
                            <label for="content">Content</label>
                            <textarea id="content" name="content">{{$recipe->content}}</textarea>
                        </x-form>
                        <x-form action="/recipes/{{$recipe->id}}/delete" buttonText="Delete">
                            @method('delete')
                        </x-form>
                    @endif
                </x-recipe>
            @endforeach
        </section>
    </main>
</x-layout>
