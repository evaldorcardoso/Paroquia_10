@extends('admin.layouts.app')

@section('title', 'Editar Congregação')

@section('content')
<div class="container-fluid" style="padding-right:0px;padding-left:0px;">
    <div class="alert alert-danger" id="notificacao_erro" style="display: none">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span id="mensagem_notificacao_erro">This is a notification with close button.</span>
    </div>
    <div class="alert alert-success" id="notificacao_ok" style="display: none">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span id="mensagem_notificacao_ok">This is a notification with close button.</span>
    </div>
    <div class="col-md-12" style="padding-right:0px;padding-left:0px;margin-top: 120px;">
        <!--<div class="card card-profile" style="margin-bottom: 5px;">
          <div class="card-avatar">
            <a href="#">
              <img id="img_congregacao" src="https://paroquia10.com/uploads/18141congregacao_1.jpg" />                  
            </a>
          </div>              
          <div class="card-body image-preview-input" style="margin-top: 0">
            <a href="#foto" class="btn btn-rose btn-round image-preview-input-title" onclick="$('#imagec').click();">Alterar Foto</a>
            <input id='imagec' type="file" accept="image/*" name="imagec"  style="display: none;"/>
            <input id="congregacao_imagem" type="text" class="form-control image-preview-filename" disabled="disabled" 
            style="display: none;">
          </div>-->
        </div>
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">Área Administrativa
                <small class="description"></small>
                </h4>
            </div>
            <div class="card-body ">                
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose">
                        <h4 class="card-title">Alterar Dados</h4>
                        <p class="card-category">Preencha os dados da Congregação</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update',Auth::user()->id) }}" method="post" enctype="multipart/form-data">              
                        @method('PUT')
                        @include('admin.pages.places._partials.form')                        
                        </form>
                    </div>
                </div>
              </div>                        
            </div>
        </div>
    </div>
</div>
@endsection