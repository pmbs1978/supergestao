@extends('app.layouts.basico')

@section('titulo', 'produto-detalhes')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">

            <p>Detalhes produto - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 0 auto;">
                @component('app.produto_detalhe._components.form_create_edit', ['produtoDetalhe' => $produtoDetalhe, 'produtos' => $produtos, 'unidades' => $unidades])
                @endcomponent
            </div>

        </div>
    </div>
@endsection
