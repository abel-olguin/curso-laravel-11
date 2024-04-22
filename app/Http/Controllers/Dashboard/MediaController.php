<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|max:2048',
        ]);

        $image = Storage::disk('posts')->put('images', $request->file('image'));

        return response()->json(['success' => !!$image, 'file' => ['url' => Storage::disk('posts')->url($image)]]);
    }
}
