@extends('site.layouts.basico')

@section('titulo', 'Contacto')

@section('conteudo')

        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Entre em contato conosco</h1>
            </div>

            <div class="informacao-pagina">
                <div class="contato-principal">
                    @component('site.layouts._components.form_contacto', ['classe' => 'borda-preta', 'motivo_contactos' => $motivo_contactos])
                        <p>A nossa equipa analisará a sua mensagem o mais breve possivel!</p>
                        <p>O tempo médio de resposta é de 48 horas.</p>
                    @endcomponent
                </div>
            </div>
        </div>

@endsection

@section('rodape', true)
