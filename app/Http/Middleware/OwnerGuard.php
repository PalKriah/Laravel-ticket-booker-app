<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class OwnerGuard
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
        if (Auth::user() && $request->route()->parameter('cinema') && Auth::user()->cinemas->count() > 0) {
            $reqCinema = $request->route()->parameter('cinema');
            
            foreach (Auth::user()->cinemas as $cinema) {
                if($cinema->id == $reqCinema->id) {
                    return $next($request);
                }
            }
        }
        return redirect('/')->with('error', __('Unauthorized access'));
    }
}
