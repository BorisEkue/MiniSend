<?php

namespace App\Http\Middleware\Custom;

use Closure;

class BasicAuthentication
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
        $ip_address = $request->ip();                
       
        return $next($request);
    }
}
