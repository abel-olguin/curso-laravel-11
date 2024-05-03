<?php

namespace App\Livewire\Form;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProfileForm extends Form
{


    public $email     = '';
    public $name      = '';
    public $last_name = '';
    public $username  = '';
    public $image     = '';

    public function fillModels($fields)
    {
        $this->fill($fields);
    }

    public function update()
    {
        $this->validate();

        $data = $this->except('image');
        if ($this->image instanceof TemporaryUploadedFile) {
            $data['image'] = $this->image->store('images', 'users');
        }
        auth()->user()->update($data);
    }

    public function rules(): array
    {
        $imageRules = [];
        if (!is_string($this->image)) {
            $imageRules = ['image' => 'image|image|max:2048',];
        }
        return [
            'email'     => 'required|email|unique:users,email,' . auth()->id(),
            'name'      => 'required',
            'last_name' => 'required',
            'username'  => 'required|unique:users,username,' . auth()->id(),
            'slug'      => 'required',
            ...$imageRules
        ];
    }

    protected function prepareForValidation($attributes)
    {
        $user               = auth()->user();
        $changeSlug         = $user->username !== $this->username || !$user->slug;
        $attributes['slug'] = $changeSlug ? str($this->username)->slug() . '-' . uniqid() : $user->slug;

        return $attributes;
    }

}
