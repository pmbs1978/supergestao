@extends('app.layouts.basico')

@section('titulo', 'produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto detalhe - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto-detalhe.create') }}">Novo</a></li>
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
                            Produto
                        </th>
                        <th class="th-s">
                            Comprimento
                        </th>
                        <th class="th-s">
                            Largura
                        </th>
                        <th class="th-s">
                            Altura
                        </th>
                        <th class="th-s">
                            Unidade
                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                        <th class="th-s">

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($produtoDetalhes as $produtoDetalhe)
                            <tr>
                                <td>
                                    {{ $produtoDetalhe->id }}
                                </td>
                                <td>
                                    {{ $produtoDetalhe->produto_id }}
                                </td>
                                <td>
                                    {{ $produtoDetalhe->comprimento }}
                                </td>
                                <td>
                                    {{ $produtoDetalhe->largura }}
                                </td>
                                <td>
                                    {{ $produtoDetalhe->altura }}
                                </td>
                                <td>
                                    {{ $produtoDetalhe->unidade_id }}
                                </td>
                                <td>
                                    <a class="text-blue-600"
                                        href="{{ route('produto-detalhe.show', ['produto_detalhe' => $produtoDetalhe->id]) }}">visualizar</a>
                                </td>
                                <td>
                                    <a class="text-blue-600"
                                        href="{{ route('produto-detalhe.edit', ['produto_detalhe' => $produtoDetalhe->id]) }}">editar</a>
                                </td>
                                <td>
                                    <form id="form_{{ $produtoDetalhe->id }}"
                                        action="{{ route('produto-detalhe.destroy', ['produto_detalhe' => $produtoDetalhe->id]) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit">apagar</button> --}}
                                        <a class="text-blue-600" href="#"
                                            onclick="document.getElementById('form_{{ $produtoDetalhe->id }}').submit()">apagar</a>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtoDetalhes->appends($request)->links() }}


            </div>

        </div>
    </div>

@endsection
