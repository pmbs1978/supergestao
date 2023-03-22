@extends('app.layouts.basico')

@section('titulo', 'produto')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">

            <p>Produto - Editar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 0 auto;">
                {{-- <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="$produto->id">
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta"
                        value="{{ old('nome') ?? $produto->nome }}">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="descricao" placeholder="descricao" class="borda-preta"
                        value="{{ old('descricao') ?? $produto->descricao }}">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    <input type="number" name="peso" placeholder="peso" class="borda-preta"
                        value="{{ old('peso') ?? $produto->peso }}">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    <select name="unidade_id" class="borda-preta">
                        <option value="">-- Selecione a unidade --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}"
                                {{ old('unidade_id') ?? $produto->unidade_id == $unidade->id ? 'selected' : '' }}>
                                {{ $unidade->unidade }} - {{ $unidade->descricao }}</option>
                        @endforeach
                        <option value="2">-- erro --</option>
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <button type="submit" class="borda-preta">Alterar</button>
                </form> --}}
                @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades])
                @endcomponent
            </div>

        </div>
    </div>
@endsection
