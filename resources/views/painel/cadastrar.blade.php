@extends('app')
@section('conteudo')
@include('painel.layout.navpainel')

<div class="container-fluid">
    <div class="row">
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
                    <a href="">Cadastrar</a>
                    <a href="">Listagem</a>
                </div>
            </div>
            <a href="#">Sair</a>
        </div>
        <div class="col-10">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Cadastrar Usuário</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('painel-usuarios.index') }}"><button class="btn btn-primary">< Voltar</button></a>                    
                </div>
            </div>

            <form action="{{ route('painel-usuarios.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="name" class="form-label">Usuário:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="text" name="name" id="name" class="form-control" value="teste">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="email" name="email" id="email" class="form-control" value="teste@email.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="password" class="form-label">Senha:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="password" name="password" id="password" class="form-control" value="teste123">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="password_confirmation" class="form-label">Confirmar senha:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="teste123">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>

            </form>
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
</div>

@include('painel.layout.footer')
@endsection
