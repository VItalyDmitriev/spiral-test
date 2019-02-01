<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        header("Access-Control-Allow-Origin: *");
        header('Asses-Control-Allow-Methods: POST, GET, OPTIONS');
        header('Asses-Control-Allow-Headers: Content-Type, Authorization');
        return $next($request);
    }
}
