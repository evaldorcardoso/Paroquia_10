@extends('admin.layouts.app')

@section('title','Entrar')


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
          <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card card-login card-hidden">
              <div class="card-header card-header-rose text-center">
                <h4 class="card-title">Acesso</h4>
              </div>
              <div class="card-body ">
                <!--<p class="card-description text-center">Or Be Classical</p>-->
                <span class="bmd-form-group">
                  <div class="input-group">
                    <input type="email" name="email" email="true" class="form-control" placeholder="Email...">
                  </div>
                </span>
                <span class="bmd-form-group">
                  <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Senha...">
                  </div>
                </span>
              </div>
              <div id="status_entrar" style="display: none"><img src="images/giphy.gif" style="height: 15px;margin-top: 0px;"></div>
              <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-rose btn-link btn-lg">Entrar</button>            
              </div>
              <div class="card-footer justify-content-center">
                <a href="{{ route('register') }}" class="link-primary">Criar conta</a><p>
              </div>
            </div>
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
    }

    body {
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