@extends('app')
@section('conteudo')
@include('layout.navarea')

<main>

    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col">
                <h2 class="text-center">Veja os seus certificados</h2>
                <p class="text-center">Aqui constam os certificados de todos os torneios que você já participou</p>
            </div>
        </div>
    </div>
    
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
                      <tr>
                        <th scope="row">23/11/2023</th>
                        <td>Campeonato Regional Santista</td>
                        <td><button type="button" class="btn btn-primary">Detalhes</button></td>
                        <td><button type="button" class="btn btn-primary">Certificado</button></td>
                      </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</main>

@include('layout.footerarea')
@endsection