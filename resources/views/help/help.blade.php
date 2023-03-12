<h3>fornecedores</h3>

{{-- comentários no blade --}}

@php
    // bloco de vanilla php
    var_dump($fornecedores);
@endphp

{{-- similar ao var_dump mas para a execução do código --}}
{{-- @dd($fornecedores) --}}

<h2>if/else</h2>
{{-- if/else --}}
@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem menos de 10 fornecedores.</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem mais de 10 fornecedores.</h3>
@else
    <h3>Não xistem fornecedores.</h3>
@endif

<h2>unless</h2>
{{-- @unless() igual a usar o if com a negação de uma condição if( !<condição> ) --}}
{{-- if executa se a condição for verdadeira o unless se a condição for falsa --}}
<p>Nome do fornecedor: {{ $fornecedor[0]['nome'] }}</p>
<p>Status do fornecedor: {{ $fornecedor[0]['status'] }}</p>

@if (!($fornecedor[0]['status'] == 'S'))
    <p>Fornecedor inactivo</p>
@endif

@unless($fornecedor[0]['status'] == 'S')
    <p>Fornecedor inactivo</p>
@endunless

<h2>isset</h2>
{{-- igual ao isset nativo --}}
@if (isset($fornecedor))
    <p>Existe fornecedor</p>
@endif

@isset($fornecedor)
    <p>Existe fornecedor</p>
@endisset

<h2>empty</h2>
{{-- igual ao empty nativo --}}
{{-- valore considerados vazios
"" (uma string vazia)
0 (0 como um inteiro)
0.0 (0 como um ponto flutuante)
"0" (0 como uma string)
null
false
array() (um array vazio)
$var; (uma variável declarada, mas sem valor) 
--}}

<p>Nome: {{ $fornecedor[0]['nome'] }}</p>
<p>Status: {{ $fornecedor[0]['status'] }}</p>
<p>CNPJ:
    @empty($fornecedor[0]['cnpj'])
        não defenido
    @endempty
    {{ $fornecedor[0]['cnpj'] }}</p>

<hr>

<p>Nome: {{ $fornecedor[1]['nome'] }}</p>
<p>Status: {{ $fornecedor[1]['status'] }}</p>
<p>CNPJ:
    @empty($fornecedor[1]['cnpj'])
        {{ $cnpjMsg }}
    @endempty
    {{ $fornecedor[1]['cnpj'] }}</p>

<h2>Operador valor default</h2>
{{-- se a variavel não estiver defenida ou tiver o valor null retorna um valor default --}}
<p>Nome: {{ $fornecedor[1]['nome'] }}</p>
<p>Status: {{ $fornecedor[1]['status'] }}</p>
<p>Contacto: {{ $fornecedor[1]['contacto'] ?? 'contacto não informado' }}</p>

<h2>switch/case</h2>
{{-- igual ao php nativo --}}
@switch($fornecedor[0]['estado'])
    @case('11')
        indice 0
        @break
    @case('22')
        indice 1
        @break
    @case('33')
        indice 2
        @break
    @default
        incide não encontrado
@endswitch


<h2>for</h2>

@for ($i = 0; $i < count($fornecedor); $i++)
    <p>Nome: {{ $fornecedor[$i]['nome'] }}</p>
    <p>Status: {{ $fornecedor[$i]['status'] }}</p>
    <p>Telefone: {{ $fornecedor[$i]['telefone'] }}</p>
    <hr>
@endfor

<h2>while</h2>
@php
    $a = 0;
@endphp

@while (isset($fornecedor[$a]))
    <p>Nome: {{ $fornecedor[$a]['nome'] }}</p>
    <p>Status: {{ $fornecedor[$a]['status'] }}</p>
    <p>Telefone: {{ $fornecedor[$a]['telefone'] }}</p>
    <hr>
    @php
        $a++
    @endphp
@endwhile

<h2>foreach</h2>
@foreach ($fornecedor as $indice => $item)
    {{-- todas operações feitas dentro do foreach não afetam o array original --}}
    {{-- todas operações são feitas no contexto do foreach --}}
    {{-- para que as alterações tenham efeito dentro do array original temos que passar a referencia --}}
    @php
        $item['nome'] = 'operação de teste'
    @endphp
    {{-- para que alterações tenham efeito temos que passara areferencia --}}
    @php
        $fornecedor[$indice]['telefone'] = '0000000000'
    @endphp
    <p>Nome: {{ $item['nome'] }}</p>
    <p>Status: {{ $item['status'] }}</p>
    <p>Telefone: {{ $item['telefone'] }}</p>
    <hr>
@endforeach

<h4>foreach após as alterações voltou ao original no nome mas manteve o telefone</h4>
@foreach ($fornecedor as $indice => $item)
    <p>Nome: {{ $item['nome'] }}</p>
    <p>Status: {{ $item['status'] }}</p>
    <p>Telefone: {{ $item['telefone'] }}</p>
    <hr>
@endforeach

<h2>forelse</h2>
{{-- não existe no php --}}
{{-- se o array estiver vazio o fluxo é desviado para o bloco empty --}}
@php
    $teste = []
@endphp
@forelse ($teste as $value)
    
@empty
    Não existe valor
@endforelse

<h2>escapar a tag de impressão do blade caracter @</h2>

@{{ $fornecedor[0]['nome'] }}


<h2>varável loop do foreach e forelse</h2>
@foreach ($fornecedor as $indice => $item)
    @php
        echo "variavel loop: <br>";
         var_dump($loop);
         echo "<br>";
    @endphp
    <p>Iteração actual "$loop->iteration": {{ $loop->iteration }}</p>
    <p>Iteração actual "$loop->index": {{ $loop->index }}</p>
    <p>Iteração actual "$loop->remaining": {{ $loop->remaining }}</p>
    <p>Iteração actual "$loop->count": {{ $loop->count }}</p>
    <p>Iteração actual "$loop->first": {{ $loop->first }}</p>
    <p>Iteração actual "$loop->last": {{ $loop->last }}</p>
    <p>Iteração actual "$loop->odd": {{ $loop->odd }}</p>
    <p>Iteração actual "$loop->even": {{ $loop->even }}</p>
    <p>Iteração actual "$loop->depth": {{ $loop->depth }}</p>
    <p>Iteração actual "$loop->parent": {{ $loop->parent }}</p>
    <p>Nome: {{ $item['nome'] }}</p>
    <p>Status: {{ $item['status'] }}</p>
    <p>Telefone: {{ $item['telefone'] }}</p>
    <hr>
@endforeach