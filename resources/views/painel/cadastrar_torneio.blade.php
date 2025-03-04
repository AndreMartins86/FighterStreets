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
                    <a href="{{ url()->previous() }}"><button class="btn btn-primary">Voltar</button></a>
                </div>
            </div>

            {{-- <h3>{{ route('painel-torneios.store') }}</h3> --}}

            <div class="alert alert-danger" id="erros">
                <ul id="listaErros"></ul>
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

            <form action="{{ route('painel-torneios.store') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="container-fluid" id="box-container">
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
                        <select class="form-select" name="estado_id">
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
                        <input type="date" name="data" id="data" class="form-control" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 my-1">
                        <label for="tipo" class="form-label">Tipo: </label>
                    </div>
                    <div class="col-9 my-1">
                        <select class="form-select" name="tipo_id"> 
                            @foreach ($tipos as $tipo )                            
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                
                            @endforeach                            
                          </select>
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
                        <button type="submit" class="btn btn-primary" id="submit">Cadastrar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@include('painel.layout.footer')

@push('cropperCDN')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@push('crop')
<script src="/js/crop.js"></script>
@endpush
@endsection
