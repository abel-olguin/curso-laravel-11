<?php

namespace App\Livewire\Form;

use App\Helpers\CategoryHelper;
use App\Http\Requests\Dashboard\StorePostRequest;
use App\Models\Post;
use Livewire\Form;

class CreatePostForm extends Form
{
    public $title       = '';
    public $categories  = '';
    public $description = '';

    public function store()
    {
        $data = $this->validate();

        return transactional(function () use ($data) {
            $categories = $data['categories'];
            unset($data['categories']);
            $data['user_id'] = auth()->id();

            $post           = Post::create($data);
            $categoryHelper = new CategoryHelper();
            $categoryHelper->attachPostCategories($post, $categories);
        });
    }

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

    protected function prepareForValidation($attributes)
    {
        $categoriesArray = explode(',', $this->categories);
        /*
        convertir un string a un array usando la coma para crear
        elementos 'prueba1,prueba2,prueba3' => ['prueba1','prueba2','prueba3']
        */
        $categoriesArray = array_map('trim', $categoriesArray);
        # [' prueba1 ',' prueba2 ',' prueba 3 '] => ['prueba1','prueba2','prueba 3']
        $attributes['slug']       = str($this->title)->slug() . '-' . uniqid();
        $attributes['categories'] = array_unique($categoriesArray);
        return $attributes;
    }
}
