<x-layout>
    <x-form action="/recipes/{{$recipe->id}}/edit" buttonText="Submit edits">
        @method('put')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{$recipe->title}}">
        <label for="content">Content</label>
        <textarea id="content" name="content">{{$recipe->content}}</textarea>
    </x-form>
    @if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
    @endif
</x-layout>
