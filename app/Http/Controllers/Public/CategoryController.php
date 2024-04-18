<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->with('categories')->latest()->paginate();
        return view('categories.show', compact('posts', 'category'));
    }
}
