<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

#Auth login
Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('auth.index');
Route::post('login', [LoginController::class, 'login'])->middleware('guest')->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth')->name('auth.logout');

#Auth Register
Route::get('registro', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('registro', [RegisterController::class, 'store'])->name('auth.register.store');

#Auth Passwords
Route::middleware('guest')->group(function () {
    Route::get('/olvide-contrasena', [ResetPasswordController::class, 'index'])->name('auth.forgot-password.index');
    Route::post('/olvide-contrasena', [ResetPasswordController::class, 'send'])->name('auth.forgot-password.send');

    Route::get('/restablecer-contrasena/{token}', [ResetPasswordController::class, 'recoverIndex'])
         ->name('password.reset');

    Route::post('/restablecer-contrasena', [ResetPasswordController::class, 'recoverUpdate'])
         ->name('password.reset.update');
    #http://localhost/reset-password/cxwefwef

});

Route::get('/', fn() => view('welcome'))->name('home');
Route::get('dashboard', fn() => view('welcome'))->name('dashboard.index');
