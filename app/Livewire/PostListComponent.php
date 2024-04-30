<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class PostListComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.post-list-component');
    }

    #[Computed]
    public function posts()
    {
        return Post::with('categories')->latest()->paginate();
    }
}
