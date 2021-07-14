@extends('admin.layouts.app')

@section('title','Eventos')

@section('content')
  <div class="content" style="padding:0;margin-top: 90px">
    <div class="container-fluid">	        	
      @if (session('message'))
      <div class="alert alert-success" id="notificacao_ok">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span id="mensagem_notificacao_ok">{{ session('message') }}.</span>
      </div>
      @endif
      <div class="row">
        <div class="col-lg-12 col-md-12" style="padding: 0">
          <div class="card">            
            <div class="card-header card-header-rose">
              <h4 class="card-title">Eventos</h4>                            
              <p class="card-category">{{ $congregacao['name'] }}</p>
            </div>
            <div class="card-body table-responsive">
              @auth
              <div class="text-left">
                <a href="{{ route('events.create',array('user' => $congregacao['id'])) }}">
                <button type="button" class="btn btn-rose" >Cadastrar novo Evento<div class="ripple-container"></div></button>
                </a>
              </div>            
              @endauth
              <table class="table table-hover">
                <thead class="text-rose">

                </thead>
                <tbody>
                  @foreach ($events as $event)
                  <tr>
                    <td><a href="{{ route('events.show',array('event' => $event['id'], 'user' => $congregacao['id'])) }}">{{ $event->title }}</a></td>
                    
                    @auth
                    <td width="60">
                      <a href="{{ route('events.edit',array('event' => $event->id, 'user' => $congregacao['id'])) }}">Editar</a>
                    </td>
                    @else
                    <td width="100">{{ $event->event_at }}</td>
                    @endauth
                  </tr>
                  @endforeach                            
                </tbody>
              </table>
              {!! $events->links() !!}
            </div>            
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
