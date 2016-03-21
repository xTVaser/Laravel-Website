<?php

namespace App\Http\Middleware;

use Closure;

class ApplicantMiddleware
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
            $userFlag = $request->user()->flag;
            if( $userFlag == 0 ) {

                    return $next($request);
            }
            return redirect('errors/404');
    }
}
