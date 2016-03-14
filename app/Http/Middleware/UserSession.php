<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      if (!$request->session()->has('user_id')) {
           $id = $request->user()->id;
           $request->session()->put('user_id', $id);
      }
        return $next($request);
    }
}
