<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPostComponent extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.show-post-component');
    }
}
