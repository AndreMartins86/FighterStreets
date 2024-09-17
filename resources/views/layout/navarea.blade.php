{{-- refatorar com o layout depois --}}
<nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <img id='logo' src="/img/sf.png" alt="logo">
                <h3 id='titulo' class="align-middle">Fighter Streets <span><small>Área do Atleta</small></span></h3>                
            </div>
            <div class="col-5">
                <ul class="nav justify-content-end">                     
                      <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary btn-sm"><a class="nav-link" href="{{ route('index') }}">Home</a></button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="btn btn-outline-primary btn-sm"><a class="nav-link" href="{{ route('a.logout') }}">Sair</a></button>	
                      </li>
                </ul>
            </div>           
        </div>
</div>	
</nav>