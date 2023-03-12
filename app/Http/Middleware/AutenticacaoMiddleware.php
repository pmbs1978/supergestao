<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo $metodo_autenticacao . ' - ' . $perfil . '<br>';

        // if($metodo_autenticacao == 'padrao'){
        //     echo 'verificar senha e user no banco de dados - ' . $perfil . '<br>';
        // }

        // if($metodo_autenticacao == 'ldap'){
        //     echo 'verificar senha e user no active directory - ' . $perfil . '<br>';
        // }

        // if($perfil == 'visitante'){
        //     echo 'Mostrar apenas alguns recursos<br>';
        // }

        // if(false){
        //     return $next($request);
        // } else {
        //     return Response('Acesso negado! Esta rota requer autenticação');
        // }

        // return $next($request);


        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != ''){
            return $next($request);
        }

        return redirect()->route('site.login', ['erro' => 2]);
    }
}
