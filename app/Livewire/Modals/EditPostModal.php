<?php

namespace App\Livewire\Modals;

use App\Livewire\Form\UpdatePostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class EditPostModal extends Component
{
    #[Reactive]
    public $show = false;

    #[Locked]
    public Post           $post;
    public UpdatePostForm $form;

    public function mount()
    {
        $this->form->setAttributes($this->post);
    }

    public function update()
    {
        $this->form->update();

        session()->flash('message', 'Post successfully updated.');
        $this->dispatch('updatedPost');
    }

    public function render()
    {
        if ($this->post?->id) {
            Gate::authorize('edit', $this->post);
        }
        return view('livewire.modals.edit-post-modal');
    }

}
