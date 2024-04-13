<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        Notification::send($user, new WelcomeNotification); #asincrono inmediato

        #Notification::sendNow($user, new WelcomeNotification); #sincrono tiempo de espera
        return redirect()->route('auth.index');
    }
}
