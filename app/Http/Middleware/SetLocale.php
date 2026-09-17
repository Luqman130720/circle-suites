<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        $locale = session('locale', 'id');

        $supportedLocales = [
            'id',
            'en',
        ];

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = 'id';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
