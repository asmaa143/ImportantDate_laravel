<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;

class ChangeLanguage
{
    /**
     * Localization constructor.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // read the language from the request header
        $locale = $request->header('Content-Language');

        app()->setLocale('en');

        if (isset($locale) && $locale == 'ar')
            app()->setLocale('ar');

        $response = $next($request);
        // set Content Languages header in the response
        $response->headers->set('Content-Language', $locale);
        // return the response
        return $response;
    }
}
