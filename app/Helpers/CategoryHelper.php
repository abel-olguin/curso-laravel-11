<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Post;

class CategoryHelper
{
    public function attachPostCategories(Post $post, array $categories)
    {
        $existingCategories = $this->getPostCategories($categories);

        $post->categories()->attach($existingCategories->pluck('id')->toArray());
    }

    /**
     * @param array $categories
     * @return mixed
     */
    public function getPostCategories(array $categories)
    {
        $existingCategories = Category::whereIn('name', $categories)->select('id', 'name')->get();
        #select * from categories where name in('prueba1')

        $notExistingCategories = array_diff($categories, $existingCategories->pluck('name')->toArray());

        $newCategories = collect();
        foreach ($notExistingCategories as $category) {
            $category = Category::create([
                'name' => $category,
                'slug' => str($category)->slug()
            ]);
            $newCategories->add($category);
        }

        return $existingCategories->merge($newCategories);
    }

    public function syncPostCategories(Post $post, array $categories)
    {
        $existingCategories = $this->getPostCategories($categories);

        $post->categories()->sync($existingCategories->pluck('id')->toArray());
    }
}
