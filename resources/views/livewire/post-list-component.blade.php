<div class="relative">
    <div class="grid gap-5">
        @foreach($this->posts as $post)
            <livewire:post-card-component :post="$post" wire:key="{{$post->id}}"/>
        @endforeach
    </div>

    <div class="mt-5">
        {{ $this->posts?->onEachSide(5)?->links() }}
    </div>
</div>
