<div class="fixed bottom-2 left-2">
    @if ($paginator->onFirstPage())
        <a href="{{$paginator->nextPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">next page</a>
    @elseif(!$paginator->hasMorePages())
        <a href="{{$paginator->previousPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">previous page</a>
    @else
        <a href="{{$paginator->previousPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">previous page</a>
        <a href="{{$paginator->nextPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">next page</a>
    @endif
</div>
