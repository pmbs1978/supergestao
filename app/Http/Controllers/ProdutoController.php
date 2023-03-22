<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(5);

        foreach($produtos as $key => $produto){
            $detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->get();
            // dd($produto);
            echo '<br><br><br>';
            dd($detalhe->get('id'));
            echo '<br><br><br>';
        }

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
        // return view('app.produto.create-edit', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras_validacao = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            // campo => exists:tabela de referencia,campo de referencia
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback_validacao = [
            'required' => 'O campo :attribute tem de ser preenchido',
            'min' => 'O campo :attribute tem de ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome tem de ter no máximo 40 caracteres',
            'descricao.max' => 'O campo descrição tem de ter no máximo 40 caracteres',
            'integer' => 'O campo .attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida não existe'
        ];

        $request->validate($regras_validacao, $feedback_validacao);
        // Produto::create($request->all());
        // return redirect()->route('produto.index');

        // $nome = $request->nome;
        // $descricao = $request->descricao;
        // $peso = $request->peso;
        // $unidade_id = $request->unidade_id;
        // $produto = new Produto();
        // $produto::create(['nome' => $nome, 'descricao' => $descricao, 'peso' => $peso, 'unidade_id' => $unidade_id]);
        // return redirect()->route('produto.index');

        $nome = $request->get('nome');
        $descricao = $request->get('descricao');
        $peso = $request->get('peso');
        $unidade_id = $request->get('unidade_id');
        $produto = new Produto();
        $produto->nome = $nome;
        $produto->descricao = $descricao;
        $produto->peso = $peso;
        $produto->unidade_id = $unidade_id;
        $produto->save();
        return redirect()->route('produto.index');



    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        $unidade = Unidade::find($produto->unidade_id);
        return view('app.produto.show', ['produto' => $produto, 'unidade' => $unidade]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        // return view('app.produto.create-edit', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $regras_validacao = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            // campo => exists:tabela de referencia,campo de referencia
            'unidade_id' => 'exists:unidades,id'
        ];

        $feedback_validacao = [
            'required' => 'O campo :attribute tem de ser preenchido',
            'min' => 'O campo :attribute tem de ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome tem de ter no máximo 40 caracteres',
            'descricao.max' => 'O campo descrição tem de ter no máximo 40 caracteres',
            'integer' => 'O campo .attribute deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida não existe'
        ];

        $request->validate($regras_validacao, $feedback_validacao);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
