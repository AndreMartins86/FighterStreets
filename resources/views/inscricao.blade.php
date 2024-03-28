@extends('app')
@section('conteudo')
@include('layout.navhome')

<div class="container-fluid">
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <h2 class="text-center"> Formulário de inscrição para o torneio</h2>
            </div>
    </div>
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
            <select name="genero" id="genero" class="form-select">
                <option value="fem">Feminino</option>
                <option value="mas">Masculino</option>
            </select>
            </div>

            <div class="mb-3">
            <label for="faixa" class="form-label">Faixa</label>
            <select name="faixa" id="faixa" class="form-select">
                <option value="marrom">Marrom</option>
                <option value="preta">Preta</option>
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
        <input type="date" name="dataNasc" id="dataNasc" class="form-control">
        </div>


        <div class="mb-3">
        <label for="equipe" class="form-label">Equipe</label>
        <input type="text" name="equipe" id="equipe" class="form-control">
        </div>

        <div class="mb-3">
        <label for="peso" class="form-label">Peso</label>
            <select name="peso" id="peso" class="form-select">
                <option value="leve">Leve</option>
                <option value="pesado">Pesado</option>
            </select>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
        </div>


        <div class="mb-3">
        <label for="confPassword" class="form-label">Confirmar Senha</label>
        <input type="password" name="confPassword" id="confPassword" class="form-control">
        </div>

    </div>





    </div>








</div>







@include('layout.footerhome')
@endsection