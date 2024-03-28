@extends('app')
@section('conteudo')
@include('painel.layout.navpainel')

<div class="container-fluid">
    <div class="row">
        @include('painel.layout.sidebar')
        <div class="col-10">
            <div class="row mb-3">
                <div class="col-6">
                    <h3>Cadastrar Campeonato</h3>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('painel-torneios.index') }}"><button class="btn btn-primary">< Voltar</button></a>                    
                </div>
            </div>

            <form action="{{ route('painel-torneios.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="titulo" class="form-label">Titulo:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="text" name="titulo" id="titulo" class="form-control" value="teste">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="cidade" class="form-label">Cidade:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="text" name="cidade" id="cidade" class="form-control" value="São Paulo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="estado" class="form-label">Estado:</label>
                    </div>
                    <div class="col-9 my-1">
                        <select class="form-select">
                            <option selected>UF</option>
                            @foreach ($estados as $UF )                            
                            <option value="{{ $UF->id }}">{{ $UF->nome }}</option>
                                
                            @endforeach                            
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="data" class="form-label">Data do evento:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="date" name="data" id="data" class="form-control" value="24/03/2024">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="tipo" class="form-label">Tipo: </label>
                    </div>
                    <div class="col-9 my-1">
                        <select class="form-select">                            
                            @foreach ($tipos as $tipo )                            
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                
                            @endforeach                            
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="data" class="form-label">Data do evento:</label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="date" name="data" id="data" class="form-control" value="24/03/2024">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="ginasio" class="form-label">Ginásio: </label>
                    </div>
                    <div class="col-9 my-1">
                        <input type="text" name="ginasio" id="ginasio" class="form-control" value="Rebouças">
                    </div>
                </div>
                <div class="row">                    
                    <div class="form-floating my-1">
                        <textarea class="form-control" placeholder="Sobre" name="sobre" id="sobre"></textarea>
                        <label for="sobre">Sobre </label>
                      </div>
                </div>
                <div class="row">                    
                    <div class="form-floating my-1">
                        <textarea class="form-control" placeholder="Informações" name="informacoes" id="informacoes"></textarea>
                        <label for="informacoes">Informações </label>
                      </div>
                </div>
                <div class="row my-1">
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
