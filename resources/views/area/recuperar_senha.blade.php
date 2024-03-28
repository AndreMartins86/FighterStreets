@extends('app')
@section('conteudo')
@include('layout.navarea')

    <div class="container">
        <div class="row justify-content-center my-5 py-5">
            <div class="col-auto mb-5">
                <form action="" class="mb-3">
                    <h3 class="my-3">Alterar Senha</h3>
                    <label for="password1" class="form-label">Nova senha</label>
                    <input type="password" name="password" id="password1" class="form-control">
                    <label for="password2" class="form-label">Confirmar senha</label>
                    <input type="password" name="conf_password" id="password2" class="form-control">
                    <input type="button" value="Alterar" class="btn btn-primary my-2">
                </form>
            </div>
        </div>
    </div>


@include('layout.footerarea')
@endsection