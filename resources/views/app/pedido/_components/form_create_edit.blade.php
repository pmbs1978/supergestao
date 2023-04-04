<form action="{{ isset($pedido->id) ? route('pedido.update', ['pedido' => $pedido->id]) : route('pedido.store') }}" method="POST">
    @csrf
    @if (isset($pedido->id))
        @method('PUT')
    @endif
    <select name="cliente_id" id="">
        <option value="">Selecione um cliente</option>
        @foreach ($clientes as $key => $cliente)
            <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('unidade_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
        <option value="erro">erro</option>
    </select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
    <button type="submit" class="borda-preta">{{ isset($pedido->id) ? 'Alterar' : 'Registar'}}</button>
</form>
