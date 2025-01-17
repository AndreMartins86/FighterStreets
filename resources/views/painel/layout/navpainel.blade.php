@php
  $url = url()->current() == 'http://127.0.0.1:8000/painel-torneios' ? 'http://127.0.0.1:8000/painel-torneios' : 'http://127.0.0.1:8000/painel-usuarios';
@endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ $url }}">
        <img src="/img/painel/logo.png" alt="logo" class="d-inline-block aligh-text-top" width="35px"
         height="35px">
     IT Tech
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">                          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Bem vindo {{ auth()->user()->name }}!
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('painel-usuarios.edit', ['painel_usuario' => auth()->user()->id]) }}">Alterar senha</a></li>
              <li><a class="dropdown-item" href="{{ route('p-logout')  }}">Sair</a></li>              
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>