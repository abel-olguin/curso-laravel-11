<?php

namespace App\Livewire\Modals;

use App\Livewire\Dashboard\Post\PostListComponent;
use App\Livewire\Form\CreatePostForm;
use Livewire\Attributes\On;
use Livewire\Component;

class CreatePostModal extends Component
{
    public CreatePostForm $form;
    public                $show = false;

    #[On('showCreatePostModal')]
    public function onShow()
    {
        $this->show = true;
    }

    public function store()
    {
        $this->form->store();

        session()->flash('message', 'Post successfully created.');
        $this->dispatch('on-post-saved');
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.modals.create-post-modal');
    }

    public function hydrate()
    {
        $this->dispatch('createPostModalEndRender');
    }
}
