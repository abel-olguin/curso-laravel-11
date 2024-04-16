<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'     => 'required|email|unique:users,email,' . $this->user()->id,
            'name'      => 'required',
            'last_name' => 'required',
            'username'  => 'required|unique:users,username,' . $this->user()->id,
            'slug'      => 'required',
            'image'     => 'required|image|max:2048',
        ];
    }

    protected function prepareForValidation()
    {
        $user       = auth()->user();
        $changeSlug = $user->username !== $this->get('username') || !$user->slug;
        $this->merge([
            'slug' => $changeSlug ? str($this->get('username'))->slug() . '-' . uniqid() : $user->slug
        ]);
    }
}
