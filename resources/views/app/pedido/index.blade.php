@extends('app.layouts.basico')

@section('titulo', 'cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedidos - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin: 0 auto;">
                {{-- {{ $pedidos->toJson() }} --}}
                <table class="table-s border-separate border-spacing-2">
                    <thead>
                        <th class="th-s">
                            Id pedido
                        </th>
                        <th class="th-s">
                            Cliente
                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>
                                    {{ $pedido->id }}
                                </td>
                                <td>
                                    {{ $pedido->clientes->nome }}
                                </td>
                                <td>
                                    <a class="text-blue-600" href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar produtos</a>
                                </td>
                                <td>
                                    <a class="text-blue-600"
                                        href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">visualizar</a>
                                </td>
                                <td>
                                    <a class="text-blue-600"
                                        href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">editar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $pedido->id }}"
                                        action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">apagar</button> --}}
                                        <a class="text-blue-600" href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}').submit()">apagar</a>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}


            </div>

        </div>
    </div>

@endsection
