@extends('app')
@section('conteudo')

<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-6">
            
        </div>
        <div class="col-6 text-end">
            
        </div>
    </div>
</div>

<div class="container-fluid mt-3 mb-3 border border-primary p-5"
style='border: 1px black solid; padding-bottom: 200px; padding-top: 1px;'>
    <div class="row">
        <div class="col-12">
            <img src="img/sf.png" alt="logo" class="d-inline-block aligh-text-top" width="35px">
            <h3 class="text-center mb-3">Fighter Streets</h3>
        </div>
    </div>

    <div class="row my-3 mx-3">
        <p> Este certificado é concedido a {{ $atleta->nome }}, como vencedor do {{ $campeonato->titulo }}, realizado
             em {{ $campeonato->getLocal() }}, no dia {{ $campeonato->getData() }}, na {{ $atleta->getFaixa() }},
              no peso {{ $atleta->getPeso() }}.</p>

             <p>Resultado: {{ $res }}</p>

             <p>Agradecemos pela sua participação!</p>
    </div>

    <br><br>


    <div class="row my-3 mx-3">
        <div class="col-6">
            {{ date('d/m/Y') }}
        </div>

        <div class="col-6 text-center">
            Assinatura aqui
        </div>
    </div>
</div>

@endsection