@extends('app')
@section('conteudo')
@include('layout.navhome')

<div class="container-fluid mt-2 mb-2" id="bannerTorneios">
	<div class="row">
		<div class="col-12">
			<h2 class="text-center">Torneios</h2>
        </div>
    </div>
            <div class="row">
                <div class="col-3">
                    <p class="text-center">#12345</p>
                </div>
            
                <div class="col-3">
                    <p class="text-center">tipo</p>
                </div>

                <div class="col-3">
                    <p class="text-center">Santos-SP</p>
                </div>

                <div class="col-3">
                    <p class="text-center">21/11/2023</p>
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