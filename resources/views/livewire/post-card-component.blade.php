<div class="shadow bg-gray-100 dark:bg-gray-800 rounded grid grid-cols-3 overflow-hidden">
    <a href="{{route('posts.show', $post)}}" class="block" wire:navigate>
        <img src="{{asset('images/profile.svg')}}" alt="{{$post->title}}" class="w-full object-cover aspect-video">
    </a>
    <div class="col-span-2 flex flex-col justify-between p-2">
        <div>
            <a href="{{route('posts.show', $post)}}" wire:navigate>
                <h2 class="font-bold text-2xl ">{{$post->title}}</h2>
            </a>
            <p class="dark:text-gray-500">
                {{$post->excerpt}}
            </p>
        </div>
        <div class="flex gap-3">
            @foreach($post->categories as $category)
                <a href="{{route('categories.show', $category)}}"
                   class="text-blue-700 hover:underline" wire:navigate>
                    {{$category->name}}
                </a>
            @endforeach
        </div>
    </div>
</div>
