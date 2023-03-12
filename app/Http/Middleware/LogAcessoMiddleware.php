<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \App\Models\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request->server);
        $log = $request->server->get('REMOTE_ADDR') . $request->server->get('PHP_SELF');
        LogAcesso::create(['log' => $log]);
        // $request - manipular
        // return $next($request);
        // return response('teste');

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'o statusCode e o statusText Foram alterados');
        // dd($resposta);
        return $resposta;
    }
}
