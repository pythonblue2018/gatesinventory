<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (auth()->user()->admin >= 1)
        {
            // dd('Admin');
            return $next($request);
        }
        else {
            dd('Basic Admin / Customer');
            return redirect()->guest('/');
            }   
    }
}
