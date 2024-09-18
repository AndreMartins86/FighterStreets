@extends('app')
@section('conteudo')
@include('layout.navhome')

    <div class="container">
        <div class="row">
            <div class="col-7">                
                <img src="/img/err.png" class="img-fluid" alt="erro">
            </div>
            <div class="col-5">
                <div class="row align-items-center vh-100">
                    <h2>Algo deu errado</h2>
                    <a href="{{ route('index') }}"><p>Voltar</p></a>
                </div>
            </div>
        </div>
    </div>

@include('layout.footerhome')   
@endsection