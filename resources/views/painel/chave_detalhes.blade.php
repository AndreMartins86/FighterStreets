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
                    <p class="text-center">{{ $campeonato->getData() }}</p>
                </div>
            </div>	
</div>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Chaves</h2>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
            <p><span class="badge text-bg-dark"> Faixa {{ $chaves[0]->getFaixa() }} </span>
                <span class="badge text-bg-dark"> Peso {{ $chaves[0]->getPeso() }} </span>
                <span class="badge text-bg-dark">{{ $chaves[0]->getSexo() }} </span></p>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 mb-3">
    <div class="row align-items-center">

        @while ($fases > 0)
        <div class="col-3">

            @for ($i=0;$i<8;$i++)
            <p class="disputa mt-3">Luta: {{ $chaves[$i]->numeroLuta }}</p>
            <ul class="list-group">
                <li class="list-group-item">{{ $chaves[$i]->nomeLutador1 }}<span>{{ $chaves[$i]->equipeLutador1 }}</span></li>
                <li class="list-group-item">{{ $chaves[$i]->nomeLutador2 }}<span>{{ $chaves[$i]->equipeLutador2 }}</span></li>
            </ul>
                
            @endfor

            @php
            $fases--;                
            @endphp
        
        </div>
            
        @endwhile

    </div>
</div>

@include('layout.footerhome')
@endsection