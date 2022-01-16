<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('logged') && ($request->path()!= 'auth/login' && $request->path() != 'auth/register')) {
            return redirect('auth/login')->with('login_error', "You Must be logged in first");
        }
        if(session()->has('logged') && ($request->path()== 'auth/login' || $request->path() == 'auth/register')) {
            return back();
        }
        return $next($request);
    }
}
