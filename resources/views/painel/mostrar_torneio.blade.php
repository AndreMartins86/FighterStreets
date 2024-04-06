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
    </div>



@include('painel.layout.footer')
@endsection
