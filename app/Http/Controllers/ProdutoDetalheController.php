<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\ItemDetalhe;
use App\Models\Unidade;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $produtoDetalhes = ProdutoDetalhe::paginate(5);
        $produtoDetalhes = ItemDetalhe::paginate(5);
        return view('app.produto_detalhe.index', ['produtoDetalhes' => $produtoDetalhes, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', compact('produtos', 'unidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        return redirect()->route('produto-detalhe.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        $produtos = Produto::all();
        $unidades = Unidade::all();
        $produtoDetalhe = $produtoDetalhe->with(['produto'])->first();
        return view('app.produto_detalhe.edit', compact('produtoDetalhe', 'produtos', 'unidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        return 'Gravação feita com sucesso';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
