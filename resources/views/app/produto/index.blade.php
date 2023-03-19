@extends('app.layouts.basico')

@section('titulo', 'produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin: 0 auto;">
                <table class="table-s border-separate border-spacing-2">
                    <thead>
                        <th class="th-s">
                            Id
                        </th>
                        <th class="th-s">
                            Nome
                        </th>
                        <th class="th-s">
                            Descrição
                        </th>
                        <th class="th-s">
                            Peso
                        </th>
                        <th class="th-s">
                            Unidade
                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>
                                    {{ $produto->id }}
                                </td>
                                <td>
                                    {{ $produto->nome }}
                                </td>
                                <td>
                                    {{ $produto->descricao }}
                                </td>
                                <td>
                                    {{ $produto->peso }}
                                </td>
                                <td>
                                    {{ $produto->unidade_id }}
                                </td>
                                <td>
                                    <a class="text-blue-600" href="">editar</a>
                                </td>
                                <td>
                                    <a class="text-blue-600" href="">apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{ $produtos->appends($request)->links() }}


            </div>

        </div>
    </div>

@endsection
