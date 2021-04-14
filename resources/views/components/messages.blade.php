@if ($errors->any())
    <div>
        <p>{{$errors->first()}}</p>
    </div>
@endif
@if ($message = Session::get('success'))
    <div>
        <strong>{{ $message }}</strong>
    </div>
@endif
