<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect(RouteServiceProvider::HOME);
            $role = Auth::user()->roleid;
            switch ($role) {
                case 1:
                    return redirect()->route('person.form');
                    break;
                    
                case 2:
                    return redirect()->route('root');
                    break;
                
                case 3:
                    return redirect()->route('applications.candidates');
                    break;
                case 4:
                    return redirect()->route('hr-managers.index'); 
                    break;  
            }
        }

        return $next($request);
    }
}
