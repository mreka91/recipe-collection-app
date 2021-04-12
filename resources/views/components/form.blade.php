@props([
    'action' => "",
    'buttonText' => 'Submit',
    'enctype' => 'default',
    'enctypes' => [
        'default' => 'application/x-www-form-urlencoded',
        'file-upload' => 'multipart/form-data'
    ]
])

<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
      <div class="w-full lg:w-1/2 bg-green-500 p-5 rounded-lg">
        <form action="{{$action}}" method="post" enctype="{{$enctypes[$enctype]}}">
            @csrf
            {{ $slot }}
            <button type="submit" class="w-full px-4 py-2 mt-2 font-bold text-white bg-green-700 rounded-full hover:bg-green-300 focus:shadow-outline">{{$buttonText}}</button>
        </form>
      </div>
    </div>
</div>
