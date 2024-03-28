<div class="col-2">
    <div class="my-1">
        <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseUsuarios" role="button">
            Usuários
        </a>
    </div>
    <br>
    <div class="collapse" id="collapseUsuarios">
        <div class="card card-body">
            <a href="{{ route('painel-usuarios.create') }}">Cadastrar</a>
            <a href="{{ route('painel-usuarios.index') }}">Listagem</a>
        </div>
    </div>
    <div class="mb-1">
        <a class="btn btn-dark" data-bs-toggle="collapse" href="#collapseTorneios" role="button">
            Torneios
        </a>
    </div>

    <br>
    <div class="collapse" id="collapseTorneios">
        <div class="card card-body">
            <a href="{{ route('painel-torneios.create') }}">Cadastrar</a>
            <a href="{{ route('painel-torneios.index') }}">Listagem</a>
        </div>
    </div>
    <a href="#">Sair</a>
</div>