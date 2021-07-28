<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSoftDelete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user('admin')->deleted_at == null) :
            return $next($request);
        else:
            \Auth::guard('admin')->logout();
            return redirect()->route('admin.login')->withErrors(['suspended' => 'Your account is deactivated']);
        endif;
    }
}
