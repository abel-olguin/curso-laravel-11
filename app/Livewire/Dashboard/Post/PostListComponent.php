<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use App\Models\Scopes\FromUserScope;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class PostListComponent extends Component
{
    #[Url]
    public $search;

    public function render()
    {
        return view('livewire.dashboard.post.post-list-component');
    }

    public function delete($postId)
    {
        $post = Post::findOrFail($postId);
        Gate::authorize('edit', $post);
        $post->delete();
    }

    #[Computed]
    public function posts()
    {
        return Post::withQueryParams($this->search);
    }
}
