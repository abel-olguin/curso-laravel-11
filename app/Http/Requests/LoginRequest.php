<?php

namespace App\Http\Requests;

use App\Rules\MinRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'    => ['required', 'email'],
            'password' => ['required', new MinRule],
        ];
    }

    public function messages(): array
    {

        return [
            'email.required'    => 'El correo es requerido',
            'email.email'       => 'Este no es un correo valido',
            'password.required' => 'La contraseña es requerida',
            'password.min'      => 'La contraseña debe tener al menos 8 caracteres',
        ];
    }
}
