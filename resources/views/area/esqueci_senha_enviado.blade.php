@extends('app')
@section('conteudo')
@include('layout.navarea')

    <div class="container">
        <div class="row justify-content-center my-5 py-5">
            <div class="col-auto mb-5">
                <h3>Email enviado com sucesso</h3>
                <p>Um email com as instruções de recuperação foram enviados para o endereço
                 lawrancejohny@cobrakai.com</p>
            </div>
        </div>
    </div>


@include('layout.footerarea')
@endsection