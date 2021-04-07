@if ($paginator->onFirstPage())
<a href="{{$paginator->nextPageUrl()}}">next page</a>
@else
<a href="{{$paginator->previousPageUrl()}}">previous page</a>
<a href="{{$paginator->nextPageUrl()}}">next page</a>
@endif
