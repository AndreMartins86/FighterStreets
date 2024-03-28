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
                <li class="list-group-item">Masculino</li>
                <li class="list-group-item">Feminino</li>
            </ul>
        </div>
        <div class="col-6">
            <h3>Peso Pesado</h3>
            <ul class="list-group"  >
                <li class="list-group-item">Masculino</li>
                <li class="list-group-item">Feminino</li>
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
                <li class="list-group-item">Masculino</li>
                <li class="list-group-item">Feminino</li>
            </ul>
        </div>
        <div class="col-6">
            <h3>Peso Pesado</h3>
            <ul class="list-group"  >
                <li class="list-group-item">Masculino</li>
                <li class="list-group-item">Feminino</li>
            </ul>            
        </div>
    </div>
</div>


@include('layout.footerhome')
@endsection
