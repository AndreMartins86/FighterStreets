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
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Mateus Marinho<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Vinicius Medeiros<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>João Veiga<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>
        </div>
        <div class="col-6">
            
            <h5>Feminino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Joyce Ribeiro<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Victoria Daolio<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>Luize Gama<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>            
        </div>
    </div>
    <div class="col-12 text-center">
        <h3>Peso Pesado</h3>
      </div>    
    <div class="row mb-3 mt-3">
        <div class="col-6">            
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Mateus Marinho<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Vinicius Medeiros<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>João Veiga<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>
        </div>
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Joyce Ribeiro<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Victoria Daolio<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>Luize Gama<span style="display: block">Equipe Cobra Kai</span></li>
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
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Mateus Marinho<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Vinicius Medeiros<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>João Veiga<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>
        </div>
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Joyce Ribeiro<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Victoria Daolio<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>Luize Gama<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>            
        </div>
    </div>
    <div class="col-12 text-center">
        <h3>Peso Pesado</h3>
      </div>    
    <div class="row mb-3 mt-3">
        <div class="col-6">            
            <h5>Masculino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Mateus Marinho<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Vinicius Medeiros<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>João Veiga<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>
        </div>
        <div class="col-6">            
            <h5>Feminino</h5>
            <ul class="list-group">
                <li class="list-group-item"><span class="badge bg-primary">1</span>Joyce Ribeiro<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">2</span>Victoria Daolio<span style="display: block">Equipe Cobra Kai</span></li>
                <li class="list-group-item"><span class="badge bg-primary">3</span>Luize Gama<span style="display: block">Equipe Cobra Kai</span></li>
            </ul>            
        </div>
    </div>
</div>

@include('layout.footerhome')
@endsection