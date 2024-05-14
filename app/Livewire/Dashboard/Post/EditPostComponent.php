<?php

namespace App\Livewire\Dashboard\Post;

use App\Livewire\Form\UpdatePostForm;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Js;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.dashboard')]
class EditPostComponent extends Component
{
    public                $active = false;
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
        $this->redirectRoute('dashboard.posts.index');
    }

    public function render()
    {
        Gate::authorize('edit', $this->post);

        return view('livewire.dashboard.post.edit-post-component')
            ->title("Editar: {$this->post->title}")
            // ->layout(true ? 'layouts.app' : 'layouts.dashboard')
            // ->extends('layouts.dashboard')
            // ->section('content')
            ;
    }


    public function test()
    {
        $this->js("console.log('Hola mundo')");
    }
}
