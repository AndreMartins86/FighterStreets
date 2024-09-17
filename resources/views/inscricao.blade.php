@extends('app')
@section('conteudo')
    @include('layout.navhome')

    <div class="container-fluid">
        <div class="row mt-3 mb-3">
            <div class="col-12">
                <h2 class="text-center"> Formulário de inscrição para o torneio</h2>
            </div>
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

        <form method="POST" action="{{ route('atleta.cadastrado') }}">
            @csrf
            <div class="row">
                <div class="col-6">                    
                    <div class="mb-3 mt-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Genero</label>
                        <select name="sexo_id" id="genero" class="form-select">
                            <option value="1">Feminino</option>
                            <option value="2">Masculino</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="faixa" class="form-label">Faixa</label>
                        <select name="faixa_id" id="faixa" class="form-select">
                            <option value="1">Marrom</option>
                            <option value="2">Preta</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

            </div>

            <div class="col-6">

                <div class="mb-3 mt-3">
                    <label for="dataNasc" class="form-label">Data de Nascimento</label>
                    <input type="date" name="dataNascimento" id="dataNasc" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="equipe" class="form-label">Equipe</label>
                    <input type="text" name="equipe" id="equipe" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="peso" class="form-label">Peso</label>
                    <select name="peso_id" id="peso" class="form-select">
                        <option value="1">Leve</option>
                        <option value="2">Pesado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

            </div>

            <div class="row justify-content-center mt-3 mb-3">
                <div class="col-4 d-grid justify-content-center">
                    <a href="{{-- --}}">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </a>                
                </div>
            </div>

            </form>

        </div>
    </div>


@include('layout.footerhome')
@push('mask')
<script src="/js/mask.js"></script>
@endpush
@endsection
