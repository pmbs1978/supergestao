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
                <table>
                    <thead>
                        <th>
                            Id
                        </th>
                        <th>
                            Nome
                        </th>
                        <th>
                            Site
                        </th>
                        <th>
                            UF
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>

                        </th>
                        <th>

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
                                    <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">editar</a>
                                </td>
                                <td>
                                    excluir
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
