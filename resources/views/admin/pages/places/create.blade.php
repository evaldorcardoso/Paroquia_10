@extends('admin.layouts.app')

@section('title', 'Nova Congregação')

@section('content')
    <h1>Cadastrar nova congregação</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('places.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nome" value="{{ old('nome') }}">
        <input type="text" name="localidade" value="{{ old('localidade') }}"> 
        <input type="text" name="pastor" value="{{ old('pastor') }}">
        <input type="file" name="imagem">
        <button type="submit">Salvar</button>
    </form>
@endsection