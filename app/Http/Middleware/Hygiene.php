<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Hygiene
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

        if (Auth::user()->role->slug == "user") {
            return redirect()->route('home');
        }

        if (Auth::user()->role->slug == "SrOpManager") {
            return redirect()->route('sropmanager');
        }

        if (Auth::user()->role->slug == "OpManager") {
            return redirect()->route('opmanager');
        }

        if (Auth::user()->role->slug == "sitemanager") {
            return redirect()->route('sitemanager');
        }

        if (Auth::user()->role->slug == "hygiene") {
            return $next($request);
        }
    }
}
