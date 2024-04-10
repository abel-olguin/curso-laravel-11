<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => 'required',
            'last_name' => 'required',
            'email'     => 'required|email|unique:App\Models\User,email',
            'password'  => 'required|min:8|confirmed',
            #'username'  => 'required|unique:App\Models\User,username',
            #'slug'      => 'required|unique:App\Models\User,username',
        ];
    }

    protected function prepareForValidation()
    {
        # @pedrito.pedrito -> pedrito-pedrito-
        $this->merge([
            'slug' => str($this->get('username'))->slug(),
        ]);
    }
}
