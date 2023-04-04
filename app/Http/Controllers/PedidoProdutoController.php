<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;
use App\Models\Cliente;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos; // eager loading
        return view('app.pedido-produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required|integer'
        ];
         $feedback = [
            'produto_id.exists' => 'O produto não existe',
            'required' => 'O campo :attribute tem de ser preenchido',
            'integer' => 'O valor tem de ser um número inteiro'
        ];

        $request->validate($regras, $feedback);

        // $pedidoProduto = new PedidoProduto;
        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id = $request->get('produto_id');
        // $pedidoProduto->quantidade = $request->get('quantidade');
        // $pedidoProduto->save();

        //$pedido->produtos; // registos do relacionamento
        // $pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]); // objecto que mapea relacionamento
        $pedido->produtos()->attach([$request->get('produto_id') => ['quantidade' => $request->get('quantidade')]]);
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Pedido $pedido, Produto $produto)
    // {
    //     // print_r($pedido->getAttributes());
    //     // echo '<hr>';
    //     // print_r($produto->getAttributes());

    //     // PedidoProduto::where([
    //     //     'pedido_id' => $pedido->id,
    //     //     'produto_id' => $produto->id
    //     // ])->delete();

    //     // detach (delete pelo relacionamento)
    //     $pedido->produtos()->detach($produto->id);
    //     // $produto->pedidos()->detach($pedido->id);

    //     return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    // }
    public function destroy(PedidoProduto $pedidoProduto, $pedidoId)
    {
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedidoId]);
    }
}
