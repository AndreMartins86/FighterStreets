@extends('app')

@section('conteudo')
@include('layout.navhome')

	<div class="container-fluid">
		<div class="row">
			<div id='banner' class="col-12">
				<h1 class="text-center">Nós vamos ao encontro dos mais fortes!</h1>
			</div>
		</div>
	</div>

	<div class="container-fluid mt-2 mb-3">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Destaques</h2>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">			
			@foreach ($destaques as $destaque )		
			<div class="col-3">
				<div class="card" style="width: 19rem;">	
					<img src="{{ $destaque->imagem }}" class="card-img-top" alt="capa campeonato">
						<div class="card-body">
						  <h5 class="card-title">{{ $destaque->titulo }}</h5>
						  <h4 class="card-title"><span class="badge bg-warning text-dark">{{ $destaque->fase }}</span></h4>
						  <h4 class="card-title">{{ $destaque->data }}</h4>
						  <p class="card-text text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
							<path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
							<path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
						  </svg> {{ $destaque->tipo }}</p>
						  <p class="card-text text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
							<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
						  </svg> {{ $destaque->cidade }} - {{ $destaque->sigla }}</p>
						  <a href="{{ route('detalhes',['campeonato' => $destaque->id, 'slug' => str_replace(' ','-', $destaque->titulo)]) }}" class="btn btn-primary">Mais informações</a>
						</div>
			  </div>											
			</div>
			@endforeach		
		</div>		
	</div>

	<div class="container-fluid mt-2 mb-3">
		<div class="row">
			<div class="col-12">
				<h2 class="text-center">Próximos torneios</h2>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">			
			@foreach ($campeonatos as $camp )
			<div class="col-3">
				<div class="card" style="width: 19rem;">	
					<img src="{{ $camp->imagem }}" class="card-img-top" alt="capa campeonato">
						<div class="card-body">
						  <h5 class="card-title">{{ $camp->titulo }}</h5>
						  <h4 class="card-title"><span class="badge bg-warning text-dark">{{ $camp->getFase() }}</span></h4>
						  <h4 class="card-title">{{ $camp->getData() }}</h4>
						  <p class="card-text text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
							<path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
							<path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
						  </svg> {{ $camp->getTipo() }}</p>
						  <p class="card-text text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
							<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
						  </svg> {{ $camp->getLocal() }}</p>
						  <a href="{{ route('detalhes',['campeonato' => $camp, 'slug' => $camp->friendUrl()]) }}" class="btn btn-primary">Mais informações</a>
						</div>
			  </div>											
			</div>
			@endforeach		
		</div>		
	</div>	

@include('layout.footerhome')
@endsection