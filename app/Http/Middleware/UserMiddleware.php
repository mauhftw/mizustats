<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;


class UserMiddleware
{

/*  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
  }*/

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      /*if(Auth::user()->isUser('user')){
          return redirect('home');
      }*/

          if (Auth::guard($guard)->user()->isUser('user')) {
                return redirect('home');
          }
          return $next($request);
      }
    
}
