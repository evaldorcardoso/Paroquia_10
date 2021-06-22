@extends('admin.layouts.app')

@section('title', 'Nova Congregação')

@section('content')
    <h1>Editar congregação {{$id}}</h1>

    <form action="{{ route('places.update', $id) }}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="nome">
        <button type="submit">Salvar</button>
    </form>
@endsection