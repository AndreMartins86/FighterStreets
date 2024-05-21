@extends('app')
@section('conteudo')

<main style="min-height: 65vh;">

    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <img src="img/painel/logo.png" alt="logo" class="d-inline-block aligh-text-top">
            </div>
            <div class="col-6">
                <h3>Painel Administrativo</h3>
                <div class="row">
                    <div class="col-5">
                        <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                              <label for="senha" class="form-label">Senha</label>
                              <input type="password" class="form-control" name="password" id="senha">
                        </div>
                        <div class="form-text">
                            <p><a href="" title="">Esqueceu sua senha?</a></p>
                        </div>
        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>			
                        
                    </div>
                </div>
            </div>            
        </div>

        
    </div>		
</main>


@include('painel.layout.footer')

@endsection