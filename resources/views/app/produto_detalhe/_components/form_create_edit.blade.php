<form
    action="{{ isset($produtoDetalhe->id) ? route('produto-detalhe.update', ['produto_detalhe' => $produtoDetalhe->id]) : route('produto-detalhe.store') }}"
    method="POST">
    @csrf
    @if (isset($produtoDetalhe->id))
        @method('PUT')
    @endif
    <select name="produto_id" class="borda-preta">
        <option value="">-- Selecione o produto --</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}"
                {{ ($produtoDetalhe->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}</option>
        @endforeach
        <option value="">-- erro --</option>
    </select>
    <input type="number" step="0.01" name="comprimento" placeholder="comprimento" class="borda-preta"
        value="{{ $produtoDetalhe->comprimento ?? old('comprimento') }}">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
    <input type="number" step="0.01" name="largura" placeholder="largura" class="borda-preta"
        value="{{ $produtoDetalhe->largura ?? old('largura') }}">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
    <input type="number" step="0.01" name="altura" placeholder="altura" class="borda-preta"
        value="{{ $produtoDetalhe->altura ?? old('altura') }}">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}
    <select name="unidade_id" class="borda-preta">
        <option value="">-- Selecione a unidade --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}"
                {{ ($produtoDetalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->unidade }} - {{ $unidade->descricao }}</option>
        @endforeach
        <option value="2">-- erro --</option>
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">{{ isset($produtoDetalhe->id) ? 'Alterar' : 'Registar' }}</button>
</form>
