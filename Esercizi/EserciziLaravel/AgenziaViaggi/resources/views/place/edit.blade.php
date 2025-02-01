<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica Destinazione</title>
</head>

<body>
    <h1>
        <center>Modifica Destinazione</center>
    </h1>

    <h3>Inserisci una nuova destinazione</h3>

    <form action="/places/{{ $place->id }}" method="post">
        @csrf
        @method('PATCH')
        <span>Modifica nome: </span>
        <input type="text" name="name" value="{{ $place->name }}">

        <span>Modifica nazione: </span>
        <input type="text" name="nation" value="{{ $place->nation }}">

        <span>Modifica abitanti: </span>
        <input type="numbers" name="people" value="{{ $place->people }}">

        <button>Modifica</button>
    </form>
</body>

</html>
