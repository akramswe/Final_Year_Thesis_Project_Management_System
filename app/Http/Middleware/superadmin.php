<?php

namespace App\Http\Middleware;

use Closure;
use Auth; //at the top

class superadmin
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
       if (Auth::check() && Auth::user()->role == 'superadmin') {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == 'student') {
            return redirect('/student');
        }
        elseif (Auth::check() && Auth::user()->role == 'faculty') {
            return redirect('/faculty');
        }
         elseif (Auth::check() && Auth::user()->role == 'admin') {
            return redirect('/admin');
        }
        else {
            return redirect('/unauthorized');
        }
    }
}
