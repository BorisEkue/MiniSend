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
        
        // if ($request->input('token') !== 'my-secret-token') {
        //     return redirect('home');
        // }

        if($request->ip() !== '127.0.0.1') {
            header('HTTP/1.1 401 Authorization Required');
            header('WWW-Authenticate: Basic realm="Access denied"');
           // return "nok";
           return response()->json( [
            'id' => 1,
            'value' => '',
            'description' => 'description',
            ], 401);
        } 
        return $next($request);
    }
}
