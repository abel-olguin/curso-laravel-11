<?php

use App\Http\Controllers\Public\CategoryController;
use App\Http\Controllers\Public\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\PostListComponent::class)->name('home');
Route::get('/{post:slug}', \App\Livewire\ShowPostComponent::class)->name('posts.show');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
