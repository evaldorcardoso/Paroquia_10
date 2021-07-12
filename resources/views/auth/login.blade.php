@extends('admin.layouts.app')

@section('title','Entrar')

@section('content')
<main class="form-signin">
    <form  class="text-center" method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="/img/logo.png" alt="" width="72" height="auto">
        <h1 class="h3 mb-3 fw-normal">Entrar no aplicativo</h1>
  
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
        </div>
    
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Lembre-me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
        <a href="{{ route('register') }}" class="link-primary">Criar conta</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>
@endsection

@push('styles')
    <style>
        .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
        html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
@endpush