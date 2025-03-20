<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ActiveAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()) {


            switch (Auth::user()->status) {

                case 'unassigned':
                    # code...
                    break;

                case 'active':
                    return $next($request);
                    break;

                default:

                    break;
            }
        }else {
            return $next($request);
        }
    }
}
