<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        if (Auth::check()){
            $user_roles = Auth::user()->roles();
            $isAdmin = false;
            if (in_array("admin",$user_roles))$isAdmin = true;
            if (Auth::user() &&  $isAdmin) {
                return $next($request);
            }
            return redirect('/');
        }
        return redirect('/');
    }
}
