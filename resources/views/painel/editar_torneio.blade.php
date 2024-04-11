@extends('app')
@section('conteudo')
@push('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
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
                    <a href="">Cadastrar</a>
                    <a href="">Listagem</a>
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
            <div class="row">
                <div class="col-6">
                    <h3>Editar Usuário</h3>
                </div>

                <div class="col-6 text-end">
                    <a href="{{ url()->previous() }}"><button class="btn btn-primary">Voltar</button></a>
                </div>
            </div>
            <h3>{{ route('painel-torneios.update', ['painel_torneio' => $camp->id]) }}</h3>
            <h3>{{ route('painel-torneios.show', ":id") }}</h3>
            <div class="alert alert-danger" id="erros">
                <ul id="listaErros"></ul>
            </div>

            <div class="row">
                <form action="{{ route('painel-torneios.update', ['painel_torneio' => $camp->id]) }}" method="POST" enctype="multipart/form-data" id="form">
                    @method('PUT')                    
                    @csrf
                                        
                    <div class="container-fluid" id="box-container">
                        <input type="text" name="id" id="id" value="{{ $camp->id }}" hidden>
                        <div class="row">
                            <div class="col-12" id="botoes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="preview-crop"></div>                            
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="avatar-imagem" class="form-label">Banner Torneio</label>                        
                            <input class="form-control" type="file" id="avatar-imagem" name="imagem">
                        </div>                  
                    </div>
                    <div class="row">
                        <div class="col-3 my-1">
                            <label for="titulo" class="form-label">Titulo:</label>
                        </div>
                        <div class="col-9 my-1">
                            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $camp->titulo }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 my-1">
                            <label for="cidade" class="form-label">Cidade:</label>
                        </div>
                        <div class="col-9 my-1">
                            <input type="text" name="cidade" id="cidade" class="form-control" value="{{ $camp->cidade }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 my-1">
                            <label for="estado" class="form-label">Estado:</label>
                        </div>
                        <div class="col-9 my-1">
                            <select class="form-select" name="estado_id" id="estado_id">                                
                                @foreach ($estados as $UF )
                                @if ($UF->sigla == $camp->getEstado())
                                <option selected value="{{ $UF->id }}">{{ $UF->nome }}</option>                                    
                                @else
                                <option value="{{ $UF->id }}">{{ $UF->nome }}</option>
                                    
                                @endif                                    
                                @endforeach                            
                              </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 my-1">
                            <label for="data" class="form-label">Data do evento:</label>
                        </div>
                        <div class="col-9 my-1">
                            <input type="date" name="data" id="data" class="form-control" value="{{ $camp->data }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 my-1">
                            <label for="tipo" class="form-label">Tipo: </label>
                        </div>
                        <div class="col-9 my-1">
                            <select class="form-select" name="tipo_id" id="tipo_id">

                                @foreach ($tipos as $tipo )
                                @if ($tipo->tipo == $camp->getTipo())
                                <option selected value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                @else
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                    
                                @endif
                                @endforeach                            
                              </select>
                        </div>
                    </div>                  
                    <div class="row">
                        <div class="col-3 my-1">
                            <label for="ginasio" class="form-label">Ginásio: </label>
                        </div>
                        <div class="col-9 my-1">
                            <input type="text" name="ginasio" id="ginasio" class="form-control" value="{{ $camp->ginasio }}">
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="form-floating my-1">
                            <textarea class="form-control" placeholder="Sobre" name="sobre" id="sobre">{{ $camp->sobre }}</textarea>
                            <label for="sobre">Sobre </label>
                          </div>
                    </div>
                    <div class="row">                    
                        <div class="form-floating my-1">
                            <textarea class="form-control" placeholder="Informações" name="informacoes" id="informacoes">{{ $camp->informacoes }}</textarea>
                            <label for="informacoes">Informações </label>
                          </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" id="submit">Editar</button>
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

@include('painel.layout.footer')

@push('crop')
<script src="/js/crop.js"></script>        
@endpush

@endsection