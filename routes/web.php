<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

#Auth
Route::name('auth.')->group(function () {
    #Auth login
    Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('index');
    Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

    #Auth Register
    Route::get('registro', [RegisterController::class, 'index'])->name('register.index');
    Route::post('registro', [RegisterController::class, 'store'])->name('register.store');

    #Auth Passwords
    Route::middleware('guest')->group(function () {
        Route::get('/olvide-contrasena', [ResetPasswordController::class, 'index'])->name('forgot-password.index');
        Route::post('/olvide-contrasena', [ResetPasswordController::class, 'send'])->name('forgot-password.send');

        Route::get('/restablecer-contrasena/{token}', [ResetPasswordController::class, 'recoverIndex'])
             ->name('password.reset');

        Route::post('/restablecer-contrasena', [ResetPasswordController::class, 'recoverUpdate'])
             ->name('password.reset.update');
        #http://localhost/reset-password/cxwefwef

    });
});


Route::get('/', fn() => view('welcome'))->name('home');
Route::get('dashboard', fn() => view('welcome'))->name('dashboard.index');
