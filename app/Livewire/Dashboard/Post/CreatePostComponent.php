<?php

namespace App\Livewire\Dashboard\Post;

use App\Livewire\Form\CreatePostForm;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class CreatePostComponent extends Component
{
    public CreatePostForm $form;

    public function store()
    {
        $this->form->store();

        session()->flash('message', 'Post successfully created.');
        $this->redirectRoute('dashboard.posts.index');
    }

    public function render()
    {
        return view('livewire.dashboard.post.create-post-component');
    }
}
