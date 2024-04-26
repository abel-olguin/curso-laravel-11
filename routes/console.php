<?php

use App\Schedule\DeleteInactiveUsers;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;


#\Illuminate\Support\Facades\Schedule::command('email:birthday')->daily();
#\Illuminate\Support\Facades\Schedule::command('email:birthday')->everyMinute();

#\Illuminate\Support\Facades\Schedule::job(new \App\Jobs\DeleteInactiveUsersJob())->everyMinute();

\Illuminate\Support\Facades\Schedule::call(new DeleteInactiveUsers)->everyMinute();

\Illuminate\Support\Facades\Schedule::call(function () {
    \App\Models\User::inactive()->delete();
})->everyMinute();
