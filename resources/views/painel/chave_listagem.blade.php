@extends('app')
@section('conteudo') 
@include('painel.layout.navpainel')

<div class="container-fluid mt-2 mb-2" id="bannerTorneios">
	<div class="row">
		<div class="col-12">
			<h2 class="text-center">{{ $campeonato->titulo }}</h2>
        </div>
    </div>
            <div class="row">
                <div class="col-3">
                    <p class="text-center">#{{ $campeonato->id }}</p>
                </div>
            
                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getTipo() }}</p>
                </div>

                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getLocal() }}</p>
                </div>

                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getdata() }}</p>
                </div>
            </div>	
</div>

<div class="container">
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
            <h2>Chaveamento</h2>
            <h5>Clique para mais detalhes</h5>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
        <h3 style="color: brown">Faixa Marrom</h3>
      </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-6">
            <h3>Peso Leve</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'feminino', 'leve', 'marrom']) }}">Feminino</a></li> 
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'masculino', 'leve', 'marrom']) }}">Masculino</a></li>
                
            </ul>
        </div>
        <div class="col-6">
            <h3>Peso Pesado</h3>
            <ul class="list-group"  >
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'feminino', 'pesado', 'marrom']) }}">Feminino</a></li> 
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'masculino', 'pesado', 'marrom']) }}">Masculino</a></li>
            </ul>
            
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
        <h3>Faixa Preta</h3>
      </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-6">
            <h3>Peso Leve</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'feminino', 'leve', 'preta']) }}">Feminino</a></li> 
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'masculino', 'leve', 'preta']) }}">Masculino</a></li>
            </ul>
        </div>
        <div class="col-6">
            <h3>Peso Pesado</h3>
            <ul class="list-group"  >
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'feminino', 'pesado', 'preta']) }}">Feminino</a></li> 
                <li class="list-group-item"><a href="{{ route('painel-chaves.detalhes', [$campeonato->id, 'masculino', 'pesado', 'preta']) }}">Masculino</a></li>
            </ul>            
        </div>
    </div>
</div>

@include('painel.layout.footer')
@endsection