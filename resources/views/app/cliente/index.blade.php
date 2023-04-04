@extends('app.layouts.basico')

@section('titulo', 'cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin: 0 auto;">
                {{-- {{ $produtos->toJson() }} --}}
                <table class="table-s border-separate border-spacing-2">
                    <thead>
                        <th class="th-s">
                            Id
                        </th>
                        <th class="th-s">
                            Nome
                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>
                                    {{ $cliente->id }}
                                </td>
                                <td>
                                    {{ $cliente->nome }}
                                </td>
                                <td>
                                    <a class="text-blue-600"
                                        href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">visualizar</a>
                                </td>
                                <td>
                                    <a class="text-blue-600"
                                        href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">editar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $cliente->id }}"
                                        action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">apagar</button> --}}
                                        <a class="text-blue-600" href="#"
                                            onclick="document.getElementById('form_{{ $cliente->id }}').submit()">apagar</a>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $clientes->appends($request)->links() }}


            </div>

        </div>
    </div>

@endsection
