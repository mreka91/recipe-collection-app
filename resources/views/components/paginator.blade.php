@if ($paginator->hasPages())
    <div>
        @if ($paginator->onFirstPage())
            <a href="{{$paginator->nextPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">next page</a>
            {{$paginator->currentPage()}}
        @elseif(!$paginator->hasMorePages())
            <a href="{{$paginator->previousPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">previous page</a>
            {{$paginator->currentPage()}}
            @else
            <a href="{{$paginator->previousPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">previous page</a>
            {{$paginator->currentPage()}}
            <a href="{{$paginator->nextPageUrl()}}" class="inline-block w-max px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">next page</a>
        @endif
    <div>
@endif
