<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrando nova Congregação</title>
</head>
<body>
    <h1>Cadastrando nova Congregação</h1>
    <form action="{{route('places.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $place->nome ?? old('nome') }}">
        <input type="text" name="localidade" id="localidade" placeholder="Localidade" value="{{ $place->localidade ?? old('localidade') }}">
        <input type="text" name="pastor" id="pastor" placeholder="Nome do Pastor" value="{{ $place->pastor ?? old('pastor') }}">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>