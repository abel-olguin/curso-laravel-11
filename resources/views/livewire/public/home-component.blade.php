<div>
    <h1 class="text-2xl font-bold mb-4">Titulo del sitio</h1>

    <div class="grid grid-cols-4 gap-5">
        <div class="col-span-3">
            <div class="relative">
                <div class="grid gap-5">
                    @foreach($this->posts as $post)
                        <livewire:post-card-component :post="$post" wire:key="{{$post->id}}"/>
                    @endforeach
                </div>


            </div>
        </div>

        <div>Posts populares</div>
    </div>
    <div class="mt-5">
        {{ $this->posts?->onEachSide(5)?->links() }}
    </div>
</div>
