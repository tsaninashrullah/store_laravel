<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Closure;

class SentinelAuth
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
        if (!Sentinel::check()) { // user is not authenticated
            return redirect()->route('login')->with('error', 'You must be logged to view the page');
        }
        return $next($request);
    }
}
