<?php

namespace App\Livewire\Dashboard\Profile;

use App\Livewire\Form\ProfileForm;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard')]
class ProfileComponent extends Component
{
    use WithFileUploads;

    public ProfileForm $form;

    public function mount()
    {
        $this->form->fillModels(auth()->user()->only('email', 'name', 'last_name', 'username', 'image'));
    }

    public function update()
    {
        $this->form->update();
        session()->flash('success', 'Profile updated successfully');
        $this->redirectRoute('dashboard.profile.edit');
    }

    public function render()
    {
        return view('livewire.dashboard.profile.profile-component');
    }
}
