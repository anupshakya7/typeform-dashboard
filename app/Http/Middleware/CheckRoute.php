<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $routeName = $request->route()->getName();

        if(auth()->user()->hasPermissionToRoute($routeName)){
            return $next($request);
        }
       
        return abort(403,"User don't have Access.");
    }
}
