@extends('app')
@section('conteudo')

@include('layout.navhome')

	<main style="min-height: 65vh;">

		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-5">
					<div class="mb-3">
				<form action="{{ route('a.logar') }}" method="POST">
					@csrf
  						<label for="email" class="form-label">Email</label>
  						<input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="hudson43@example.org">
					</div>
					<div class="mb-3">
  						<label for="senha" class="form-label">Senha</label>
  						<input type="password" class="form-control" name="password" id="senha" value="1234">
					</div>
					<div class="form-text">
						<p><a href="" title="Lembrar sua senha">Esqueceu sua senha?</a></p>
					</div>

					<div class="col-12">
						<button type="submit" class="btn btn-primary">Entrar</button>
					</div>
				</form>
				<div class="form-text mt-3">
					<p><a href="{{ route('criar.atleta')}}" title="Criar Conta">Clique aqui para criar sua conta</a></p>
				</div>
				@if ($errors->any())
    				<div class="alert alert-danger">
        				<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
        				</ul>
    				</div>
				@endif
									
				</div>
			</div>
		</div>		
	</main>


@include('layout.footerhome')
@endsection