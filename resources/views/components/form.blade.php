<form action="{{$action}}" method="post">
    @csrf
    {{ $slot }}
    <button type="submit">{{$buttonText}}</button>
</form>
