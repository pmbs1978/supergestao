<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){
        $msg = '';
        if($request->input('_token') != ''){
            // validação
            $regras = [
                'nome' => 'required | min:3 | max:40',
                'site' => 'required',
                'uf' => 'required | min:2 | max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo :attribute deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo :attribute deve ter no maximo 40 caracteres',
                'uf.min' => 'O campo :attribute deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo :attribute deve ter no maximo 2 caracteres',
                'email.email' => 'O campo :attribute deve ser um email válido'
            ];

            $request->validate($regras, $feedback);
            Fornecedor::create($request->all());
            // $fornecedor = new Fornecedor();
            // $fornecedor->create($request->all());
            $msg = 'Registo efetuado com sucesso';
        }

        return view('app.fornecedor.adicionar', compact('msg'));
    }
}
