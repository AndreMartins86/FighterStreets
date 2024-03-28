@extends('app')
@section('conteudo')
@include('layout.navarea')

<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-6">
            <button class="btn btn-primary">< Voltar</button>
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
        <p> Este certificado é concedido a João Veiga, que foi vencedor do Campeonato Regional Santista, realizado
             em Santos-SP, no dia 21/11/2023, na faixa Marrom, no peso Pesado.</p>

             <p>Resultado: 1º Lugar</p>

             <p>Agradecemos pela sua participação!</p>
    </div>

    <br><br>


    <div class="row my-3 mx-3">
        <div class="col-6">
            01/12/2023
        </div>

        <div class="col-6 text-center">
            Assinatura aqui
        </div>
    </div>
</div>

@include('layout.footerarea')
@endsection