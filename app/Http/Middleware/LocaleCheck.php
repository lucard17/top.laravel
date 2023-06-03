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
        $languages = ['en', 'ru'];
        $locale = Session::get('locale');
        if (!$locale) {
            $acceptLanguage = $request->header("accept-language");
            foreach ($languages as $language) {
                if (str($acceptLanguage)->startsWith($language)) {
                    $locale = $language;
                    break;
                }
            }
        }
        // $locale = $request->session()->get('locale');
        if ($locale) {
            App::setLocale($locale);
            // dd(App::getLocale());
        } else {
            App::setLocale(config('app.fallback_locale'));

        }
        return $next($request);
    }
}