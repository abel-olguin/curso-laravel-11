<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Livewire\Auth\ForgotPasswordComponent;
use App\Livewire\Auth\RegisterComponent;
use App\Livewire\Auth\ResetPasswordComponent;
use App\Livewire\Dashboard\DashboardComponent;
use App\Livewire\Dashboard\Profile\ProfileComponent;
use Illuminate\Support\Facades\Route;

#Auth
Route::name('auth.')->group(function () {
    #Auth login
    Route::get('login', \App\Livewire\Auth\LoginComponent::class)->middleware('guest')->name('index');
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

    #Auth Register
    Route::get('registro', RegisterComponent::class)->name('register.index');

    #Auth Passwords
    Route::middleware('guest')->group(function () {
        Route::get('/olvide-contrasena', ForgotPasswordComponent::class)->name('forgot-password.index');

        Route::get('/restablecer-contrasena/{token}', ResetPasswordComponent::class)->name('password.reset');

    });
});


#Dashboard
Route::name('dashboard.')
     ->middleware('auth')
     ->prefix('dashboard')->group(function () {
        Route::get('/', DashboardComponent::class)->name('index');
        Route::get('profile', ProfileComponent::class)->name('profile.edit');

        Route::resource('posts', PostController::class)->except('show');
        Route::post('media', [MediaController::class, 'store'])
             ->name('media.upload');
    });

