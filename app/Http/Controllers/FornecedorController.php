<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'LIKE', '%' . $request->input('nome') . '%')->
        where('site', 'LIKE', '%' . $request->input('site') . '%')->
        where('uf', 'LIKE', '%' . $request->input('uf') . '%')->
        where('email', 'LIKE', '%' . $request->input('email') . '%')->
        paginate(2);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){
        $msg = '';
        if($request->input('_token') != '' && $request->input('id') == ''){
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

        if($request->input('_token') != '' && $request->input('id') != ''){
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

            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = 'Registo alterado com sucesso';
            } else {
                $msg = 'Erro na alteração do registo';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', compact('msg'));
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function apagar($id){
        // implementando soft delete
        Fornecedor::find($id)->delete();
        //apagando por completo o registo
        // Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}
