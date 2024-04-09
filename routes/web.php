<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'index'])->name('auth.index');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');


Route::get('/', fn() => view('welcome'))->name('home');
Route::get('dashboard', fn() => view('welcome'))->name('dashboard.index');
