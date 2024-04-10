<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

#Auth login
Route::get('login', [LoginController::class, 'index'])->name('auth.index');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

#Auth Register
Route::get('registro', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('registro', [RegisterController::class, 'store'])->name('auth.register.store');


Route::get('/', fn() => view('welcome'))->name('home');
Route::get('dashboard', fn() => view('welcome'))->name('dashboard.index');
