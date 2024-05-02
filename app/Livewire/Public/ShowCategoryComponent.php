<?php

namespace App\Livewire\Public;

use App\Models\Category;
use Livewire\Component;

class ShowCategoryComponent extends Component
{
    public Category $category;

    public function render()
    {
        return view('livewire.public.show-category-component', [
            'posts' => $this->category->posts()->with('categories')->paginate()
        ]);
    }


}
