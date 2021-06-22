@extends('admin.layouts.app')

@section('title', 'Nova Congregação')

@section('content')
    <h1>Cadastrar nova congregação</h1>

    <form action="" method="post">
        <input type="text" name="nome">
        <button type="submit">Salvar</button>
    </form>
@endsection