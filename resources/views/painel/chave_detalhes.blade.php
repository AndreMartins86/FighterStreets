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
            <p><span class="badge text-bg-dark"> Faixa Preta </span><span> Peso Leve </span>
                <span> Masculino </span></p>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 mb-3">
    <div class="row align-items-center">
        <div class="col-3">
            <p class="disputa mt-3">Disputa 1</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 2</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 3</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 4</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 5</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 6</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>
            
        </div>

        <div class="col-3">
            <p class="disputa mt-3">Disputa 7</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 8</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 9</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>
            
        </div>

        <div class="col-3">
            <p class="disputa mt-3">Disputa 10</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 11</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>
            
        </div>

        <div class="col-3">
            <p class="disputa mt-3">Disputa 12 - Final</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>

            <p class="disputa mt-3">Disputa 13 - 3 lugar</p>
            <ul class="list-group">
                <li class="list-group-item">João Silva<span>Equipe Cobra Kai</span></li>
                <li class="list-group-item">Pedro Santos<span>Equipe Musashi</span></li>
            </ul>
            
        </div>

    </div>
</div>

@include('layout.footerhome')
@endsection