<?php

namespace App\Livewire\Form;

use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Form;

class RegisterForm extends Form
{
    public $email                = '';
    public $name                 = '';
    public $last_name            = '';
    public $password             = '';
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate();
        $user = User::create($this->except('passwordConfirmation'));

        Notification::send($user, new WelcomeNotification); #asincrono inmediato
    }

    public function rules(): array
    {
        return [
            'name'                 => 'required',
            'last_name'            => 'required',
            'email'                => 'required|email|unique:App\Models\User,email',
            'password'             => 'required|min:8',
            'passwordConfirmation' => 'required|min:8|same:password',
            #'username'  => 'required|unique:App\Models\User,username',
            #'slug'      => 'required|unique:App\Models\User,username',
        ];
    }
}
