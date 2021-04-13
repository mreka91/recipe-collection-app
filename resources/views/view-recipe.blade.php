<x-layout>
    <x-navigation />
    @if ($recipe->picture_url)
        <img src="{{asset($recipe->picture_url)}}" class="w-full h-64 object-cover">
    @else
        <div class="w-full h-64 bg-gradient-to-r from-green-400 to-blue-500"></div>
    @endif
    <section class="p-4">
        <h2 class="text-3xl">{{$recipe->title}}</h2>
        <p class="max-w-lg mt-4">{{$recipe->content}}</p>
        <a href="/users/{{$author->id}}/view" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">{{$author->name}}</a>
        @auth
        @if (Auth::id() === $recipe->user_id)
            <div class="flex flex-row mt-8">
                <a href="edit" class="inline-block w-max px-4 py-2 mt-2 mr-2 font-bold text-white bg-blue-700 rounded-full hover:bg-blue-300 focus:shadow-outline my-4">Edit</a>
                <form action="/recipes/{{$recipe->id}}/delete" method="post" class="delete">
                    @csrf
                    @method('delete')
                    <button class="inline-block w-max px-4 py-2 mt-2 mr-2 font-bold text-white bg-red-700 rounded-full hover:bg-red-300 focus:shadow-outline my-4" type="submit">Delete recipe</button>
                </form>
            </div>
        @endif
        @endauth
    </section>
</x-layout>
