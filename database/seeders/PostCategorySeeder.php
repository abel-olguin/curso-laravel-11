<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        Post::all()->each(function (Post $post) use ($categories) {
            $post->categories()->attach($categories->random(3));
        });
    }
}
