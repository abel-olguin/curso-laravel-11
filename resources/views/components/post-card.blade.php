@props([
    'post' => null
])
<div class="shadow bg-gray-100 rounded grid grid-cols-3 overflow-hidden">
    <img src="{{asset('images/profile.svg')}}" alt="{{$post->title}}">
    <div class="col-span-2 flex flex-col justify-between">
        <div>
            {{$post->desctription}}
        </div>
        <div>
            {{$post->categories->pluck('name')->implode(',')}}
        </div>
    </div>
</div>
