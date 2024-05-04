<?php

namespace App\Livewire\Public;

use App\Models\Post;
use App\Models\Scopes\FromUserScope;
use Livewire\Attributes\Computed;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.public.home-component');
    }

    #[Computed]
    public function posts()
    {
        return Post::withoutGlobalScope(FromUserScope::class)->with('categories')
                   ->latest()->paginate();
    }
}
