@extends('admin.layouts.app')

@section('title','Registrar')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
<div class="content" style="padding:0;margin-top: 90px">
  <div class="container-fluid">	        	
      <div class="alert alert-success" id="notificacao_ok" style="display: none">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
          </button>
          <span id="mensagem_notificacao_ok">This is a notification with close button.</span>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 ml-auto mr-auto">
          <form  class="text-center" method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-4" src="/img/logo.png" alt="" width="72" height="auto">
            <h1 class="h3 mb-3 fw-normal">Nova Congregação</h1>
      
            <div class="form-floating">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <label for="name">Nome da Congregação</label>
            </div>
            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="form-floating">
              <input type="text" class="form-control" name="address" value="{{ old('address') }}">
              <label for="address">Endereço da Congregação</label>
            </div>
            <div class="form-floating">
              <input type="text" class="form-control" name="shepherd" value="{{ old('shepherd') }}">
              <label for="shepherd">Nome do Pastor</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                <label for="email">Email</label>
            </div>
            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control" name="password">
                <label for="password">Senha</label>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
            <div class="form-floating">
                <input type="password" class="form-control" name="password_confirmation">
                <label for="password_confirmation">Repita a Senha</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
          </form>    
        </div>
      </div>
  </div>
</div>
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
  align-items: center;
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