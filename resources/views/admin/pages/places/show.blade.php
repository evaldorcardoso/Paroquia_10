@extends('admin.layouts.app')

@section('title',"{$place->nome}")

@section('content')

<h1>Place {{ $place->id }}</h1>
<a href="{{ route('places.index') }}">Voltar</a>

<form action="{{ route('places.destroy', $place->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Deletar</button>
</form>

@endsection