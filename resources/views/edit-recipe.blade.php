<x-layout>
    <x-form action="/recipes/{{$recipe->id}}/edit" buttonText="Submit edits">
        @method('put')
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{$recipe->title}}" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Content</label>
            <textarea id="content" name="content" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline">{{$recipe->content}}</textarea>
        </div>
    </x-form>
    @if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
    @endif
    <a href="/recipes/{{$recipe->id}}/view" class="inline-block w-max px-4 py-2 mt-2 mr-2 font-bold text-white bg-blue-700 rounded-full hover:bg-blue-300 focus:shadow-outline my-4">Go to recipe</a>
</x-layout>
