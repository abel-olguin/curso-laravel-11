<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
                  ->withRouting(
                      web: __DIR__ . '/../routes/web.php',
                      commands: __DIR__ . '/../routes/console.php',
                      health: '/up',
                      then: function () {
                          Route::middleware('web')
                               ->group(base_path('routes/public.php'));
                      }
                  )
                  ->withMiddleware(function (Middleware $middleware) {#globales
                      $middleware->redirectGuestsTo('/login');
                     
                      #$middleware->use([\App\Http\Middleware\LocalizationMiddleware::class]);
                      $middleware->web(append: [
                          \App\Http\Middleware\LocalizationMiddleware::class
                      ]);
                  })
                  ->withExceptions(function (Exceptions $exceptions) {
                      //
                  })->create();
