@extends('app')
@section('conteudo')
@include('painel.layout.navpainel')

<div class="container">
    <div class="row">
        <div class="col-12">
            <p>ID: {{ $user->id }}</p>
            <p>Nome: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Cargo: {{ $user->role }}</p>
            <p>Data de criação: {{ $user->created_at }}</p>
            @if ($user->status == 1 )
            <p>Status: Ativo</p>
            @else
            <p>Status: Desativado</p> 
            <p>Data de desativação: {{ $user->deactivated }}</p> 
            @endif
            <a href="{{ route('painel-usuarios.index') }}"><p>Voltar</p></a>            
        </div>
    </div>
</div>






@include('painel.layout.footer')
@endsection