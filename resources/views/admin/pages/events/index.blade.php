@extends('admin.layouts.app')

@section('title','Eventos')

@section('content')
    <div class="content" style="padding:0;margin-top: 90px">
        <div class="container-fluid">	        	
            <div class="alert alert-success" id="notificacao_ok" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                </button>
                <span id="mensagem_notificacao_ok">This is a notification with close button.</span>
            </div>
            <div id="div_principal" class="row">
                <div class="col-lg-12 col-md-12" style="padding: 0">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title">Seu Informativo digital</h4>
                            <p class="card-category">Para começar, selecione a sua congregação..</p>
                        </div>
                        <div class="card-body table-responsive">

                        <table class="table table-hover">
                            <thead class="text-rose">

                            </thead>
                            <tbody id="tab_congregacoes">
                                <center>
                                    <div id="status_congregacao"><img src="images/giphy.gif" style="height: 15px;margin-top: 0px;"></div>
                                </center>
                            <!--<tr onclick="document.location.href = '/congregacao.html?id=1'">
                                <td>Emanuel</td>
                                <td>Capão da Canoa</td>
                                <td>Fernando</td>
                            </tr>-->		                      
                            </tbody>
                        </table>
                    </div>
                <!--<div class="text-center">
                    <button type="button" class="btn btn-rose btn-round" onclick="muda_tela('registrar');">Não achou? Cadastre a sua<div class="ripple-container"></div></button>
                </div>-->
              </div>
            </div>
          </div>

          <div id="div_entrar" class="row" style="display: none;">
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="" action="">
              <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Acesso</h4>
                </div>
                <div class="card-body ">
                  <!--<p class="card-description text-center">Or Be Classical</p>-->
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <input id="entrar_email" type="email" email="true" class="form-control" placeholder="Email...">
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <input id="entrar_senha" type="password" class="form-control" placeholder="Senha...">
                    </div>
                  </span>
                </div>
                <center>
                      <div id="status_entrar" style="display: none"><img src="images/giphy.gif" style="height: 15px;margin-top: 0px;"></div>
                </center>
                <div id="but_entrar" class="card-footer justify-content-center">
                  <a class="btn btn-rose btn-link btn-lg" onclick="entrar();">Entrar</a>
                </div>		                
                <div class="card-footer justify-content-center">
                  <a onclick="muda_tela('principal');">VOLTAR</a>
                </div>
                <br>
                <div class="card-footer justify-content-center">
                  <a onclick="">Esqueci minha senha</a>
                </div>
              </div>
            </form>
            </div>
        </div>

        <div id="div_registrar" class="row" style="display: none;">
            <div class="col-lg-12 ml-auto mr-auto">
              <div class="card card-hidden">
                <div class="card-header card-header-rose">
                  <h4 class="card-title">Novo Cadastro</h4>
                  <p class="card-category">Informe os dados de sua congregação..</p>
                </div>
                <div class="card-body ">
                  <center>
                    <div id="status_registro" style="display: none"><img src="images/giphy.gif" style="height: 15px;margin-top: 0px;"></div>
                  </center>
                  <form >
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome da Congregação</label>
                          <input id="nome_registra" type="text" class="form-control" maxLength="100">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Endereço</label>
                          <input id="localidade_registra" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome do(s) Pastor(es)</label>
                          <input id="pastor_registra" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label>Informe algum dado adicional para identificar a sua Congregação (Opcional)</label>
                            <textarea id="descricao_registra" class="form-control" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email de acesso</label>
                          <input id="email_registra" type="email" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Senha de acesso</label>
                          <input id="senha_registra" type="password" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Repetir senha</label>
                          <input id="senha_registra_2" type="password" class="form-control">
                        </div>
                      </div>
                    </div><br>
                    <div class="text-center">
                      <button type="button" onclick="novaCongregacao();" class="btn btn-rose pull-center">Cadastrar</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
                </div>
              </div>
            </div>
        </div>

        <div id="div_resetasenha" class="row" style="display: none;">
            <div class="col-lg-12 ml-auto mr-auto">
              <div class="card card-hidden">
                <div class="card-header card-header-rose">
                  <h4 class="card-title">Nova senha</h4>
                  <p class="card-category">Informe uma nova senha..</p>
                </div>
                <div class="card-body ">
                  <center>
                    <div id="status_resetasenha" style="display: none"><img src="images/giphy.gif" style="height: 15px;margin-top: 0px;"></div>
                    <input id="id_reseta" type="text" class="form-control" style="display: none">
                  </center>
                  <form >
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email de acesso</label>
                          <input id="email_reseta" type="text" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Senha de acesso</label>
                          <input id="senha_reseta" type="password" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Repetir senha</label>
                          <input id="senha_reseta_2" type="password" class="form-control">
                        </div>
                      </div>
                    </div><br>
                    <div class="text-center">
                      <button type="button" onclick="resetaSenha();" class="btn btn-rose pull-center">Salvar e entrar</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

    <h1>Exibindo os eventos</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Cadastrar</a>
    @if (session('message'))
    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
        {{ session('message') }}
    </div>
    @endif
    <hr>
    <form action="{{ route('events.search') }}" method="post" class="form form-inline">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="filter" class="form-control" placeholder="Filtrar" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-info" type="submit" id="button-addon2">Pesquisar</button>
          </div>
    </form>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td width="100">
                        <a href="{{ route('events.edit',$event->id) }}">Editar</a>
                        <a href="{{ route('events.show',$event->id) }}">Detalhes</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>

    {!! $events->links() !!}
    
@endsection

@push('styles')
    <style>
        
    </style>
@endpush
