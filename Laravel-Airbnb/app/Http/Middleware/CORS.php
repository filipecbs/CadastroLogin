<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        $resposta = $next($request);

        $resposta->header('Access-Control-Origin', '*')
                 ->header('Access-Control-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                 ->header('Access-Control-Headers', 'Authorization, Content-Type');

        return $resposta;
    }
}
