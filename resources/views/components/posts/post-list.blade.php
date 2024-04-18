@props([
    'posts' => []
])
<div class="relative">
    <div class="grid gap-5">
        @foreach($posts as $post)
            <x-post-card :post="$post"/>
        @endforeach
    </div>

    <div class="mt-5">
        {{ $posts?->onEachSide(5)?->links() }}
    </div>
</div>
