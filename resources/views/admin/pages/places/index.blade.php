@extends('admin.layouts.app')

@section('title','Congregações')

@section('content')
    <h1>Exibindo os places</h1>
    <a href="{{ route('places.create') }}" class="btn btn-primary">Cadastrar</a>
    <hr>
    <form action="{{ route('places.search') }}" method="post" class="form form-inline">
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
            @foreach ($places as $place)
                <tr>
                    <td>{{ $place->nome }}</td>
                    <td width="100">
                        <a href="{{ route('places.edit',$place->id) }}">Editar</a>
                        <a href="{{ route('places.show',$place->id) }}">Detalhes</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>

    {!! $places->links() !!}
    
@endsection

@push('styles')
    <style>
        
    </style>
@endpush
