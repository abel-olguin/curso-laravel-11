<?php

namespace App\Livewire\Auth;

use App\Livewire\Form\RegisterForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class RegisterComponent extends Component
{
    public RegisterForm $form;

    public function register()
    {
        $this->form->register();

        session()->flash('success', 'Welcome!');
        $this->redirectRoute('auth.index');
    }

    public function render()
    {
        return view('livewire.auth.register-component');
    }
}
