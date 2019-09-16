<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class ComposerAccessControlMiddleware
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
        if($request->header('COMPOSER-TOKEN') !== 'test'){
           abort(Response::HTTP_UNAUTHORIZED) ;
        }
        
        return $next($request);
    }
}
