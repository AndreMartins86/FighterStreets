{{-- refatorar com o layout depois --}}
<nav>
		<div class="container-fluid">
			<div class="row">
				<div class="col-6">
					<img id='logo' src="/img/sf.png" alt="logo">
					<h3 id='titulo' class="align-middle">Fighter Streets</h3>
				</div>

				<div class="col-6">
					<ul class="nav justify-content-end">
  						<li class="nav-item">
    						<a class="nav-link" aria-current="page" href="{{ route('index') }}">Inicio</a>
  						</li>
  						<li class="nav-item">
    						<a class="nav-link" href="{{ route('torneios') }}">Torneios</a>
  						</li>
  						<li class="nav-item">
    						<button type="button" class="btn btn-outline-primary btn-sm"><a class="nav-link" href="{{ route('atleta.area') }}">Area Lutador</a></button>	
  						</li>  
					</ul>
				</div>
			</div>
	</div>	
	</nav>