@extends('app')
@section('conteudo')
@include('layout.navarea')

    <div class="container">
        <div class="row justify-content-center my-5 py-5">
            <div class="col-auto mb-5">
                <form action="" class="mb-5">
                    <h2 class="my-3">Esqueci minha senha</h2>
                    <label for="email" class="form-label">Seu Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <input type="button" value="Enviar" class="btn btn-primary my-2">
                </form>
            </div>
        </div>
    </div>


@include('layout.footerarea')
@endsection
