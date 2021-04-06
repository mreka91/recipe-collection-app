<x-layout>
    <section>
        {{-- <img src="/{{$recipe->picture_url}}"> --}}
        <img src="{{asset($recipe->picture_url)}}">
        <h2>{{$recipe->title}}</h2>
        <p>{{$recipe->content}}</p>
    </section>
    @auth
        @if (Auth::id() === $recipe->user_id)
            <a href="edit">Edit</a>
            <x-form action="/recipes/{{$recipe->id}}/delete" buttonText="Delete">
                @method('delete')
            </x-form>
        @endif
    @endauth
</x-layout>
