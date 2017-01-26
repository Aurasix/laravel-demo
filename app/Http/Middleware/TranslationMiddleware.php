<?php

namespace App\Http\Middleware;

use Closure;

class TranslationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lang = $request->session()->get('lang');
        if (empty($lang)) {
            $lang = 'en';
            $request->session()->put('lang', $lang);
        }

        \App::setLocale($lang);

        return $next($request);
    }
}
