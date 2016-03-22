<?php

namespace App\Http\Middleware;

use Closure;

class FacultyMiddleware
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

            $userFlag =  $request->user()->flag;
            if( $userFlag == 1 ) {

                    return $next($request);
            }
            return redirect('errors/404');
    }
}
