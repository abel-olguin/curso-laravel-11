<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.auth')]
class LoginComponent extends Component
{
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            #return $this->redirect('/dashboard');
            #return $this->redirectRoute('dashboard.index');
            #return $this->redirectIntended(route('dashboard.index'));

            return $this->redirectIntended(route('dashboard.index'), navigate: true);
        }

        $this->addError('email', 'Este usuario no se encuentra registrado en nuestra base de datos.');

    }

    /*public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required', new MinRule],
        ];
    }*/

    public function render()
    {
        return view('livewire.auth.login-component');
    }
}
