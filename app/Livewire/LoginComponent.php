<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class LoginComponent extends Component
{

    public function render()
    {
        return view('livewire.login-component');
    }
}
