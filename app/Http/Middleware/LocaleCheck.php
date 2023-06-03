<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LocaleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $locale = $request->session()->get('locale');
        $locale = Session::get('locale');
        if ($locale) {
            App::setLocale($locale);
            // dd(App::getLocale());
        } else {
            App::setLocale(config('app.fallback_locale'));

        }
        return $next($request);
    }
}