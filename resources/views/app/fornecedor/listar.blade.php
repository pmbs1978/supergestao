@extends('app.layouts.basico')

@section('titulo', 'fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
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
                            Site
                        </th>
                        <th class="th-s">
                            UF
                        </th>
                        <th class="th-s">
                            E-mail
                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>
                                    {{ $fornecedor->id }}
                                </td>
                                <td>
                                    {{ $fornecedor->nome }}
                                </td>
                                <td>
                                    {{ $fornecedor->site }}
                                </td>
                                <td>
                                    {{ $fornecedor->uf }}
                                </td>
                                <td>
                                    {{ $fornecedor->email }}
                                </td>
                                <td>
                                    <a class="text-blue-600" href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">editar</a>
                                </td>
                                <td>
                                    <a class="text-blue-600" href="{{ route('app.fornecedor.apagar', $fornecedor->id) }}">apagar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{ $fornecedores->appends($request)->links() }}


            </div>

        </div>
    </div>

@endsection
