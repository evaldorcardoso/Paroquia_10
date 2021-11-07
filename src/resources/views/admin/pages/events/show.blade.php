@extends('admin.layouts.app')

@section('title', 'Exibindo Evento')

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
                    <h3 id="titulo_view1" class="card-title">{{ $event['title'] }}</h3>
                    <h5 id="titulo2_view1" style="color: #999999;text-transform: none;">{{ $congregacao['name'] }}</h5>
                </div>
                <div class="card-body" style="text-align: left;">  
                    <div class="row" id="div_ver_evento">
                        <div class="col-md-12">
                            <div class="info info-horizontal">
                                <div class="description">
                                    <h5 class="info-title">Descrição do Evento</h5>
                                    <p class="description">{{ $event['description'] }}</p>
                                </div>
                            </div>                            
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                  <i class="material-icons">calendar_today</i>
                                </div>
                                <div class="description">
                                  <h4 class="info-title">Data do Evento</h4>
                                  <p class="description">{{ $event['event_at'] }}</p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                  <i class="material-icons">group</i>
                                </div>
                                <div class="description">
                                  <h4 class="info-title">Auxiliares</h4>
                                  <p class="description">{{ $event['auxiliars'] }}</p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                  <i class="material-icons">bookmarks</i>
                                </div>
                                <div class="description">
                                  <h4 class="info-title">Leituras</h4>
                                  <p class="description">{{ $event['readings'] }}</p>
                                </div>
                            </div>
                            <div class="info info-horizontal">
                                <div class="icon icon-info">
                                  <i class="material-icons">music_note</i>
                                </div>
                                <div class="description">
                                  <h4 class="info-title">Música</h4>
                                  <p class="description">{{ $event['musics'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="card_footer" class="card-footer">            
                    <div class="icon icon-info">
                        <i class="material-icons">place</i>
                    </div>
                    <p class="description">{{ $event['address'] }}</p>
                </div>
            </div>
        </div>
    </div>    
@endsection