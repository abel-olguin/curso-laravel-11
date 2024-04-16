<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->id() === $this->post->user_id;
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
            'slug'         => "required|unique:posts,slug,{$this->post->id}|max:255",
            'description'  => 'required|string|min:5',
        ];
    }

    protected function prepareForValidation()
    {
        $cambioTitulo = $this->post->title !== $this->get('title');
        $slug         = str($this->get('title'))->slug() . '-' . uniqid();

        $categoriesArray = explode(',', $this->get('categories'));
        $categoriesArray = array_map('trim', $categoriesArray);


        $this->merge([
            'slug'       => $cambioTitulo ? $slug : $this->post->slug,
            'categories' => $categoriesArray
        ]);
    }
}
