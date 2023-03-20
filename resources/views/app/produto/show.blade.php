@extends('app.layouts.basico')

@section('titulo', 'produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">

            <p>Produto - visualizar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 0 auto;">
                <table style="text-align: left; width: 100%;">
                    <tr>
                        <td>
                            ID:
                        </td>
                        <td>
                            {{ $produto->id}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NOME:
                        </td>
                        <td>
                            {{ $produto->nome}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            DESCRIÇÃO:
                        </td>
                        <td>
                            {{ $produto->descricao}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PESO:
                        </td>
                        <td>
                            {{ $produto->peso}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            UNIDADE:
                        </td>
                        <td>
                            {{ $unidade->descricao }}
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
@endsection
