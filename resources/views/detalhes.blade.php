@extends('app')
@section('conteudo')
    @include('layout.navhome')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- !!!!!!!!! arrumar o tamanho da imagem depois !!!!!!!!!! --}}
                <img id="bannerDetalhes" src="{{ $campeonato->imagem }}" class="img-fluid" alt="..." style="width: 100%">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">              
                <h2><time> {{ $campeonato->getData() }}</time></h2>
            </div>
            <div class="col-12">
                <h2>{{ $campeonato->titulo }}<span> #{{ $campeonato->id }}</span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <p>{{ $campeonato->getLocal() }}</p>
            </div>
            <div class="col-2">
                <p>{{ $campeonato->getTipo() }}</p>
            </div>
        </div>

        <div class="row">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <p class="nav-link active" id="btnSobre" aria-current="page">Sobre o evento</p>
                </li>
                <li class="nav-item">
                    <p class="nav-link" id="btnGinasio">Ginasio</p>
                </li>
                <li class="nav-item">
                    <p class="nav-link" id="btnInfo">Informações</p>
                </li>                
            </ul>
        </div>


        <div class="row">
            <div id="sobre" class="col-12 mt-3 mb-3">
                {{ $campeonato->sobre }}
            </div>

            <div id="ginasio" class="col-12 mt-3 mb-3">
                {{ $campeonato->ginasio }}
            </div>

            <div id="informacoes" class="col-12 mt-3 mb-3">
                {{ $campeonato->informacoes }}
            </div>
        </div>

        @auth('webatletas')

        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-4 d-grid justify-content-center">

                @if ($campeonato->fase_id == 1)
                    <a href="{{ route('atleta.confirmar', $campeonato->id) }}">
                        <button type="button" class="btn btn-primary">Inscrição</button>
                    </a>                    
                @elseif ($campeonato->fase_id == 2)
                    <a href="{{-- route() --}}">
                        <button type="button" class="btn btn-primary">Veja as chaves</button>
                    </a>                
                @else
                    <a href="{{-- route() --}}">
                        <button type="button" class="btn btn-primary">Resultados</button>
                    </a>                    
                @endif

            </div>
        </div>
            
        @endauth

        @guest('webatletas')

        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-4 d-grid justify-content-center">
                
                @if ($campeonato->fase_id == 1)
                    <a href="{{ route('criar.atleta') }}">
                        <button type="button" class="btn btn-primary" title="Crie sua conta para fazer a inscrição">Criar conta aqui</button>
                    </a>
                @elseif ($campeonato->fase_id == 2)
                    <a href="{{-- --}}">                        
                        <button type="button" class="btn btn-primary">Veja as chaves</button>
                    </a>
                @else
                    <a href="{{-- --}}">
                        <button type="button" class="btn btn-primary">Resultados</button>
                    </a>                   

                @endif
                              
            </div>
        </div>
            
        @endguest
        
    </div>

    @include('layout.footerhome')
    @push('tabs')
    <script src="/js/tabs.js"></script>
    @endpush
@endsection