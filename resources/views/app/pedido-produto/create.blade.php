@extends('app.layouts.basico')

@section('titulo', 'pedido-produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">

            <p>Pedido produto - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <div style="width: 30%; margin: 0 auto;">
                <h4>Items do pedido</h4>
                <table>
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                nome
                            </th>
                            <th>
                                criado em
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $key => $produto)
                            <tr>
                                <td>
                                    {{ $produto->id }}
                                </td>
                                <td>
                                    {{ $produto->nome }}
                                </td>
                                <td>
                                    {{ $produto->pivot->created_at->format('d/m/y') }}
                                </td>
                                <td>
                                    {{-- <form id="form_{{$pedido->id}}_{{$produto->id}}" method="POST" action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">apagar</a>
                                    </form> --}}
                                    <form id="form_{{$produto->pivot->id}}" method="POST" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedidoId' => $pedido->id])}}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">apagar</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido-produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>

        </div>
    </div>
@endsection
