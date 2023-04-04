<form action="{{ isset($cliente->id) ? route('cliente.update', ['cliente' => $cliente->id]) : route('cliente.store') }}" method="POST">
    @csrf
    @if (isset($cliente->id))
        @method('PUT')
    @endif
    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <button type="submit" class="borda-preta">{{ isset($cliente->id) ? 'Alterar' : 'Registar'}}</button>
</form>
