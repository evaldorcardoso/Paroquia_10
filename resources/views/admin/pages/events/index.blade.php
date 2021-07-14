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
      <div class="row">
        <div class="col-lg-12 col-md-12" style="padding: 0">
          <div class="card">
            @if (session('message'))
            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                {{ session('message') }}
            </div>
            @endif
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
                    <td>{{ $event->event_at }}</td>
                    @auth
                    <td width="100">
                      <a href="{{ route('events.edit',array('event' => $event->id, 'user' => $congregacao['id'])) }}">Editar</a>
                    </td>
                    @endauth
                  </tr>
                  @endforeach                            
                </tbody>
              </table>
            </div>            
          </div>
        </div>
      </div>        
    </div>
  </div>

    <h1>Exibindo os eventos</h1>
    <a href="{{ route('events.create',array('event' => $event->id, 'user' => $congregacao['id'])) }}" class="btn btn-primary">Cadastrar</a>
    
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
                        <a href="{{ route('events.edit',array('event' => $event->id, 'user' => 1)) }}">Editar</a>
                        <a href="{{ route('events.show',array('event' => $event->id, 'user' => 1)) }}">Detalhes</a>
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
