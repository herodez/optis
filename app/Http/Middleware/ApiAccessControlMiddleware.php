<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class ApiAccessControlMiddleware
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
        $apiToken = $request->get('API-TOKEN') ?? $request->header('API-TOKEN');
        
        if($apiToken !== 'prueba' ){
            abort(Response::HTTP_UNAUTHORIZED);
        }
        
        return $next($request);
    }
}
