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
        <a href="/users/{{$recipe->author->id}}/view" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">{{$recipe->author->name}}</a>
        <section class="my-8">
            @if ($comments)
                @foreach ($comments as $comment)
                    <div class="border my-4">
                        <h2 class="text-2xl mb-4">{{$comment->author->name}}</h2>
                        <p class="text-xl">{{$comment->comment}}</p>
                        <time>{{$comment->created_at}}</time>
                        @auth
                            @if (Auth::id() === $comment->user_id)
                                <form action="/comments/{{$comment->id}}/delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Delete comment</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endforeach
            @endif
        </section>
        @auth
        <form action="/recipes/{{$recipe->id}}/comment" method="post" class="flex flex-col w-min">
            @csrf
            <label for="comment">Comment</label>
            <textarea type="text" id="comment" name="comment" class=" border"></textarea>
            <button type="submit" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">Add comment</button>
        </form>
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
