@extends('app')
@section('conteudo')
    <main style="min-height: 65vh;">

        <div class="container mt-5">
            <div class="row">
                <div class="col-6">
                    <img src="img/painel/logo.png" alt="logo" class="d-inline-block aligh-text-top">
                </div>
                <div class="col-6">
                    <h3>Esqueceu sua Senha?</h3>
                    <p>Apenans digite seu e-mail abaixo e enviaremos um link para ele para redefinir sua senha!</p>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-5">
                                <label for="email" class="form-label">Email: </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="name@example.com">
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Resetar Senha</button>
                                </div>

                                <div class="col-6 text-end">
                                    <a href="#">Voltar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </main>


    @include('painel.layout.footer')
@endsection
