<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Public\HomeComponent::class)->name('home');
Route::get('/{post:slug}', \App\Livewire\Public\ShowPostComponent::class)->name('posts.show');

Route::get('/categories/{category:slug}', \App\Livewire\Public\ShowCategoryComponent::class)->name('categories.show');
