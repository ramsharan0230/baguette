<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class SiteManager
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role->name == "hygiene") {
            return redirect()->route('hygiene');
        }

        if (Auth::user()->role->name == "user") {
            return redirect()->route('user');
        }

        if (Auth::user()->role->name == "sitemanager") {
            return $next($request);
        }
    }
}
