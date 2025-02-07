@extends('app')
@section('conteudo')
@include('layout.navarea')

<main>

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Veja os seus certificados</h2>
                <p class="text-center">Aqui constam os certificados de todos os torneios que você já participou</p>
                @if (session()->has('msg'))
                
                <div class="alert alert-success">
                  <p>{{ session()->get('msg') }}</p>
                </div>

                @endif
            </div>
        </div>
    </div>
    <p>Olá {{ auth()->user()->nome }}</p>
    
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Leia Mais</th>
                        <th scope="col"> Ver Certificado</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($campeonatos as $campeonato )

                      <tr>
                        <td scope="row">{{ $campeonato->getData() }}</td>
                        <td>{{ $campeonato->titulo }}</td>                        
                        <td>
                          <a href="{{ route('detalhes', ['campeonato' => $campeonato->id, 'slug' => str_replace(' ','-', $campeonato->titulo)]) }}">
                            <button type="button" class="btn btn-primary">Detalhes</button>
                          </a>
                        </td>
                        <td>
                          <a href="{{ route('atleta.certificado', $campeonato->id) }}">
                            <button type="button" class="btn btn-primary">Certificado</button>
                          </a>
                        </td>
                      </tr>

                      @endforeach
                      
                    </tbody>
                  </table>
                  {{-- <p>{{ auth()->user()->nome }}</p> --}}
            </div>
        </div>
        {{ $campeonatos->links() }}
    </div>
</main>
@include('layout.footerarea')
@endsection