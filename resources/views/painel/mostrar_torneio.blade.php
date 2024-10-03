@extends('app')
@section('conteudo')
    @include('painel.layout.navpainel')

    <div class="container">
        <div class="row">
            <div class="col-12">                    
                <img src="{{ $camp->imagem }}" class="img-fluid" alt="Banner">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>ID: {{ $camp->id }}</p>
                <p>Titulo: {{ $camp->titulo }}</p>
                <p>Data: {{ $camp->getData() }}</p>
                <p>Local: {{ $camp->getLocal() }}</p>
                <p>Sobre: {{ $camp->sobre }}</p>
                <p>Informações: {{ $camp->informacoes }}</p>
                <p>Ginásio: {{ $camp->ginasio }}</p>
                <p>Tipo: {{ $camp->getTipo() }}</p>
                <p>Fase: {{ $camp->getFase() }}</p>
                <p>Status: {{ $camp->status }}</p>


                <a href="{{ route('painel-torneios.index') }}">
                    <p>Voltar</p>
                </a>
            </div>
        </div>

        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-4 d-grid justify-content-center">
                @if ($camp->fase_id == 1)
                <a href="{{ route('painel-criar.chaves', $camp->id) }}">
                    <button type="button" class="btn btn-primary" title="Encerrar inscrições e criar chaves">Encerrar Inscrições</button>
                </a>
                    
                @elseif ($camp->fase_id == 2)

                <a href="{{ route('painel-chave.listagem', $camp->id) }}">
                    <button type="button" class="btn btn-primary" title="Chaves">Chaves</button>
                </a>

                @else

                <a href="{{ route('painel-resultados', $camp->id) }}">
                    <button type="button" class="btn btn-primary" title="Resultados">Resultados</button>
                </a>

                @endif
                

            </div>
        </div>

    </div>

@include('painel.layout.footer')
@endsection
