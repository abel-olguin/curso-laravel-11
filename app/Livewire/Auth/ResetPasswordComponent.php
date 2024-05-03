<?php

namespace App\Livewire\Auth;

use App\Livewire\Form\ResetPasswordForm;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.auth')]
class ResetPasswordComponent extends Component
{
    public ResetPasswordForm $form;

    #[Locked]
    public $token;

    public function boot()
    {
        $this->form->setToken($this->token);
    }

    public function resetPassword()
    {
        $status = $this->form->getStatus();
        if ($status === Password::PASSWORD_RESET) {
            session()->flash('success', __('Password reset successfully.'));
            return $this->redirect(route('auth.index'));
        }
        $this->addError('password', __($status));
    }

    public function render()
    {
        return view('livewire.auth.reset-password-component');
    }
}
