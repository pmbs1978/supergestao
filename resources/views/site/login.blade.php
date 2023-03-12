@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
        {{-- @if ($errors->any())
            <div style="position: absolute; top: 0; left: 0; width: 100%; background-color: red;">
<pre>
@foreach ($errors->all() as $erro)
{{ $erro }}
@endforeach
</pre>
            </div>
        @endif --}}
            <div style="width: 30%; margin: auto;">
                <form action="{{ route('site.login') }}" method="POST">
                    @csrf
                    <input type="text" name="usuario" placeholder="usuário" class="borda-preta" value="{{ old('usuario') }}">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}
                    <input type="password" name="senha" placeholder="password" class="borda-preta" value="{{ old('senha') }}">
                    {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{ isset($erro) ? $erro : '' }}
            </div>
        </div>
    </div>

@endsection

@section('rodape', true)
