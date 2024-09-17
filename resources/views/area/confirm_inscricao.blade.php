@extends('app')
@section('conteudo')

@include('layout.navhome')

<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col-12">
			<h2 class="text-center">Confirmar Inscrição</h2>

			<br>
			<h3>{{ $campeonato->titulo}}</h3>
			<br>
			<h4>{{ $campeonato->getData()}}</h4>
			<h4>{{ $campeonato->getLocal() }}</h4>
			{{-- <p>{{ $campeonato->titulo}}</p>
			<p>{{ $campeonato->titulo}}</p> --}}

		</div>
	</div>

	<div class="row justify-content-center mt-3 mb-3">
		<div class="col-4 d-grid justify-content-center">

			@if ($inscrito)
			<h4>Você já está inscrito</h4>
			<br>
			<div class="col-4 d-grid justify-content-center">				
				<a href="{{ url()->previous() }}">					
					<button type="button" class="btn btn-danger">Voltar</button>
				</a>                
			</div>
				
			@else
			<a href="{{ route('atleta.confirmado', $campeonato->id) }}">
				<button type="button" class="btn btn-primary">Confirmar</button>
			</a>                
		</div>
		<div class="col-4 d-grid justify-content-center">
			<a href="{{ url()->previous() }}">
				<button type="button" class="btn btn-danger">Cancelar</button>
			</a>                
		</div>
				
			@endif

	</div>
		</div>
	</div>
</div>







@include('layout.footerhome')
@endsection