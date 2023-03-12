@extends('app.layouts.basico')

@section('titulo', 'fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 0 auto;">
                @if($msg != '')
                    <p style="display: block; background-color: green; padding: 15px; color: white">{{ $msg }}</p>
                @endif
                <form action="" method="POST">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ old('nome') }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ old('site') }}">
                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                    <input type="text" name="uf" placeholder="uf" class="borda-preta" value="{{ old('uf') }}">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                    <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{ old('email') }}">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                    <button type="submit" class="borda-preta">Registar</button>
                </form>
            </div>

        </div>
    </div>
@endsection
