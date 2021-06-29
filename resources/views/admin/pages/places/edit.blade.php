@extends('admin.layouts.app')

@section('title', 'Editar Congregação')

@section('content')
    <h1>Editar congregação {{$place->nome}}</h1>

    <form action="{{ route('places.update', $place->id) }}" method="post" enctype="multipart/form-data" class="form">
        @method('PUT')
        @include('admin.pages.places._partials.form')
    </form>
@endsection