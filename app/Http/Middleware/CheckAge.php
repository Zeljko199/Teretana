<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Kernel;

class CheckAge extends Middleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->check <= 20){
            return redirect('contact');
        }
        return $next($request);
    }
}
