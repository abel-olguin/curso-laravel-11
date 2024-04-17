@props([
    'post' => null
])
<div class="shadow bg-gray-100 rounded grid grid-cols-3 overflow-hidden">
    <a href="{{route('posts.show', $post)}}"><img src="{{asset('images/profile.svg')}}" alt="{{$post->title}}"></a>
    <div class="col-span-2 flex flex-col justify-between">
        <div>
            <a href="{{route('posts.show', $post)}}"><h2 class="font-bold text-2xl">{{$post->title}}</h2></a>
            <p>
                {{str($post->description)->excerpt()}}
            </p>
        </div>
        <div class="flex gap-3">
            @foreach($post->categories as $category)
                <a href="{{route('categories.show', $category)}}"
                   class="">
                    {{$category->name}}
                </a>
            @endforeach

        </div>
    </div>
</div>
