<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth')]
class ForgotPasswordComponent extends Component
{
    public $email = '';

    public function send()
    {
        $this->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('success', __('Recovery message has been sent'));
            return $this->redirect(route('auth.index'));
        }

        $this->addError('email', __($status));
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-component');
    }
}
