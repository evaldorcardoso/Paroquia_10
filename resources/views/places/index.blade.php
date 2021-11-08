<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem das Congregações</title>
</head>
<body>
    <h1 class="text-center text-3xl uppercase font-black my-4">Listagem das Congregações</h1>
    <a href="{{ route('places.create') }}">Nova congregação</a>

    @foreach ($places as $place)
        <p>{{ $place->nome }}</p>
    @endforeach
</body>
</html>


