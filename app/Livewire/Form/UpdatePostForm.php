<?php

namespace App\Livewire\Form;

use App\Helpers\CategoryHelper;
use App\Http\Requests\Dashboard\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Livewire\Form;

class UpdatePostForm extends Form
{
    public Post $post;
    public      $title       = '';
    public      $categories  = '';
    public      $description = '';

    public function setAttributes(Post $post)
    {
        $this->post = $post;
        $this->fill($post->only(['title', 'description']));
        $this->categories = $this->post->categories->pluck('name')->implode(',');
    }

    public function update()
    {
        $data = $this->validate();
        Gate::authorize('edit', $this->post);

        return transactional(function () use ($data) {
            $categories = $data['categories'];
            unset($data['categories']);

            $this->post->update($data);
            $categoryHelper = new CategoryHelper();

            $categoryHelper->syncPostCategories($this->post, $categories);
        });
    }


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

    protected function prepareForValidation($attributes)
    {
        $cambioTitulo = $this->post->title !== $this->title;
        $slug         = str($this->title)->slug() . '-' . uniqid();

        $categoriesArray = explode(',', $this->categories);
        $categoriesArray = array_map('trim', $categoriesArray);

        $attributes['slug']       = $cambioTitulo ? $slug : $this->post->slug;
        $attributes['categories'] = array_filter(array_unique($categoriesArray));

        return $attributes;
    }
}
