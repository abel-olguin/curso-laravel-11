<?php

namespace App\Livewire\Public;

use App\Models\Post;
use Livewire\Component;

class ShowPostComponent extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.public.show-post-component');
    }
}
