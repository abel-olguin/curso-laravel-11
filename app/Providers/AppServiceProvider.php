<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('sortLink', function ($field) {
            return "href='<?php echo sortLink($field)?>'";
        });

        Blade::stringable(function (Post $post) {
            return $post->description;
        });

        Blade::if('role', function () {
            $role = 'admin';// deberiamos de sacarlo del usuario
            return $role === 'admin';
        });
    }
}
