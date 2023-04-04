<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(5);
        $request = $request->all();
        return view('app.cliente.index', compact('clientes', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:20'
        ];
        $feedback = [
            'required' => 'É obrigatório preencher o :attribute',
            'min' => 'O :attribute tem de ter no minimo 3 caracteres',
            'max' => 'O :attribute tem de ter no máximo 20 caracteres'
        ];

        $request->validate($regras, $feedback);
        // Cliente::create($request->all());
        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->save();
        return redirect()->route('cliente.index');
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
        $cliente = Cliente::find($id);
        return view('app.cliente.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $regras = [
            'nome' => 'required|min:3|max:20'
        ];
        $feedback = [
            'required' => 'É obrigatório preencher o :attribute',
            'min' => 'O :attribute tem de ter no minimo 3 caracteres',
            'max' => 'O :attribute tem de ter no máximo 20 caracteres'
        ];

        $request->validate($regras, $feedback);
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cliente::find($id)->delete();
        return redirect()->route('cliente.index');
    }
}
