<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLanguages = ['es', 'en'];
        $param              = $request->get('lang');
        $session            = session()->has('lang') ? session()->get('lang') : 'en';
        $lang               = $param && in_array($param, $availableLanguages) ? $param : $session;

        App::setLocale($lang);
        session()->put('lang', $lang);
        return $next($request);
    }
}
