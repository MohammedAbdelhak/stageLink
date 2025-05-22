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
    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user());
        $currentUser = Auth::user();
        if ($currentUser) {
            switch ($currentUser->status) {

                case 'unassigned':
                    // dd("hehe");

                    switch ($currentUser->type) {
                        case 'Student':
                            return redirect('settings/assignUni');
                            break;
                        case 'Company':
                            return redirect('settings/assignComp');
                            break;
                        case 'Department':
                            return redirect('settings/assignDep');
                            break;
                    }

                    break;

                case 'active':
                    return $next($request);
                    break;

                case 'pending':
                    // dd("hehe");
                    return redirect('pending');
                    # code...
                    break;
            }
        } else {
            return redirect('login');
        }
    }
}
