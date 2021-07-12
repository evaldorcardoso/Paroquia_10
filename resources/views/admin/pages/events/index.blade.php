@extends('admin.layouts.app')

@section('title','Eventos')

@section('content')
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
