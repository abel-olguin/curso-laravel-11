<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'        => 'required|string|max:255',
            'categories'   => 'required|array',
            'categories.*' => 'required|max:50',
            'slug'         => 'required|unique:posts,slug|max:255',
            'description'  => 'required|string|min:5',
        ];
    }

    protected function prepareForValidation()
    {
        $categoriesArray = explode(',', $this->get('categories'));
        /*
        convertir un string a un array usando la coma para crear
        elementos 'prueba1,prueba2,prueba3' => ['prueba1','prueba2','prueba3']
        */
        $categoriesArray = array_map('trim', $categoriesArray);
        # [' prueba1 ',' prueba2 ',' prueba 3 '] => ['prueba1','prueba2','prueba 3']
        $this->merge([
            'slug'       => str($this->get('title'))->slug() . '-' . uniqid(),
            'categories' => array_unique($categoriesArray)
        ]);
    }
}
