<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){

        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário e ou senha não válidos';
        }

        if($request->get('erro') == 2){
            $erro = 'nacessário eftuar login para aceder á página';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'usuario' => 'required | email',
            'senha' => 'required'
        ];

        $feedBack = [
            // 'required' => 'O campo precisa de ser preenchido'
            'usuario.email' => 'O campo :attribute precisa de ser um email',
            'required' => 'O campo :attribute precisa de ser preenchido'
        ];

        $request->validate($regras, $feedBack);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        // $usuario = User::where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['name'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // dd($_SESSION);
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        // print_r($request->all());
        return 'chegamos aqui';
    }

    public function logout(){
        // session_start();
        session_destroy();
        return redirect()->route('site.index');
    }
}
