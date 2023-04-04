@extends('app.layouts.basico')

@section('titulo', 'cliente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">

            <p>Cliente - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 0 auto;">

            @component('app.cliente._components.form_create_edit', compact('cliente'))

            @endcomponent
            </div>

        </div>
    </div>
@endsection
