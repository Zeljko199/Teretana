<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    /*protected function redirectTo(Request $request): ?string
    {
        if(! $request->expectsJson()){
            if(Auth::check() && Auth::user()->role === 'admin'){
                return route('adminMaster');
            }
            elseif (Auth::check() && Auth::user()->role === 'trainer'){
                return route('trainerMaster');
            }
            elseif (Auth::check() && Auth::user()->role === 'member'){
                return route('memberMaster');
            }
            else{
                return route('login');
            }
        }
        return route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $user = Auth::user();

        if($user !== null && $user->role != "admin"){
            return redirect("/login");
        }
        return $next($request);
    }
}*/
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
