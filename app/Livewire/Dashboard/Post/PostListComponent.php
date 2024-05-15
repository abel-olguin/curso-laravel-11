<?php

namespace App\Livewire\Dashboard\Post;

use App\Models\Post;
use App\Models\Scopes\FromUserScope;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard')]
class PostListComponent extends Component
{
    use WithPagination;

    public Post $currentPost;

    public $showEditModal = false;
    #[Url]
    public $search;

    #[Url]
    public $orderBy;

    #[Url]
    public $sortDirection;

    public function boot()
    {
        $this->currentPost = new Post();
    }

    public function setCurrentPost(Post $post)
    {
        $this->currentPost   = $post;
        $this->showEditModal = true;
    }

    public function updatingSortDirection($vale)
    {
        $this->resetPage();
    }

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
        return Post::withQueryParams($this->search, $this->orderBy, $this->sortDirection);
    }

    public function setSort($field)
    {
        $this->sortDirection = $this->orderBy === $field && $this->sortDirection === 'asc' ? 'desc' : 'asc';

        $this->orderBy = $field;
    }

    public function hideEditModal()
    {
        $this->showEditModal = false;
    }
}
