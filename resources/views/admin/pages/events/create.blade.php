@extends('admin.layouts.app')

@section('title', 'Novo Evento')

@section('content')
    <div class="container" style="margin-top: 90px;padding:0">
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
        <div class="col-md-12" style="padding: 0">        
            <div class="card card-stats">
                <div id="card_header" class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">date_range</i></div>
                    <h3 id="titulo_view1" class="card-title">Novo Evento</h3>
                    <h5 id="titulo2_view1" style="color: #999999;text-transform: none;">{{ $congregacao['name'] }}</h5>
                </div>
                <div class="card-body" style="text-align: left;">  
                    <form id="form_evento" action="{{ route('events.store', $congregacao['id']) }}" method="post" enctype="multipart/form-data">              
                        @include('admin.pages.events._partials.form')                        
                    </form>
                </div>
                <div id="card_footer" class="card-footer">            
                    
                </div>
            </div>
        </div>
    </div>    
@endsection