@extends('app')
@section('conteudo')
@include('painel.layout.navpainel')

<div class="container-fluid mt-2 mb-2" id="bannerTorneios">
	<div class="row">
		<div class="col-12">
			<h2 class="text-center">Torneios</h2>
        </div>
    </div>
            <div class="row">
                <div class="col-3">
                    <p class="text-center"># {{ $campeonato->id }}</p>
                </div>
            
                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getTipo() }}</p>
                </div>

                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getLocal() }}</p>
                </div>

                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getData() }}</p>
                </div>
            </div>	
</div>

<div class="container">
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
            <h2>Classificação</h2>              
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
        <h3 style="color: brown">Faixa Marrom</h3>
      </div>
      <div class="col-12 text-center">
        <h3>Peso leve</h3>
      </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">
                {{-- @foreach ($resultados as $res) --}}

                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[0]->primeiroColocado }}<span style="display: block">{{ $resultados[0]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[0]->segundoColocado }}<span style="display: block">{{ $resultados[0]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[0]->terceiroColocado }}<span style="display: block">{{ $resultados[0]->equipeTerceiroColocado --}}</span></li>

                {{-- @endforeach --}}
               
            </ul>
        </div>
        <div class="col-6">
            
            <h5>Masculino</h5>
            <ul class="list-group">
                {{-- @foreach ($resultados as $res) --}}

                {{-- @if ($resultados->sexo_id == 1 && $resultados->peso_id == 1 && $resultados->faixa_id == 1) --}}
                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[1]->primeiroColocado }}<span style="display: block">{{ $resultados[1]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[1]->segundoColocado }}<span style="display: block">{{ $resultados[1]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[1]->terceiroColocado }}<span style="display: block">{{ $resultados[1]->equipeTerceiroColocado --}}</span></li>

                {{-- @endforeach --}}
            </ul>            
        </div>
    </div>
    <div class="col-12 text-center">
        <h3>Peso Pesado</h3>
      </div>    
    <div class="row mb-3 mt-3">
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">

                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[2]->primeiroColocado }}<span style="display: block">{{ $resultados[2]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[2]->segundoColocado }}<span style="display: block">{{ $resultados[2]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[2]->terceiroColocado }}<span style="display: block">{{ $resultados[2]->equipeTerceiroColocado --}}</span></li>
                
            </ul>
            
        </div>
        <div class="col-6">            
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[3]->primeiroColocado }}<span style="display: block">{{ $resultados[3]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[3]->segundoColocado }}<span style="display: block">{{ $resultados[3]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[3]->terceiroColocado }}<span style="display: block">{{ $resultados[3]->equipeTerceiroColocado --}}</span></li>
                
            </ul>
        </div>
    </div>
    {{-- ----------------------------------------------------------------------------------------------------------------- --}}
    <hr>
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
        <h3>Faixa Preta</h3>
      </div>
      <div class="col-12 text-center">
        <h3>Peso leve</h3>
      </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[4]->primeiroColocado }}<span style="display: block">{{ $resultados[4]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[4]->segundoColocado }}<span style="display: block">{{ $resultados[4]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[4]->terceiroColocado }}<span style="display: block">{{ $resultados[4]->equipeTerceiroColocado --}}</span></li>
                
            </ul>
        </div>
        <div class="col-6">            
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[5]->primeiroColocado }}<span style="display: block">{{ $resultados[5]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[5]->segundoColocado }}<span style="display: block">{{ $resultados[5]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[5]->terceiroColocado }}<span style="display: block">{{ $resultados[5]->equipeTerceiroColocado --}}</span></li>
                
            </ul>            
        </div>
    </div>
    <div class="col-12 text-center">
        <h3>Peso Pesado</h3>
      </div>    
    <div class="row mb-3 mt-3">
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[6]->primeiroColocado }}<span style="display: block">{{ $resultados[6]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[6]->segundoColocado }}<span style="display: block">{{ $resultados[6]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[6]->terceiroColocado }}<span style="display: block">{{ $resultados[6]->equipeTerceiroColocado --}}</span></li>
             
            </ul>
        </div>
        <div class="col-6">            
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>{{ $resultados[7]->primeiroColocado }}<span style="display: block">{{ $resultados[7]->equipePrimeiroColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>{{ $resultados[7]->segundoColocado }}<span style="display: block">{{ $resultados[7]->equipeSegundoColocado --}}</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>{{ $resultados[7]->terceiroColocado }}<span style="display: block">{{ $resultados[7]->equipeTerceiroColocado --}}</span></li>               
               
            </ul>            
        </div>
    </div>
</div>

@include('painel.layout.footer')
@endsection