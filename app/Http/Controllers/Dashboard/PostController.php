<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StorePostRequest;
use App\Http\Requests\Dashboard\UpdatePostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(
        public CategoryHelper $categoryHelper
    )
    {
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        return transactional(function () use ($request) {
            $data            = $request->safe()->except('categories');
            $data['user_id'] = auth()->id();

            $post = Post::create($data); # insert into posts (...) values (...)

            $this->categoryHelper->attachPostCategories($post, $request->get('categories'));

            return redirect()->route('dashboard.posts.index')->with('success', __('Post created successfully'));
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('edit', $post);
        $categories = $post->categories->pluck('name')->implode(',');
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        return transactional(function () use ($request, $post) {
            $data = $request->safe()->except('categories');

            $post->update($data);
            $this->categoryHelper->syncPostCategories($post, $request->get('categories'));
            return redirect()->route('dashboard.posts.index')->with('success', __('Post updated successfully'));
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('dashboard.posts.index');
    }

}
