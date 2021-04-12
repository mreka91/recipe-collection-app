<x-layout>
    <x-form action="create-recipe" buttonText="Submit" enctype="file-upload">
        <div class="mb-4">
            <label for="image" class="block mb-2 text-sm font-bold text-gray-700">Image</label>
            <input type="file" name="image" accept=".jpg" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline"
            >
        </div>
        <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Title</label>
        <input type="text" name="title" id="title" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline">
        <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Content</label>
        <textarea id="content" name="content" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:shadow-outline"></textarea>
    </x-form>
    <x-errors />
    @if ($message = Session::get('success'))
    <strong>{{ $message }}</strong>
    @endif
</x-layout>
