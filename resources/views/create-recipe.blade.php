<x-layout>
    <form action="create-recipe" method="post" enctype="multipart/form-data">
        @csrf
        <label for="image">Image</label>
        <input type="file" name="image" accept=".jpg">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        <label for="content">Content</label>
        <textarea id="content" name="content"></textarea>
        <button type="submit">Submit</button>
    </form>
    <x-errors />
    @if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
    @endif
</x-layout>
