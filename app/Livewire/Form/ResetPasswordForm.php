<?php

namespace App\Livewire\Form;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Form;

class ResetPasswordForm extends Form
{
    #[Locked]
    public $token;

    #[Url]
    #[Locked]
    public $email;

    public $password;
    public $passwordConfirmation;

    public function getStatus()
    {
        $this->validate();
        $status = Password::reset(
            $this->only('email', 'password', 'passwordConfirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status;
    }

    public function rules(): array
    {
        return [
            'token'                => 'required',
            'email'                => 'required|email',
            'password'             => 'required|min:8',
            'passwordConfirmation' => 'required|min:8|same:password',
        ];
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}
