@extends('admin.layouts.app')

@section('title','Início')

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
                            <h4 class="card-title">Seja bem-vindo!</h4>
                            <p class="card-category">Para começar, selecione a sua congregação..</p>
                        </div>
                        <div class="card-body table-responsive">

                        <table class="table table-hover">
                            <thead class="text-rose">

                            </thead>
                            <tbody id="tab_congregacoes">                                
                                @foreach ($users as $user)
                                <tr>
                                    <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>                                    
                                </tr>
                                @endforeach
                            <!--<tr onclick="document.location.href = '/congregacao.html?id=1'">
                                <td>Emanuel</td>
                                <td>Capão da Canoa</td>
                                <td>Fernando</td>
                            </tr>-->		                      
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                <!--<div class="text-center">
                    <button type="button" class="btn btn-rose btn-round" onclick="muda_tela('registrar');">Não achou? Cadastre a sua<div class="ripple-container"></div></button>
                </div>-->
              </div>
            </div>
          </div>
    </div>
  </div>
@endsection

@push('styles')
    <style>
        
    </style>
@endpush
