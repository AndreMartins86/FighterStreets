@extends('app')
@section('conteudo')
@include('layout.navarea')

<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-6">
            <a href="{{ url()->previous() }}"><button class="btn btn-primary">< Voltar</button></a>            
        </div>
        <div class="col-6 text-end">
            <button class="btn btn-primary">Exportar para PDF</button>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 mb-3 border border-primary p-5">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mb-3">Fighter Streets</h3>
        </div>
    </div>

    <div class="row my-3 mx-3">
        <p>Este certificado é concedido a {{ $atleta->nome }}, que participou do {{ $campeonato->titulo }}, realizado
             em {{ $campeonato->getLocal() }}, no dia {{ $campeonato->getData() }},
              na faixa {{ $atleta->getFaixa() }}, no peso {{ $atleta->getPeso() }}.</p>

            <p>Agradecemos pela sua participação!</p>        
    </div>

    <br><br>


    <div class="row my-3 mx-3">
        <div class="col-6">
            {{ $campeonato->getData() }}
        </div>

        <div class="col-6 text-center">
            Assinatura aqui
        </div>
    </div>
</div>

@include('layout.footerarea')
@endsection