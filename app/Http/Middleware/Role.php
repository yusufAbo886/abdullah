<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user =Auth::user();
        $currentRouteName = Route::currentRouteName();


        if (Auth::check()){
            if ($user->role =="member"){

                return redirect('/');

            }
        }
        return $next($request);


    }

}
