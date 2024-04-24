<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\BirthdayNotification;
use Illuminate\Console\Command;

class BirthdayCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mail de felicitación a los usuarios que cumplen años.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::active()
                     ->todaysBirthday()
                     ->get();

        foreach ($users as $user) {
            $user->notify(new BirthdayNotification());
        }
    }
}
