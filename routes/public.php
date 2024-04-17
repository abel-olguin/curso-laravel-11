<?php

use App\Http\Controllers\Public\CategoryController;
use App\Http\Controllers\Public\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
