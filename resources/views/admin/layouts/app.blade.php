<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="theme-color" content="#eee">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--<link rel="manifest" href="manifest.json">-->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- ios icons -->
  <link rel="apple-touch-icon" href="img/152.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/180.png">
  <link rel="apple-touch-icon" sizes="167x167" href="img/167.png">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link href="{{ asset('img/2048x2732.png') }}" sizes="2048x2732" rel="apple-touch-startup-image" />
  <link href="{{ asset('img/1668x2224.png') }}" sizes="1668x2224" rel="apple-touch-startup-image" />
  <link href="{{ asset('img/1536x2048.png') }}" sizes="1536x2048" rel="apple-touch-startup-image" />
  <link href="{{ asset('img/1125x2436.png') }}" sizes="1125x2436" rel="apple-touch-startup-image" />
  <link href="{{ asset('img/1242x2208.png') }}" sizes="1242x2208" rel="apple-touch-startup-image" />
  <link href="{{ asset('img/750x1334.png') }}" sizes="750x1334" rel="apple-touch-startup-image" />
  <link href="{{ asset('img/640x1136.png') }}" sizes="640x1136" rel="apple-touch-startup-image" />
  <title>@yield('title') - Paróquia 10</title>
  <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  @stack('styles')
</head>
<body>
    
    <div class="wrapper">
      
      <div class="sidebar" data-color="rose" data-background-color="white" data-image="{{ asset('img/sidebar-1.jpg') }}">
        <div class="logo">
          <a href="http://www.paroquia10.com" class="simple-text logo-normal">
            <img src="{{ asset('img/logo.png') }}" style="width:80px">
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li id="li_inicio" class="nav-item active">
              <a class="nav-link" href="{{ route('users.index') }}">
                <i class="material-icons"></i>
                <p>Início</p>
              </a>
            </li>
            @auth
            <li id="li_entrar" class="nav-item">
              <a class="nav-link" href="{{ route('users.edit',Auth::user()->id) }}">
                <i class="material-icons"></i>
                <p>Dados Pessoais </p>
              </a>
            </li>
            <li id="li_sair" class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="material-icons"></i>
                <p>Sair</p>
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            @else
            <li id="li_alterar" class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                <i class="material-icons"></i>
                <p>Entrar</p>
              </a>
            </li>
            @endauth
            <!--<li class="nav-item">
              <a class="nav-link" href="/letras">
                <i class="material-icons"></i>
                <p>Letras</p>
              </a>
            </li>-->
          </ul>
        </div>
      </div>     
      <div class="main-panel">
      	<!-- Navbar -->
      	<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
	        <div class="container-fluid">
	          <div class="navbar-wrapper">
	          	<img src="{{asset('img/logo.png') }}" style="width:25px">
	            <a class="navbar-brand" href="#">Paróquia10, seu informativo digital!</a>
	          </div>
	          <button id="but_nav" class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="navbar-toggler-icon icon-bar"></span>
	            <span class="navbar-toggler-icon icon-bar"></span>
	            <span class="navbar-toggler-icon icon-bar"></span>
	          </button>
	        </div>
      	</nav>
      	<!-- End Navbar -->    
        @yield('content')
        <footer class="footer">
          <div class="container-fluid">
            <div class="copyright float-center">            
              <!--<script>
                document.write(new Date().getFullYear())
              </script>, made with <i class="material-icons">favorite</i> by-->
              <a href="https://www.evaldorc.com.br" target="_blank"><img style="width: 70px;" src="https://www.evaldorc.com.br/assets/images/marca_b.png"></a>
              <br>&copy; 2021, theme by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
            </div>
          </div>
        </footer>
    </div>    

    @stack('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.1.1') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/funcoes_gerais.js') }}"></script>
</body>
</html>