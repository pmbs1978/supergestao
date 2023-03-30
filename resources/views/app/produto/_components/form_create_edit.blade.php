<form action="{{ isset($produto->id) ? route('produto.update', ['produto' => $produto->id]) : route('produto.store') }}" method="POST">
    @csrf
    @if (isset($produto->id))
        @method('PUT')
    @endif
    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" placeholder="descricao" class="borda-preta" value="{{ $produto->descricao ?? old('descricao') }}">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    <select name="fornecedor_id" class="borda-preta">
        <option value="">-- Selecione o fornecedor --</option>
        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
        @endforeach
        <option value="">-- erro --</option>
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
    <input type="number" name="peso" placeholder="peso" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id" class="borda-preta">
        <option value="">-- Selecione a unidade --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->unidade }} - {{ $unidade->descricao }}</option>
        @endforeach
        <option value="">-- erro --</option>
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">{{ isset($produto->id) ? 'Alterar' : 'Registar'}}</button>
</form>
