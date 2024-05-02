<div>
    <h1 class="text-2xl font-bold mb-4">Posts de la categoria: {{$category->name}}</h1>

    <div class="relative">
        <div class="grid gap-5">
            @foreach($posts as $post)
                <livewire:post-card-component :post="$post" wire:key="{{$post->id}}"/>
            @endforeach
        </div>

        <div class="mt-5">
            {{ $posts?->onEachSide(5)?->links() }}
        </div>
    </div>
</div>
