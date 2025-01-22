@extends('app')
@section('conteudo')
@include('painel.layout.navpainel')

<div class="container-fluid mt-2 mb-2" id="bannerTorneios">
	<div class="row">
		<div class="col-12">
			<h2 class="text-center">{{ $campeonato->titulo }}</h2>
        </div>
    </div>
            <div class="row">
                <div class="col-3">
                    <p class="text-center">#{{ $campeonato->id }}</p>
                </div>
            
                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getTipo() }}</p>
                </div>

                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getLocal() }}</p>
                </div>

                <div class="col-3">
                    <p class="text-center">{{ $campeonato->getData() }}</p>
                </div>
            </div>	
</div>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Chaves</h2>
        </div>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-12 text-center">
            <p><span class="badge text-bg-dark"> Faixa {{ $chaves[0]->getFaixa() }} </span>
                <span class="badge text-bg-dark"> Peso {{ $chaves[0]->getPeso() }} </span>
                <span class="badge text-bg-dark">{{ $chaves[0]->getSexo() }} </span></p>
        </div>
    </div>
</div>

<div class="container-fluid mt-3 mb-3">
    <form action="{{ route('painel-salvarChaves') }}" method="POST">
        @csrf
        <input type="hidden" name="cID" value="{{ $campeonato->id }}">
        <input type="hidden" name="sID" value="{{ $chaves[0]->sexo_id }}">
        <input type="hidden" name="pID" value="{{ $chaves[0]->peso_id }}">
        <input type="hidden" name="fID" value="{{ $chaves[0]->faixa_id }}">
        
        
    <div class="row align-items-center">
        
        @php
            $cont = 0;                 
            $aux = 0;     
            $j = -1;
            $fases = count($contadorChaves);
            $totalLutas = count($chaves);
            
        @endphp

        @while ($fases > 0)
        <div class="col-3">

            @for ($i=0;$i<$contadorChaves[$cont];$i++)
            @php
                $j++;
            @endphp

            @if (($totalLutas - 2) == $j)
            <p class="disputa mt-3">Luta: Final</p>
            @elseif(($totalLutas - 1) == $j)
            <p class="disputa mt-3">Luta: 3º lugar</p>
            @else
            <p class="disputa mt-3">Luta: {{ $chaves[$j]->numeroLuta }}</p>
            @endif
            <ul class="list-group">
                <li class="list-group-item">{{ $chaves[$j]->nomeLutador1 }}<span>{{ $chaves[$j]->equipeLutador1 }}</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$chaves[$j]->numeroLuta}}" value="{{ $chaves[$j]->lutador_1 }}" style=" border-color: black;"
                        @php
                            $check = ($chaves[$j]->lutador_1 == $chaves[$j]->vencedor && $chaves[$j]->lutador_1 != NULL ) ? 'checked' : '';
                            echo $check;
                        @endphp                        
                        >
                    </div>
                </li>
                
                <li class="list-group-item">{{ $chaves[$j]->nomeLutador2 }}<span>{{ $chaves[$j]->equipeLutador2 }}</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$chaves[$j]->numeroLuta}}" value="{{ $chaves[$j]->lutador_2 }}" style=" border-color: black;"
                        @php
                            $check = ($chaves[$j]->lutador_2 == $chaves[$j]->vencedor && $chaves[$j]->lutador_2 != NULL) ? 'checked' : '';
                            echo $check;
                        @endphp   
                        >
                    </div>
                </li>
            </ul>

            @php
            $aux++;
             if ($aux == $contadorChaves[$cont]) {
                $cont++;
                $aux = 0;
                break;
             }              
            @endphp           
                
            @endfor

            @php
            $fases--;
            @endphp
        
        </div>

        @endwhile
        
    </div>
    <button type="submit" class="btn btn-primary my-3">Salvar</button>
</form>
</div>

@if ($btn)
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12 text-center">
            <a id="encLink" class="disabled" href="{{ route('painel-finalizarTorneio', [$campeonato->id, $chaves[0]->sexo_id, $chaves[0]->peso_id, $chaves[0]->faixa_id]) }}" disabled><button type="submit" class="btn btn-primary my-3" id="encBtn" disabled>Encerrar Torneio</button></a>            
        </div>
    </div>
</div>    
@endif

@push('encT')
<script src="/js/encT.js"></script>
@endpush
@include('layout.footerhome')
@endsection