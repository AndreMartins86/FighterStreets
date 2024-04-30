@extends('app')
@section('conteudo')
    @push('meta')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endpush
    @include('painel.layout.navpainel')

    <div class="container-fluid">
        <div class="row">
            @include('painel.layout.sidebar')
            <div class="col-10">
                <div class="row mb-3">
                    <div class="col-4">
                        <h3>Campeonatos</h3>
                    </div>
                    <div class="col-8">
                        <button class="btn btn-primary" title="Exportar PDF"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf"
                                viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z" />
                            </svg></button>
                        <button class="btn btn-primary" title="Exportar Excel"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet"
                                viewBox="0 0 16 16">
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z" />
                            </svg></button>
                        <a href="{{ route('painel-torneios.create') }}"><button class="btn btn-primary"
                                title="Cadastrar usuário">+
                                Cadastrar campeonato</button></a>

                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('filtrarTorneio') }}" method="GET">
                                {{-- @csrf --}}
                                <div class="row align-items-end">
                                    <div class="col-4">
                                        <label for="name" class="form-label">Buscar:</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>

                                    <div class="col-2">
                                        <label for="status" class="form-label">Status:</label>
                                        <select name="status" id="status" class="form-select">
                                            <option value="1">Ativo</option>
                                            <option value="0">Desativado</option>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <label for="de" class="form-label">De:</label>
                                        <input type="date" name="de" id="de" class="form-control">
                                    </div>

                                    <div class="col-2">
                                        <label for="ate" class="form-label">Até:</label>
                                        <input type="date" name="ate" id="ate" class="form-control">
                                    </div>

                                    <div class="col-md-2 col-sm-12">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary flex-fill">Filtrar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                @if (session()->has('msg'))
                    <div class="alert alert-success">
                        <p>{{ session()->get('msg') }}</p>
                    </div>
                @endif

                <div class="container-fluid">
                    <div class="row my-2">
                        <div class="col-12">
                            <div class="accordion" id="accordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Destaques
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            <h5 id="res" style="display: none"></h5>
                                                <button class="btn btn-outline-danger" onclick="resetarDestaques()"
                                                    title="Resetar destaques"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-x-octagon" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z" />
                                                        <path
                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                                    </svg></button><br>
                                                    <table class="table table-striped" id="tabela" ondrop="dropDestaque(event)"
                                                    ondragover="permitirDrop(event)">
                                                    <tbody id="tabelaDrop">
                                                        @if ($destaques == false)
                                                            <tr id="titulo">
                                                                <th>Arraste aqui para adicionar destaques</th>
                                                            </tr>
                                                        @else
                                                            <tr id="titulo">
                                                                <th>Arraste aqui para adicionar destaques</th>
                                                            </tr>
                                                            @foreach ($destaques as $destaque)
                                                                <tr id="{{ $destaque->id }}" ondragstart="inicioArrastaDestaque(event)"
                                                                    ondragend="fimArrasta(event)" ondrop="ordenarDestaque(event)"
                                                                    ondragover="permitirDrop(event)" draggable="true">
                                                                    <td>{{ $destaque->titulo }}</td>
                                                                    <td>{{ $destaque->data }}</td>
                                                                    <td>{{ $destaque->cidade }} - {{ $destaque->sigla }}</td>
                                                                    <td>
                                                                        <button type="button" title="Apagar destaque" class="btn btn-danger"
                                                                            onclick="apagarDestaque(this)"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="16" height="16" fill="currentColor" class="bi bi-trash3"
                                                                                viewBox="0 0 16 16">
                                                                                <path
                                                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                                            </svg>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Campeonato</th>
                                    <th>Data</th>
                                    <th>Local</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaDrag">

                                @foreach ($campeonatos as $campeonato)
                                    <tr ondragstart="inicioArrastaTabela(event)" ondragend="fimArrasta(event)"
                                        draggable="true" id="{{ $campeonato->id }}">
                                        <td>{{ $campeonato->titulo }}</td>
                                        <td>{{ $campeonato->getData() }}</td>
                                        <td>{{ $campeonato->getLocal() }}</td>
                                        <td>
                                            <a
                                                href="{{ route('painel-torneios.show', ['painel_torneio' => $campeonato->id]) }}"><button
                                                    title="Detalhes" class="btn btn-primary"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                                    </svg></button></a>

                                            <a
                                                href="{{ route('painel-torneios.edit', ['painel_torneio' => $campeonato->id]) }}"><button
                                                    title="Editar torneio" class="btn btn-warning"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                    </svg></button></a>

                                            <form
                                                action="{{ route('painel-torneios.destroy', ['painel_torneio' => $campeonato->id]) }}"
                                                method="POST" style="display: inline; margin: 0; padding: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Apagar torneio" class="btn btn-danger"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                                    </svg></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $campeonatos->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('painel.layout.footer')
    @push('drag')
        <script src="js/drag.js"></script>
    @endpush
@endsection
